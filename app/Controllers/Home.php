<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\NewsModel;

class Home extends BaseController
{

    protected $m_news;
    public function __construct()
    {
        $this->m_news = new NewsModel();
    }
    public function index(): string
    {

        $data = [
            'breadcrumbs' => 'Tabel Berita',
            'news' => $this->m_news->findAll(),
        ];
        return view('landing/index', $data);
    }
}
