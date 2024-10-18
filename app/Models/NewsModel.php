<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id_news';
    protected $allowedFields = ['id_news', 'judul_berita', 'slug', 'isi_berita'];

    public function getNewsById($id)
    {
        return $this->find($id);
    }

    public function saveNews($data)
    {
        $query = $this->db->table('news')->insert($data);
        return $query;
    }
}
