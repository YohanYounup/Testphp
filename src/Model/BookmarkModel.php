<?php

namespace App\Model;

use App\Entity\Bookmark;
use App\Factory\ProviderFactory;
use Doctrine\ORM\EntityManagerInterface;

class BookmarkModel 
{
    private $entityManager;
    private $providerFactory;

    public function __construct( EntityManagerInterface $entityManager, ProviderFactory $providerFactory){
        $this->entityManager = $entityManager;
        $this->providerFactory = $providerFactory;
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
        
        $provider = $this->providerFactory->getProvider($requestContent->providerName);
        $bookmark = $provider->getBookmark($requestContent);
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
