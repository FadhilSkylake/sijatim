<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IpAddressModel;

class VisitorLogsController extends Controller
{
    public function truncateLimited()
    {
        $ipAddressModel = new IpAddressModel();

        try {
            // Panggil fungsi model untuk menghapus 100 entri
            $result = $ipAddressModel->deleteLimitedEntries();

            // Cek jika penghapusan berhasil
            if (!$result) {
                throw new \Exception("Gagal menghapus data.");
            }

            session()->setFlashdata('message', 'Berhasil menghapus 100 entri dari tabel visitor_logs.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
