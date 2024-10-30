<?php

namespace App\Models;

use CodeIgniter\Model;

class IpAddressModel extends Model
{
    protected $table = 'visitor_logs';
    protected $primaryKey = 'id_ip';
    protected $allowedFields = ['ip_address', 'referrer', 'visited_page', 'visit_time'];

    public function getIpAddressCountByUser()
    {
        return $this->select('visit_time, COUNT(ip_address) as total')
            ->groupBy('visit_time')
            ->orderBy('total', 'DESC')
            ->findAll();
    }
}
