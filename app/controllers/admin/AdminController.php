<?php

namespace app\controllers\admin;

use app\models\Bus;
use app\models\BusRegistration;
use app\models\Database;

class AdminController
{
    public function dashboard()
    {
        $db = new Database();
        $registrations = new BusRegistration($db);
        $waitingList = $registrations->getRegistrationsByStatus('pending');


        view('admin/dashboard', [
            'title' => 'SafeTrans - Dashboard',
            'heading' => 'Admin Dashboard',
            'waitingList' => $waitingList

        ]);
    }
}