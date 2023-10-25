<?php

namespace app\controllers\application;

class ApplicationController
{
    public string $title = 'SafeTrans - Application';
    public string $heading = 'Learner Application';
    public function application()
    {
        view('application/application', [
            'title' => $this->title,
            'heading' => $this->heading
        ]);
    }
}