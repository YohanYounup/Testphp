<?php

namespace App\Model;

use App\Entity\Bookmark;
use App\Provider\ProviderFactory;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;

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
        return  $data ;
    }

    public function addBookmark($requestContent)
    {
        
        $provider = $this->providerFactory->getProvider($requestContent->providerName);
        $bookmark = $provider->getBookmark($requestContent);
        try {
            $this->entityManager->persist($bookmark);
            $this->entityManager->flush();
           
        } catch (Exception) {
           
            return false;
        }
      
        return true;
    }


    public function deleteBookmark($requestContent)
    {
       
            $entityRepo = $this->entityManager->getRepository(Bookmark::class);
            $product = $entityRepo->findOneBy($requestContent);

            if(!empty($product)){
                try {

                    $entityRepo->remove($product);
                    $entityRepo->flush();
                   

                } catch (Exception ) {
                   
                    return 500;
                }
            }else{
                return 'Not_Found';
                
            }
       
            return 204;
    }
  
}
