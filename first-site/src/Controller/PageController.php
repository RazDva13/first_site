<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function homePage(): Response
    {
        /*
        $entityManager = $this->getDoctrine()->getManager();
        $page = new Page();
        $page->setKeywords('Любимые видео')
            ->setTitle('Любимое видео')
            ->setContent('Сайт для добавления видео удобной разметки')
            ->setDescription('Любимые видео');

        $entityManager->persist($page);
        $entityManager->flush();
        */

        $homePage = $this->getDoctrine()->getRepository(Page::class)->find(1);
        return $this->render('page/index.html.twig', ['homePage' => $homePage]);

    }
}
