<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    /**
     * @Route("/my_video", name="my_video")
     */
    public function myVideo(): Response
    {
        $videos = $this->getDoctrine()->getRepository(Video::class)->findAll();
        return $this->render('video/show.videos.html.twig', ['videos' => $videos]);
    }

    /**
     * @Route("/show_video/{youtube_id}", name="show_video")
     * @return Response
     */

    public function showOneVideo($youtube_id): Response
    {
        $video = $this->getDoctrine()->getRepository(Video::class)->findBy(['youtube_id' => $youtube_id]);
        return $this->render('video/show_one_video.html.twig', [
            'video' => $video[0]
        ]);
    }

    /**
     * @Route("/add_video", name="add_video")
     */
    public function addVideo(): Response
    {
        return $this->render('video/add_video.html.twig', []);
    }

    /**
     * @Route("/show_video_by_cat", name="show_video_by_cat")
     * @return Response
     */
    public function showByCategory(Request $request): Response
    {
        $category_id = $request->get('category_id');
        $videos = $this->getDoctrine()->getRepository(Video::class)->findBy(['category_id' => $category_id]);
        return $this->render('video/show.videos.html.twig',['videos' => $videos]);
    }

    public function showByJava(Request $request): Response
    {
//        $category_id = $request->get('category_id');
        $videos = $this->getDoctrine()->getRepository(Video::class)->find(3);
        return $this->render('video/show.videos.html.twig',['videos' => $videos]);
    }


}
