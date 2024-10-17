<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'breadcrumbs' => 'Tabel User',
            'user' => $this->user->findAll(),
        ];
        return view('user/index', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        // Aturan validasi untuk user
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[admin,konsumen]',
        ]);

        // Jika validasi gagal, kembalikan error dalam bentuk JSON
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }

        // Hashing password sebelum menyimpan ke database
        $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Data yang akan disimpan ke database
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $hashedPassword,
            'role' => $this->request->getPost('role'),
        ];

        // Simpan data ke dalam tabel 'users'
        $this->user->save($data);

        // Kembalikan respons sukses dalam bentuk JSON
        return $this->response->setJSON(['status' => 'success']);
    }

    public function update($id)
    {
        // Validasi input data
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email[users.email]',
            'role' => 'required|in_list[admin,konsumen]',
        ]);

        // Jalankan validasi
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, simpan pesan kesalahan di session
            session()->setFlashdata('errors', $validation->getErrors());

            // Kembalikan ke halaman form edit dengan id yang sama
            return redirect()->to('/user/edit/' . $id)->withInput();
        }

        // Hashing password sebelum menyimpan ke database
        $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);


        // Jika validasi berhasil, lanjutkan untuk memperbarui data
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $hashedPassword,
            'role' => $this->request->getVar('role'),
        ];

        // Cek apakah data berhasil diupdate
        if ($this->user->update($id, $data)) {
            // Jika update berhasil, set flashdata dan redirect
            session()->setFlashdata('pesan', 'Data berhasil diperbarui.');
            return redirect()->to('/user');
        } else {
            // Jika update gagal, set flashdata dan redirect kembali ke halaman edit
            session()->setFlashdata('pesan', 'Gagal memperbarui data.');
            return redirect()->to('/user/edit/' . $id);
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        if (!$user) {
            return redirect()->to('/user')->with('error', 'User not found');
        }

        $data = [
            'breadcrumbs' => 'Edit Data User',
            'user' => $user,  // Data pengguna yang ingin diedit
            'id' => $id,      // ID pengguna
        ];

        return view('user/edit', $data); // Mengembalikan view edit
    }

    public function delete($id)
    {

        // Cek apakah user ada sebelum dihapus
        if ($this->user->find($id)) {
            $this->user->delete($id);
            session()->setFlashdata('pesan', 'User berhasil dihapus.');

            // Mengembalikan respons sukses
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Jika user tidak ditemukan
            session()->setFlashdata('pesan', 'User tidak ditemukan.');
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
