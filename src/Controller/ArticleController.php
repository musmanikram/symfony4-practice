<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ArticleController extends AbstractController
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
	 * @Route("/news/{slug}", name="article_show")
	 */

    public function show(string $slug): Response
    {

	    $comments = [
		    'I ate a normal rock once. It did NOT taste like bacon!',
		    'Woohoo! I\'m going on an all-asteroid diet!',
		    'I like bacon too! Buy some from my site! bakinsomebacon.com',
	    ];

	    return $this->render('article/show.html.twig',
		    [
		    	'title' => ucwords(str_replace("-"," ", $slug)),
			    'slug' => $slug,
				'comments' => $comments
		    ]
	    );
    }

	/**
	 * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
	 */
	public function toggleArticleHeart(string $slug, LoggerInterface $logger): JsonResponse
	{
		// TODO - actually heart/unheart the article!
		$logger->info('Article hearted');
		return new JsonResponse(['hearts' => rand(5, 100)]);
	}
}
