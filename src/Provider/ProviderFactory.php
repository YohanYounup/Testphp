<?php

namespace App\Factory;


class ProviderFactory 
{
    private $flickrProvider;
    private $vimeoProvider;

    public function __construct( VimeoProvider $vimeoProvider, FlickrProvider $flickrProvider){
        $this->vimeoProvider = $vimeoProvider;
        $this->flickrProvider = $flickrProvider;
    }
  
  public function getProvider($ProviderName)
  {
    switch ($ProviderName) {
        case 'flickr':
            $provider = $this->flickrProvider;
            break;
        // Another Provider
        // case 'vimeo':
        //     $provider = $this->vimeoProvider;
        //     break;

        default:
            $provider = $this->vimeoProvider;
            break;
    }
    return $provider;
  }
}
