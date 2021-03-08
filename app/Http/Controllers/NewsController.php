<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\FakeNewsService;
class NewsController extends Controller
{

    public function index(FakeNewsService $service)
    {
        

            return view('news.index', [
                'listNews' => $service->getNews()
                ]);
        
    }
    public function show(FakeNewsService $service, int $id)
    {   
        $allNews = $service -> getNews();
        $news = $allNews[$id] ?? "Not found";
        return view('news.show',['news' => $news]);
    }

}
