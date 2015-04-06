<?php

namespace Imie\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Imie\CoreBundle\Entity\Teacher;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="imie_www_default")
     * @Template()
     */
    public function indexAction()
    {
//        if ($this->getUser()->isStudent())
//            return $this->redirect('delivery');
//        else
//            return $this->redirect('target');
    }
}
