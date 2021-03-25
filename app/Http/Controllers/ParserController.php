<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\NewsJob;

class ParserController extends Controller
{
    protected $parsingLinks = [
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/games.rss',
        'https://news.yandex.ru/movies.rss',
        'https://news.yandex.ru/cosmos.rss',
        'https://news.yandex.ru/health.rss',
        'https://news.yandex.ru/cyber_sport.rss',
        'https://news.yandex.ru/auto_racing.rss'
 ];
    
    public function __invoke()
	{
       
        foreach($this->parsingLinks as $link) {
            NewsJob::dispatch($link);
        }
  
	echo "Задачи добавлены";
    }
}
