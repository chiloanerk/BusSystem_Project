<?php

namespace app\controllers\home;

class HomeController
{
    public function home()
    {
        $title = 'SafeTrans';
        $heading = 'Welcome to SafeTrans';

        view('home/index', [
            'title' => $title,
            'heading' => $heading
        ]);
    }
}