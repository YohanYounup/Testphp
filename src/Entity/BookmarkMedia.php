<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use JsonSerializable;

#[Entity]
class BookmarkMedia extends Bookmark implements JsonSerializable
{
  
    public function __construct()
    {
        $this->setType('media');
    }
    #[ORM\Column(type: "string", length: 100, nullable: false)]
    private $time;

    
    #[ORM\Column(type: "integer")]
    private $width;


    
    #[ORM\Column(type: "integer")]
    private $height;
   
    private $type = 'media';
   

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of height
     */ 
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     *
     * @return  self
     */ 
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function jsonSerialize(){
        $parentJson = parent::jsonSerialize();
 
       return [
           ...$parentJson,
           'width' => $this->width,
           'height' => $this->height,
           'time' => $this->time,
           'type' => $this->type,
        ];
    }

    public function jsonDeserialize($bookmark){
        parent::jsonDeserialize($bookmark);
 
        $this->height = $bookmark->height;
        $this->width = $bookmark->width;
        $this->time = $bookmark->time;
        
    }
    
}
