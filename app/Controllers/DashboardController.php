<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IpAddressModel;

class DashboardController extends Controller
{
    protected $ipModel;
    public function __construct()
    {
        $this->ipModel = new IpAddressModel();
    }
    public function index()
    {
        // Ambil data dari session
        $data = [
            'breadcrumbs' => 'Dashboard',
            'name' => session()->get('name'),
            'role' => session()->get('role'),
            'ipData' => $this->ipModel->getIpAddressCountByUser(), // Ambil data jumlah ip_address per tanggal
            'pengunjung' => $this->ipModel->countAll(), // Hitung jumlah pengunjung berdasarkan ip_address
            'visitor_logs' => $this->ipModel->orderBy('visit_time', 'DESC')->findAll()
        ];

        // Tampilkan halaman dashboard
        return view('dashboard/index', $data);
    }
}
