<?php

namespace App\Models;

use CodeIgniter\Model;

class IpAddressModel extends Model
{
    protected $table = 'ip_address';
    protected $primaryKey = 'id_ip';
    protected $allowedFields = ['ip_address', 'date'];

    public function getIpAddressCountByDate()
    {
        return $this->select('date, COUNT(ip_address) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->findAll();
    }
}
