<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $listNews = [
        "News 1",
        "News 2",
        "News 3",
        "News 4",
        "News 5",
        "News 6",
        "News 7",
        "News 8"
        
    ];
    public function index()
    {
        foreach($this->listNews as $news) {
            return view('news.index', ['listNews' => $this->listNews]);
        }
    }
    public function show(int $id)
    {
        $news = $this->listNews[$id] ?? "Not found";
        return view('news.show',['news' => $news]);
    }

}
