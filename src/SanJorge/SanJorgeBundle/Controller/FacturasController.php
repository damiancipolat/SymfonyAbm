<?php

namespace SanJorge\SanJorgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Admin\AdminBundle\Entity\Destino;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager as Manager;
use SanJorge\SanJorgeBundle\Entity\Clientes;
use SanJorge\SanJorgeBundle\Entity\Facturas;

class FacturasController extends Controller
{
    public function indexAction(request $request)
    {
    	$resu = null;

    	//Fijo variables.
    	$mode = $request->get('mode');
    	$id   = $request->get('id');

    	//Muestro la lista de clientes.
		if ($mode=='list')
    		return $this->listarFacturas($request);

        //Voy al formulario de alta de factura
        if (($mode=='add')&&(!isset($_POST['txt_cliente'])))
        {
            $em   = $this->getDoctrine()->getManager();
            $resu = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Clientes')
                     ->findAll();
        }

        //Cuando recibo datos para guardar la nueva factura.
        if (($mode=='add')&&(isset($_POST['txt_cliente'])))
            return $this->crearFacturas($request);   

        //Borrar.
        if ($mode=='del')
            return $this->borrarFacturas($request);

        return $this->render('SanJorgeBundle:Default:facturas.html.twig',array('mode'=>$mode,'id'=>$id,'resu'=>$resu));
    }

    //Traer todo el listado de facturas.
    private function listarFacturas(request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();

        $resu = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Facturas')
                     ->findAll();

        $facts = array();

        foreach ($resu as $fact)
        {
            //Traigo los items.
            $items = $this->getDoctrine()
                          ->getRepository('SanJorgeBundle:Items')
                          ->findBy(array('idfactura'=>$fact->getId()));

            $cli  = null;

            if ($fact->getIdcliente()!=null)
            {
                //Traigo los clientes.
                $cli  = $this->getDoctrine()
                              ->getRepository('SanJorgeBundle:Clientes')
                              ->find($fact->getIdcliente());
            }

            //Total.
            $total = 0;

            foreach ($items as $itemObj)
                $total = $total+$itemObj->getCostoTotal();

            array_push($facts,array("factura" => $fact ,"items"   => $items,"total"=>$total,"cliente"=>$cli));
        }

        return $this->render('SanJorgeBundle:Default:facturas.html.twig',array('mode'=>'list','id'=>$id,'facturas'=>$facts));
    }

    //Guardo una nueva factura.
    private function crearFacturas(request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Creo la instancia de la clase.
        $fac = new Facturas();
        $fac->setIdcliente($request->get('txt_cliente'));
        $fac->setFecha(new \DateTime('now'));   

        //Grabo los datos.
        $em->persist($fac);
        $em->flush();
     
        //Nuevo id.
        $id = $fac->getId();

        $_POST=null;

        if ($id!=null)
            return $this->render('SanJorgeBundle:Default:facturas.html.twig',array('mode'=>'fac_ok','id'=>$id));
        else
            return $this->render('SanJorgeBundle:Default:facturas.html.twig',array('mode'=>'fac_error','id'=>$id)); 
    }

    //Borro la factura.
    private function borrarFacturas(request $request)
    {
        //Borro todas las facturas.
        $id   = $request->get('id');
        $em   = $this->getDoctrine()->getManager();

        $fact = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Facturas')
                     ->find($id);

        //Borro todos los items de la factura.
        $items = $this->getDoctrine()
                      ->getRepository('SanJorgeBundle:Items')
                      ->findBy(array('idfactura'=>$id));   

        //Borro cada item.
        if (count($items)>0)
        {
            foreach ($items as $it)
                $em->remove($it);
        }

        $em->remove($fact);
        $em->flush();

        return $this->render('SanJorgeBundle:Default:facturas.html.twig',array('mode'=>'del_ok','id'=>$id));
    }
}
