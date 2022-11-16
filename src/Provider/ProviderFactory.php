<?php

namespace App\Provider;



class ProviderFactory 
{
    private $flickrProvider;
    private $vimeoProvider;


    public function __construct( VimeoProvider $vimeoProvider, FlickrProvider $flickrProvider){
        $this->vimeoProvider = $vimeoProvider;
        $this->flickrProvider = $flickrProvider;
    }
  
  public function getProvider($provider)
  {
   
    switch ($provider) {
        case 'Flickr':
            $provider = $this->flickrProvider;
            break;
        
        case 'Vimeo':
            $provider = $this->vimeoProvider;
            break;

        default:
            $provider = $this->unknowProvider;
            break;
    }
    return $provider;
  }
}
