<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $learner_id = $_GET['learner_id'];
    $approve = new \app\controllers\admin\AdminController();
    $approve->approveRegistration($learner_id);
}