<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\IpAddressModel;

class VisitorLogFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $visitorLog = new IpAddressModel();

        // Mendapatkan data referrer, IP, dan halaman yang dikunjungi
        $referrer = $_SERVER['HTTP_REFERER'] ?? 'Direct';
        $ipAddress = $request->getIPAddress();
        $visitedPage = current_url();

        // Menyimpan data ke database
        $visitorLog->insert([
            'ip_address'   => $ipAddress,
            'referrer'     => $referrer,
            'visited_page' => $visitedPage,
            'visit_time'   => date('Y-m-d H:i:s')
        ]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa di sini
    }
}
