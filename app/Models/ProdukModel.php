<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_produk', 'nama_barang', 'harga_barang', 'berat_barang', 'stok_barang'];

    public function getProductById($id)
    {
        return $this->find($id);
    }

    public function saveProduk($data)
    {
        $query = $this->db->table('produk')->insert($data);
        return $query;
    }
}
