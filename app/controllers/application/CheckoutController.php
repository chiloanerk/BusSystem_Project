<?php

namespace app\controllers\application;

class CheckoutController
{
    public string $title = 'SafeTrans - Confirm';
    public string $heading = 'Confirm Details';
    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
            isset($_POST['name'], $_POST['surname'], $_POST['cellphone'], $_POST['grade'], $_POST['bus'], $_POST['pickup-point'], $_POST['dropoff-point'])) {

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $cellphone = $_POST['cellphone'];
            $grade = $_POST['grade'];
            $bus = $_POST['bus'];
            $pickupPoint = $_POST['pickup-point'];
            $dropoffPoint = $_POST['dropoff-point'];

            // You can now use these variables in your code.
            view('application/checkout', [
                'name' => $name,
                'surname' => $surname,
                'cellphone' => $cellphone,
                'grade' => $grade,
                'bus' => $bus,
                'pickupPoint' => $pickupPoint,
                'dropoffPoint' => $dropoffPoint
            ]);
        }
    }
}