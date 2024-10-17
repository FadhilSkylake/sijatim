<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('login/register'); // Tampilkan view register
    }

    public function loginForm()
    {
        return view('login/login'); // Tampilkan view login
    }

    public function register()
    {
        $model = new UserModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role' => 'konsumen', // Default role
        ];

        $model->save($data);

        return redirect()->to('/login')->with('message', 'User registered successfully');
    }

    public function login()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Simpan data ke session
            $sessionData = [
                'id_user'        => $user['id_user'],
                'name'      => $user['name'],
                'email'     => $user['email'],
                'role'      => $user['role'],
                'isLoggedIn' => true,
            ];
            session()->set($sessionData);

            return redirect()->to('/dashboard')->with('message', 'Welcome, ' . $user['name'] . '!');
        }

        return redirect()->back()->with('error', 'Invalid login credentials');
    }


    public function logout()
    {
        session()->destroy(); // Menghancurkan semua data sesi
        return redirect()->to('/login')->with('message', 'Logged out successfully');
    }
}
