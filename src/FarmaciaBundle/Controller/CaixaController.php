<?php

namespace FarmaciaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CaixaController extends Controller
{
    /**
     * @route("/caixa")
     */
    public function indexAction()
    {
        return $this->render("FarmaciaBundle:Caixa:index.html.twig");
    }
}
