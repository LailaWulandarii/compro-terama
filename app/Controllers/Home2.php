<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function about(): string
    {
        return view('pages/about');
    }

    public function product(): string
    {
        return view('pages/product');
    }

    public function article(): string
    {
        return view('pages/article');
    }

    public function contact(): string
    {
        return view('pages/contact');
    }

    public function activity(): string
    {
        return view('pages/activity');
    }

    public function detail_product(): string
    {
        return view('pages/detail_product');
    }
    
    public function detail_article(): string
    {
        return view('pages/detail_article');
    }

    public function detail_activity(): string
    {
        return view('pages/detail_activity');
    }
}
