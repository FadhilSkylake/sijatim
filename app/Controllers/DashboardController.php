<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data dari session
        $data = [
            'breadcrumbs' => 'Dashboard',
            'name' => session()->get('name'),
            'role' => session()->get('role'),
        ];

        // Tampilkan halaman dashboard
        return view('dashboard/index', $data);
    }
}
