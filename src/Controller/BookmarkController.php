<?php

namespace App\Controller;

use App\Model\BookmarkModel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpFoundation\Request;
use Embed\Embed;
#[AsController]


class BookmarkController extends AbstractController
{

    private $bookmarkModel;
    
    public function __construct( BookmarkModel $bookmarkModel){
        $this->bookmarkModel = $bookmarkModel;
    }

   
    #[Route(
        '/bookmarks',
        methods: ['GET']
        )]
    public function getAllBookmarks(): Response
    {
       
        $array = $this->bookmarkModel->getAllBookmarksData();
        return new JsonResponse( $array );
    }

    #[Route(
        '/bookmarks',
        methods: ['POST']
        )]
    public function addBookmark(Request $request): Response
    {
        $embed = new Embed();
        $requestContent = $embed->get($request->getContent());
        $array = $this->bookmarkModel->addBookmark($requestContent);
        return new JsonResponse( $array );
    }

    #[Route(
        '/bookmarks',
        methods: ['DELETE']
        )]
    public function deleteBookmark(): response
    {
        $array = $this->bookmarkModel->deleteBookmark();
        return new JsonResponse( $array );
    }
  
}
