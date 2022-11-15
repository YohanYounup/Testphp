<?php

namespace App\Model;

use App\Entity\Bookmark;
use App\Entity\BookmarkImg;
use App\Entity\BookmarkMedia;
use Doctrine\ORM\EntityManagerInterface;
use Embed\Embed\Extractor;
use stdClass;

class BookmarkModel 
{
    private $entityManager;

    public function __construct( EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function getAllBookmarksData()
    {
       
        $entityRepo = $this->entityManager->getRepository(Bookmark::class);
        $data = $entityRepo->findAll();
        dump($data);
        return  $data ;
    }

    public function addBookmark($requestContent)
    {
        $bookmark = null;
       
        switch ($requestContent->type) {
            case 'image':
                
                $bookmark = new BookmarkImg();
                

                break;
            
            case 'media':
                
                $bookmark = new BookmarkMedia();
                
    
                break;
            
            default:
            $bookmark = new Bookmark();
           
                break;
        }
        $bookmark->jsonDeserialize($requestContent);
        $entityRepo = $this->entityManager->getRepository($bookmark::class);
        $entityRepo->persist($bookmark);
        $entityRepo->flush();
        
    }



    public function deleteBookmark()
    {
        $entityRepo = $this->entityManager->getRepository(Bookmark::class);
        $product = $entityRepo->find('1');
        return  $product ;
    }
  
}
