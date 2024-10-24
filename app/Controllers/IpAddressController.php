<?php

namespace App\Controllers;

use App\Models\IpAddressModel;

class IpAddressController extends BaseController
{
    public function index()
    {
        $model = new IpAddressModel();

        $data = [
            'breadcrumbs' => 'Grafik Pengunjung',
            'ipData' => $model->getIpAddressCountByUser() // Ambil data jumlah ip_address per tanggal
        ];

        // Kirim data ke view
        return view('report/index', $data);
    }
}
