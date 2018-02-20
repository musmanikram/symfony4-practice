<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ArticleController.php',
        ]);*/

        return new Response("Hello");
    }

	/**
	 * @Route("/news/{slug}")
	 */

    public function show($slug): Response
    {
	    return new Response(
	    	sprintf("New Article: %s", $slug)
	    );
    }
}
