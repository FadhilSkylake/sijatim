<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class NewsController extends Controller
{
    protected $m_news;
    public function __construct()
    {
        $this->m_news = new NewsModel();
    }

    public function index()
    {
        $data = [
            'breadcrumbs' => 'Tabel Berita',
            'news' => $this->m_news->findAll(),
        ];
        return view('news/index', $data);
    }

    public function store()
    {
        // Ambil data dari permintaan
        $data = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
        ];

        // Simpan berita baru
        $this->m_news->saveNews($data);

        return redirect()->to('/news'); // Kembalikan ke kelola berita
    }

    public function edit($id)
    {
        $data = [
            'breadcrumbs' => 'Edit Data Berita',
            'news' => $this->m_news->find($id),
            'id' => $id,
        ];
        return view('news/edit', $data);
    }

    public function update($id)
    {
        // Validasi input data
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'judul_berita' => 'required|min_length[3]|max_length[100]',
            'isi_berita' => 'required',
        ]);

        // Jalankan validasi
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, simpan pesan kesalahan di session
            session()->setFlashdata('errors', $validation->getErrors());

            // Kembalikan ke halaman form edit dengan id yang sama
            return redirect()->to('/news/edit/' . $id)->withInput();
        }

        // Jika validasi berhasil, lanjutkan untuk memperbarui data
        $data = [
            'judul_berita' => $this->request->getVar('judul_berita'),
            'isi_berita' => $this->request->getVar('isi_berita'),
        ];

        // Cek apakah data berhasil diupdate
        if ($this->m_news->update($id, $data)) {
            // Jika update berhasil, set flashdata dan redirect
            session()->setFlashdata('pesan', 'Data berhasil diperbarui.');
            return redirect()->to('/news');
        } else {
            // Jika update gagal, set flashdata dan redirect kembali ke halaman edit
            session()->setFlashdata('pesan', 'Gagal memperbarui data.');
            return redirect()->to('/news/edit/' . $id);
        }
    }


    public function delete($id)
    {
        $model = new NewsModel();

        // Cek apakah produk ada sebelum dihapus
        if ($model->find($id)) {
            $model->delete($id);
            session()->setFlashdata('pesan', 'Produk berhasil dihapus.');

            // Mengembalikan respons sukses
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Jika produk tidak ditemukan
            session()->setFlashdata('pesan', 'Berita tidak ditemukan.');
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
