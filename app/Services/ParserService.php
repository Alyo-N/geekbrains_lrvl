<?php declare(strict_types=1);

namespace App\Services;


use XmlParser;

class ParserService
{

   protected string $url;

   public function __construct(string $url) 
   {
        $this->url = $url;
   }


   public function start(): void
   {
   	  $xml = XmlParser::load($this->url);

   	  $data = $xml->parse([
   	  	  'title' => [
   	  	  	'uses' => 'channel.title'
		  ],
		  'link' => [
		  	'uses' => 'channel.link'
		  ],
		  'description' => [
		  	'uses' => 'channel.description'
		  ],
		  'image' => [
		  	'uses' => 'channel.image.url'
		  ],
		  'news' => [
		  	'uses' => 'channel.item[title,link,guid,description,pubDate]'
		  ]
	  ]);
      
      \Storage::disk('public')
        ->put('news/' . $this->url.".txt",json_encode($data));
   }
}  