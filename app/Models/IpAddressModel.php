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

    // Fungsi untuk menghapus 100 entri tertua
    public function deleteLimitedEntries($limit = 100)
    {
        // Ambil 100 id entri paling lama
        $subquery = $this->select('id')
            ->orderBy('id', 'ASC')
            ->limit($limit)
            ->getCompiledSelect();

        // Hapus entri berdasarkan id dalam subquery
        return $this->where("id IN ($subquery)")->delete();
    }
}
