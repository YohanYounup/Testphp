<?php

namespace App\Factory;

use Embed\Embed;

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
   
    switch ($provider->providerName) {
        case 'flickr':
            $provider = $this->flickrProvider;
            break;
        
        case 'vimeo':
            $provider = $this->vimeoProvider;
            break;

        default:
            $provider = $this->unknowProvider;
            break;
    }
    return $provider;
  }
}
