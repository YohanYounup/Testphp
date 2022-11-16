<?php

namespace App\Factory;

use DateTime;


class FlickrProvider 
{
 
    public function getBookmark($requestContent)
    {
       
        $json = []; 
        $json['title'] = $requestContent->title; //The page title
        $json['provider'] = $requestContent->providerName; //The provider name
        $json['url'] = $requestContent->url; //The canonical url
        $json['author'] = $requestContent->authorName; //The resource author
        $json['publication'] = $requestContent->publishedTime; //The published time of the resource
        $json['added'] = new DateTime("now"); //The published time of the resource
        $json['width'] = $requestContent->code->width; //The exact width of the embed code (if exists)
        $json['height'] = $requestContent->code->height; //The exact height of the embed code (if exists)
        $json['type'] =$requestContent->code->html; //The exact height of the embed code (if exists)
        
        
        return  json_encode($json) ;
    }

}
