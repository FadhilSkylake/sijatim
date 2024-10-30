<?php

namespace App\Controllers;

use App\Models\IpAddressModel;

class IpAddressController extends BaseController
{
    protected $ipModel;
    public function __construct()
    {
        $this->ipModel = new IpAddressModel();
    }
    public function index()
    {

        $data = [
            'breadcrumbs' => 'Grafik Pengunjung'

        ];

        // Kirim data ke view
        return view('report/index', $data);
    }
}
