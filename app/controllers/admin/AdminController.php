<?php

namespace app\controllers\admin;

use app\classes\Emailer;
use app\models\BusRegistration;
use app\models\Database;
use app\models\Learner;
use app\models\Parents;

class AdminController
{
    public function dashboard()
    {
        $waitingList = $this->waitingList();
        $approvedList = $this->approvedList();

        view('admin/dashboard', [
            'title' => 'SafeTrans - Dashboard',
            'heading' => 'Admin Dashboard',
            'waitingList' => $waitingList,
            'approvedList' => $approvedList,
        ]);
    }

    public function waitingList()
    {
        $db = new Database();
        $registrations = new BusRegistration($db);
        return $registrations->getRegistrationsByStatus('pending');
    }

    public function approvedList()
    {
        $db = new Database();
        $registrations = new BusRegistration($db);
        return $registrations->getRegistrationsByStatus('approved');
    }

    public function approveRegistration($learner_id)
    {
        $db = new Database();
        $registrations = new BusRegistration($db);
        $learner = new Learner($db);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $learner_id = $_GET['learner_id'];
            $parentName = $learner->getParent($learner_id)['name'];
            $parentSurname = $learner->getParent($learner_id)['surname'];
            $parentFullNames = $parentName . ' ' . $parentSurname;
            $parentEmail = $learner->getParent($learner_id)['email'];

            if ($registrations->approveRegistration($learner_id)) {



                $subject = 'Learner Registration Confirmation';
                $message = 'This email serves as confirmation for the bus registration in 2024. The administrator reviewed your registration and finalised it';

                require base_path('/vendor/autoload.php');

                $mailer = new Emailer();
                if ($mailer->sendEmail($parentFullNames, $parentEmail, $subject, $message)) {
                    header('Location: dashboard');
                }
            }

        }
    }

    public function getWeeklyReport()
    {
        $db = new Database();
        $registrations = new BusRegistration($db);
        $registrations->getThisWeek();
    }
}