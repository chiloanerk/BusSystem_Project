<?php

namespace app\controllers\admin;

use app\models\BusRegistration;
use app\models\Database;

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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $learner_id = $_GET['learner_id'];
            if ($registrations->approveRegistration($learner_id)) {
                header('Location: dashboard');
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