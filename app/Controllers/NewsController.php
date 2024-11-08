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
        return view('berita/index', $data);
    }

    public function store()
    {
        // Ambil data dari permintaan
        $judul_berita = $this->request->getPost('judul_berita');
        $data = [
            'judul_berita' => $judul_berita,
            'isi_berita' => $this->request->getPost('isi_berita'),
            'slug' => url_title($judul_berita, '-', true), // Buat slug dari judul berita
            'date' => $this->request->getPost('date'),
        ];

        // Simpan berita baru
        $this->m_news->saveNews($data);

        return redirect()->to('/berita'); // Kembalikan ke kelola berita
    }


    public function edit($id)
    {
        $data = [
            'breadcrumbs' => 'Edit Data Berita',
            'news' => $this->m_news->find($id),
            'id' => $id,
        ];
        return view('berita/edit', $data);
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
            return redirect()->to('/berita/edit/' . $id)->withInput();
        }

        // Jika validasi berhasil, lanjutkan untuk memperbarui data
        $judul_berita = $this->request->getVar('judul_berita');
        $data = [
            'judul_berita' => $judul_berita,
            'isi_berita' => $this->request->getVar('isi_berita'),
            'slug' => url_title($judul_berita, '-', true), // Buat slug dari judul berita
            'date' => $this->request->getPost('date'),
        ];

        // Cek apakah data berhasil diupdate
        if ($this->m_news->update($id, $data)) {
            // Jika update berhasil, set flashdata dan redirect
            session()->setFlashdata('pesan', 'Data berhasil diperbarui.');
            return redirect()->to('/berita');
        } else {
            // Jika update gagal, set flashdata dan redirect kembali ke halaman edit
            session()->setFlashdata('pesan', 'Gagal memperbarui data.');
            return redirect()->to('/berita/edit/' . $id);
        }
    }

    public function delete($id)
    {
        $model = new NewsModel();

        // Cek apakah berita ada sebelum dihapus
        if ($model->find($id)) {
            $model->delete($id);
            session()->setFlashdata('pesan', 'Berita berhasil dihapus.');

            // Mengembalikan respons sukses
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Jika berita tidak ditemukan
            session()->setFlashdata('pesan', 'Berita tidak ditemukan.');
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
