<?php

namespace app\controllers\application;

use app\classes\Emailer;
use app\models\Bus;
use app\models\BusRegistration;
use app\models\BusRoutes;
use app\models\Database;
use app\models\Learner;
use app\models\Parents;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

class ApplicationController
{
    public string $title = 'SafeTrans - Application';
    public string $heading = 'Learner Application';

    public function application()
    {

        $db = new Database();
        $busModel = new Bus($db);
        $buses = $busModel->getBuses();

        view('application/application', [
            'title' => $this->title,
            'heading' => $this->heading,
            'buses' => $buses
        ]);
    }

    public function review()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
            isset($_POST['name'], $_POST['surname'], $_POST['cellphone'], $_POST['grade'], $_POST['bus'],
                $_POST['pickup_num'], $_POST['dropoff_num'])) {

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $cellphone = intval($_POST['cellphone']);
            $grade = $_POST['grade'];
            $bus = $_POST['bus'];
            $pickup_num = $_POST['pickup_num'];
            $dropoff_num = $_POST['dropoff_num'];

            $db = new Database();
            $buses = new Bus($db);
            $busRoutes = new BusRoutes($db);
            $route = $buses->getBusRoute($bus);
            $pickup = $busRoutes->getPickup($pickup_num);
            $dropoff = $busRoutes->getDropoff($dropoff_num);

            // Store the data in the session variable
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['cellphone'] = $cellphone;
            $_SESSION['grade'] = $grade;
            $_SESSION['bus'] = $bus;
            $_SESSION['pickup_num'] = $pickup_num;
            $_SESSION['dropoff_num'] = $dropoff_num;

            view('application/review', [
                'title' => $this->title,
                'heading' => 'Verify Information',
                'name' => $name,
                'surname' => $surname,
                'cellphone' => $cellphone,
                'grade' => $grade,
                'bus' => $bus,
                'pickup_num' => $pickup_num,
                'dropoff_num' => $dropoff_num,
                'route' => $route['route'],
                'pickup' => $pickup,
                'dropoff' => $dropoff,
            ]);
        }
    }

    public function store()
    {
        session_start();


        if (isset($_POST['complete'])) {


            $db = new Database();

            if (!isset($_SESSION['parent_id'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['cellphone'],
                $_SESSION['grade'], $_SESSION['bus'])) {
                echo 'Missing Data';
            } else {
                $learnerModel = new Learner($db);

                // Inserting learner into the learner table
                $learnerModel->setParent_id($_SESSION['parent_id']);
                $learnerModel->setName($_SESSION['name']);
                $learnerModel->setSurname($_SESSION['surname']);
                $learnerModel->setCellphone(intval($_SESSION['cellphone']));
                $learnerModel->setGrade($_SESSION['grade']);

                $learnerModel->save();

                $learner_id = $db->getPdo()->lastInsertId();

                $_SESSION['learner_id'] = $learner_id;

                // If learner id is set, capture the learner along with the bus routes to the registration table
                if ($learner_id) {
                    $busRegistration = new BusRegistration($db);
                    $available_seats = $busRegistration->availableSeats($_SESSION['bus']);

                    if ($available_seats > 0) {
                        $busRegistration->setStatus('approved');
                    } else {
                        $busRegistration->setStatus('pending');
                    }

                    $busRegistration->setParent_id($_SESSION['parent_id']);
                    $busRegistration->setLearner_id($learner_id);
                    $busRegistration->setBus_id($_SESSION['bus']);
                    $busRegistration->setPickup_num($_SESSION['pickup_num']);
                    $busRegistration->setDropoff_num($_SESSION['dropoff_num']);

                    if ($busRegistration->save()) {
                        // Successful registration, unset session variables
                        unset($_SESSION['learner_id']);
                        unset($_SESSION['name']);
                        unset($_SESSION['surname']);
                        unset($_SESSION['cellphone']);
                        unset($_SESSION['grade']);
                        unset($_SESSION['bus']);
                        unset($_SESSION['pickup_num']);
                        unset($_SESSION['pickup_name']);
                        unset($_SESSION['dropoff_num']);
                        unset($_SESSION['dropoff_name']);

                        header('Location: /checkout');
                    } else {
                        echo 'Registration Failed';
                    }
                }
            }
        }

    }

    public function checkout()
    {
        session_start();

        $db = new Database();
        $learnerModel = new Learner($db);
        $busModel = new Bus($db);
        $routeModel = new BusRoutes($db);
        $parentModel = new Parents($db);

        $registrationModel = new BusRegistration($db);
        $parent_id = $_SESSION['parent_id'];
        $parentInfo = $parentModel->getParentInfo($parent_id);
        $registrations = $registrationModel->getRegistrationByParentId($parent_id);
        $learnerCount = $registrationModel->getRegistrationCountPerParent($parent_id);
        var_dump($learnerCount);

        view('application/checkout', [
            'title' => 'SafeTrans - Checkout',
            'heading' => 'Registration Complete',
            'db' => $db,
            'learnerModel' => $learnerModel,
            'busModel' => $busModel,
            'routeModel' => $routeModel,
            'parentInfo' => $parentInfo,
            'registrations' => $registrations,
            'learnerCount' => $learnerCount
        ]);
    }

    public function final()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = 'Failed to sent email';
            header('Location: /checkout');
        }
        if (isset($_POST['name'], $_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $subject = 'Learner Registration Confirmation';
            $message = 'This email serves as confirmation for the bus registration in 2024.';

            require base_path('/vendor/autoload.php');

            $options = new Options();
            $options->set('isHtmlParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $dompdf = new Dompdf($options);

            ob_start();
            $this->checkout();
            $htmlContent = ob_get_clean();

            // Add a link to the current page within the PDF content
            $htmlContent .= '<a href="/checkout"></a>';

            $dompdf->loadHtml($htmlContent);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $pdfContent = $dompdf->output();
            $pdfFile = 'pdf/registration.pdf';
            file_put_contents($pdfFile, $pdfContent);

            $mailer = new Emailer();
            if ($mailer->sendEmail($name, $email, $subject, $message, $pdfFile)) {
                $db = new Database();
                $parentModel = new Parents($db);

                $parentInfo = $parentModel->getParentInfo($_SESSION['parent_id']);
                $parent_email = $parentInfo['email'];

                view('application/final', [
                    'title' => 'SafeTrans - Complete',
                    'heading' => 'Registration Complete',
                    'parent_email' => $parent_email
                ]);
            }
        }
    }

}