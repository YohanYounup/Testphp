<?php

namespace App\Factory;

use App\Entity\BookmarkMedia;
use DateTime;


class VimeoProvider 
{
  

    public function getBookmark($requestContent)
    {
        
        $bookmark = new BookmarkMedia;
       
        $bookmark->setTitle($requestContent->title); //The page title
        $bookmark->setProvider($requestContent->providerName); //The provider name
        $bookmark->setUrl($requestContent->url) ; //The canonical url
        $bookmark->setAuthor($requestContent->authorName) ; //The resource author
        $bookmark->setPublication($requestContent->publishedTime) ; //The published time of the resource
        $bookmark->setAdded(new DateTime("now"));  //The published time of the resource
        $bookmark->setWidth($requestContent->code->width) ; //The exact width of the embed code (if exists)
        $bookmark->setHeight($requestContent->code->height) ; //The exact height of the embed code (if exists)
        $bookmark->setType($requestContent->code->html) ; //The exact height of the embed code (if exists)
        
        
        return  $bookmark ;
    }

}
