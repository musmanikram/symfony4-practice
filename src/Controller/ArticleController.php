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

        return $this->render('article/index.html.twig');
    }

	/**
	 * @Route("/news/{slug}")
	 */

    public function show($slug): Response
    {

	    $comments = [
		    'I ate a normal rock once. It did NOT taste like bacon!',
		    'Woohoo! I\'m going on an all-asteroid diet!',
		    'I like bacon too! Buy some from my site! bakinsomebacon.com',
	    ];

	    return $this->render('article/show.html.twig',
		    [
		    	'title' => ucwords(str_replace("-"," ", $slug)),
			    'comments' => $comments
		    ]
	    );
    }
}
