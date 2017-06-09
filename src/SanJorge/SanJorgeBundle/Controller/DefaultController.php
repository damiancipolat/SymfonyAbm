<?php

namespace SanJorge\SanJorgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
    	echo 'hola';
    	exit;
        //return $this->render('SanJorgeBundle:Default:index.html.twig', array('name' => $name));
    }
}
