<?php

namespace App\Controllers;

class EmailController extends BaseController
{
    public function index()
    {

        $data = [
            'breadcrumbs' => 'Email Marketing',
            'isi' => 'email/index',
        ];
        return view('email/index', $data);
    }

    public function sendEmail()
    {
        $email = \Config\Services::email();
        foreach ($this->request->getVar('users') as $u) {
            $email->setFrom('reggyrafli17@gmail.com', 'Daud Jamur');
            $email->setTo($u);
            $email->setSubject($this->request->getVar('subjek'));
            $email->setMessage($this->request->getVar('isi'));
            $email->send();
        }
        $data = [
            'breadcrumbs' => 'Email Marketing',
            'isi' => 'email/index',
        ];
        return view('email/index', $data);
    }
}
