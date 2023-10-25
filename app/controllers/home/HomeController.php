<?php

namespace app\controllers\home;

class HomeController
{
    public function home()
    {
        $title = 'SafeTrans';
        $heading = 'Welcome to SafeTrans';
        $content = <<<EOT
Registrations are open for the 2024 school year.
Hurry, as seats are limited, Register your learner today to secure a spot.

Get started by logging in or signing up to access the system.
EOT;

        view('home/index', [
            'title' => $title,
            'heading' => $heading,
            'content' => $content
        ]);
    }
}