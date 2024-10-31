<?php

namespace App\Controllers;

use \App\Models\SubEmailModel;

class EmailController extends BaseController
{
    protected $session;
    protected $emailModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->emailModel = new SubEmailModel();
    }
    public function index()
    {
        $data = [
            'breadcrumbs' => 'Email Marketing',
        ];
        return view('email/index', $data);
    }

    public function sendEmail()
    {
        $email = \Config\Services::email();
        foreach ($this->request->getVar('email_sub') as $u) {
            $email->setFrom('reggyrafli17@gmail.com', 'Daud Jamur');
            $email->setTo($u);
            $email->setSubject($this->request->getVar('subjek'));
            $email->setMessage($this->request->getVar('isi'));
            $email->send();
        }
        $data = [
            'breadcrumbs' => 'Email Marketing',
        ];
        return view('email/index', $data);
    }

    public function getEmail()
    {

        // Data yang akan disimpan ke database
        $data = [
            'email' => $this->request->getPost('email'),
        ];

        // Simpan data ke dalam tabel 'email_sub'
        $this->emailModel->save($data);

        $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->to('/');
    }

    public function showEmailSub()
    {
        $data = [
            'email' => $this->emailModel->findAll(),
            'breadcrumbs' => 'Email Subscribe',
        ];
        return view('email/subscribe', $data);
    }

    public function delete($id)
    {

        // Cek apakah email ada sebelum dihapus
        if ($this->emailModel->find($id)) {
            $this->emailModel->delete($id);
            session()->setFlashdata('pesan', 'Email berhasil dihapus.');

            // Mengembalikan respons sukses
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Jika email tidak ditemukan
            session()->setFlashdata('pesan', 'Email tidak ditemukan.');
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
