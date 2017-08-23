<?php

namespace FarmaciaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \FarmaciaBundle\Entity\CupomFiscal;
use Symfony\Component\HttpFoundation\Request;

class CaixaController extends Controller
{
    /**
     * @Route("/caixa", name="caixa_index")
     */
    public function indexAction()
    {
        return $this->render("FarmaciaBundle:Caixa:index.html.twig", array(
            'cupom' => array()
        ));
    }
    
    /**
     * @Route("/caixa/novo", name="caixa_novo")
     */
    public function novoCupomAction(Request $request) 
    {
        $session = $request->getSession();
        $em = $this ->getDoctrine() ->getManager();
        
        $cupom = new \FarmaciaBundle\Entity\CupomFiscal();
        $cupom->setValorTotal(0);
        
        $em->persist($cupom);
        $em->flush();
        
        $session->set("cupom", $cupom);
        
        return $this ->redirectToRoute("caixa_index");
        
    }
    
    /**
     * @Route("/caixa/add", name="caixa_add")
     */
    public function addProdutoAction(Request $request) 
    {
        $session = $request->getSession();
        
        $id = $request->get('codigo');
        
//        dump($request);die();
        $em = $this ->getDoctrine()->getManager();
        
        $produto = $em->getRepository("FarmaciaBundle:Produto")->find($id);
        
//        dump($produto); die();
        
        
        if ($produto == null)
        {
            $this->addFlash('erro', "Produto não encontrado!");
                    
        } else
        {
            $session->set("produto", $produto);
            
            $cupom = $session->get("cupom");
            $cupom->addProduto($produto);
            
            $em->flush();
        }
        
        return $this ->redirectToRoute("caixa_index");
    }
    
    /**
     * @Route("/caixa/finalizar", name="caixa_finalizar")
     */
    public function finalizarAction() 
    {
        
    }
    
    /**
     * @Route("/caixa/rest.{formato}")
     */
    public function restAction($formato) 
    {
        if($formato == "html")
        {
            return new \Symfony\Component\HttpFoundation\Response("Retorno de HTML");
        } else if ($formato == "json");
        {
            $vet = array("nome" => "Edir", "cidade" => "Curitiba");
            return $this->json($vet);
        }
    }
    
}
