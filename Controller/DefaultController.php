<?php

namespace LFX\FxUploaderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LFXFxUploaderBundle:Default:index.html.twig', array('name' => $name));
    }
}
