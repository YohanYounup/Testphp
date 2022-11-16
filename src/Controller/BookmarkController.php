<?php

namespace App\Controller;

use App\Model\BookmarkModel;
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
        $requestContent = $embed->get($request->get('url'));
        $result = $this->bookmarkModel->addBookmark($requestContent);
        if($result){

            return new Response('',204);
        }else{
            return new Response('',500);
        }
        
    }

    #[Route(
        '/bookmarks/{id}',
        methods: ['DELETE']
        )]
    public function deleteBookmark(Request $request): response
    {
        $array = $this->bookmarkModel->deleteBookmark($request->query->get('id'));
        if(!$array){

            return new Response('',204);
        }else{
            return new Response('',404);
        }
    }
  
}
