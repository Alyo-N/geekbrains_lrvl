<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FakeNewsService;
class NewsController extends Controller
{

    public function index(FakeNewsService $service)
    {
            $newsTmp = NewsTmp::with('category')->get();

            return view('news.index', [
                'listNews' => $newsTmp
                ]);
        
    }
    public function show(FakeNewsService $service, int $id)
    {   
        $allNews = $service -> getNews();
        $news = $allNews[$id] ?? "Not found";
        return view('news.show',['news' => $news]);
    }

}
