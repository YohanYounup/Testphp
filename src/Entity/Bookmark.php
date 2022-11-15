<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use JsonSerializable;
use stdClass;

#[Entity]
#[InheritanceType('SINGLE_TABLE')]
#[DiscriminatorColumn(name: 'type', type: 'string', length: 100)]
#[DiscriminatorMap(['media' => BookmarkMedia::class, 'image' => BookmarkImg::class])]

class Bookmark implements JsonSerializable
{
   
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private $id;

    #[ORM\Column(type: "string", length: 250, nullable: false)]
    private $url;  
   
    #[ORM\Column(type: "string", length: 70, nullable: false)]
    private $provider;  
  
    #[ORM\Column(type: "string", length: 250, nullable: false)]
    private $title;

    #[ORM\Column(type: "string", length: 100, nullable: false)]
    private $author;

    #[ORM\Column(type: "date")]
    private $publication;
    
    #[ORM\Column(type: "date")]
    private $added;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of provider
     */ 
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set the value of provider
     *
     * @return  self
     */ 
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of publication
     */ 
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set the value of publication
     *
     * @return  self
     */ 
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get the value of added
     */ 
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set the value of added
     *
     * @return  self
     */ 
    public function setAdded($added)
    {
        $this->added = $added;

        return $this;
    }


    public function jsonSerialize()
    {
          return [        
             
              'added' => $this->added,
              'publication' => $this->publication,
              'author' => $this->author,
              'title' => $this->title,
              'provider' => $this->provider,
              'url' => $this->url,
              'id' => $this->id,
          ];
    }

    public function jsonDeserialize(stdClass $bookmark)
    {
          $this->added = $bookmark->added;
          $this->publication = $bookmark->publication;
          $this->author = $bookmark->author;
          $this->title = $bookmark->title;
          $this->provider = $bookmark->provider;
          $this->url = $bookmark->url;
          $this->id = $bookmark->id;
    }
}
