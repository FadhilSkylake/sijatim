<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\ProdukModel;

class Home extends BaseController
{

    protected $m_news;
    protected $mProduk;
    public function __construct()
    {
        $this->m_news = new NewsModel();
        $this->mProduk = new ProdukModel();
    }
    public function index(): string
    {

        $data = [
            'breadcrumbs' => 'Tabel Berita',
            'news' => $this->m_news->findAll(),
            'produk' => $this->mProduk->findAll(),
        ];
        return view('landing/index', $data);
    }
}
