<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Book');
        $books = $repository->findAll();

        return $this->render("library/bookList.html.twig", array('Books' => $books)) ;
    }

    /**
     * @Route("/{bookId}", name="bookInfo")
     */
    public function bookInfoAction($bookId)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Book');
        $book = $repository->find($bookId);

        return $this->render("library/bookInfo.html.twig", array('Book' => $book)) ;
    }
}
