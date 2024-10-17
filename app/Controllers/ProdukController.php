<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\Controller;

class ProdukController extends Controller
{
    protected $m_produk;
    public function __construct()
    {
        $this->m_produk = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'breadcrumbs' => 'Tabel Produk',
            'produk' => $this->m_produk->findAll(),
        ];
        return view('produk/index', $data);
    }

    public function store()
    {
        // Ambil data dari permintaan
        // $produkId = $this->request->getPost('produkId');
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga_barang' => $this->request->getPost('harga_barang'),
            'berat_barang' => $this->request->getPost('berat_barang'),
            'stok_barang' => $this->request->getPost('stok_barang')
        ];

        // Jika produkId ada, berarti kita melakukan update

        // Simpan produk baru
        $this->m_produk->saveProduk($data);
        // $response = [
        //     'success' => true,
        //     'message' => 'Produk berhasil disimpan.'
        // ];

        return redirect()->to('/produk'); // Mengembalikan respons JSON
    }

    public function edit($id)
    {
        $data = [
            'breadcrumbs' => 'Edit Data Produk',
            'produk' => $this->m_produk->find($id),
            'id' => $id,
        ];
        return view('produk/edit', $data);
    }

    public function update($id)
    {
        // Validasi input data
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'nama_barang' => 'required|min_length[3]|max_length[100]',
            'harga_barang' => 'required|numeric',
            'berat_barang' => 'required|numeric',
            'stok_barang' => 'required|numeric'
        ]);

        // Jalankan validasi
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, simpan pesan kesalahan di session
            session()->setFlashdata('errors', $validation->getErrors());

            // Kembalikan ke halaman form edit dengan id yang sama
            return redirect()->to('/produk/edit/' . $id)->withInput();
        }

        // Jika validasi berhasil, lanjutkan untuk memperbarui data
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'berat_barang' => $this->request->getVar('berat_barang'),
            'stok_barang' => $this->request->getVar('stok_barang'),
        ];

        // Cek apakah data berhasil diupdate
        if ($this->m_produk->update($id, $data)) {
            // Jika update berhasil, set flashdata dan redirect
            session()->setFlashdata('pesan', 'Data berhasil diperbarui.');
            return redirect()->to('/produk');
        } else {
            // Jika update gagal, set flashdata dan redirect kembali ke halaman edit
            session()->setFlashdata('pesan', 'Gagal memperbarui data.');
            return redirect()->to('/produk/edit/' . $id);
        }
    }


    public function delete($id)
    {
        $model = new ProdukModel();

        // Cek apakah produk ada sebelum dihapus
        if ($model->find($id)) {
            $model->delete($id);
            session()->setFlashdata('pesan', 'Produk berhasil dihapus.');

            // Mengembalikan respons sukses
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Jika produk tidak ditemukan
            session()->setFlashdata('pesan', 'Produk tidak ditemukan.');
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
