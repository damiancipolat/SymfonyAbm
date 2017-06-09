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
use SanJorge\SanJorgeBundle\Entity\Items;

class ItemsController extends Controller
{
    public function indexAction(request $request)
    {
    	$resu = null;

    	//Fijo variables.
    	$mode = $request->get('mode');
    	$id   = $request->get('id');

    	//Muestro la lista de clientes.
		if ($mode=='list')
    		return $this->listarItems($request);

        //Borro el item.
        if ($mode=='del')
            return $this->borrarItems($request);

        //Editar clientes.
        if ($mode=='edit')
            return $this->editarItem($request);          

        //Cuando recibo datos para guardar el nuevo item.
        if (($mode=='add')&&(isset($_POST['txt_unit'])))
            return $this->crearItem($request);           

        return $this->render('SanJorgeBundle:Default:itemsFact.html.twig',array('mode'=>$mode,'id'=>$id,'resu'=>$resu));
    }

    //Listo todos los items de una factura.
    private function listarItems(request $request)
    {
        $id    = $request->get('id');

        //Traigo todos los items de la factura.
        $em    = $this->getDoctrine()->getManager();
        $items = $this->getDoctrine()
                      ->getRepository('SanJorgeBundle:Items')
                      ->findBy(array('idfactura'=>$id));

        return $this->render('SanJorgeBundle:Default:itemsFact.html.twig',array('mode'=>'list','id'=>$id,'resu'=>$items));
    }

    //Guardo una nuevo item.
    private function crearItem(request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');

        //Creo la instancia de la clase.
        $item = new Items();
        $item->setIdfactura($id);
        $item->setProducto($request->get('txt_producto'));  
        $item->setCantidad($request->get('txt_cantidad'));
        $item->setCostoUnitario($request->get('txt_unit'));
        $item->setImpuestos($request->get('txt_imp'));
        $item->setCostoTotal($request->get('txt_total'));        

        //Grabo los datos.
        $em->persist($item);
        $em->flush();

        $_POST=null;

        if ($id!=null)
            return $this->render('SanJorgeBundle:Default:itemsFact.html.twig',array('mode'=>'item_ok','id'=>$id));
        else
            return $this->render('SanJorgeBundle:Default:itemsFact.html.twig',array('mode'=>'item_error','id'=>$id)); 
    }

    //Editar el cliente.
    private function editarItem(request $request)
    {
        $id   = $request->get('id');
        $mode = null;
        $em   = $this->getDoctrine()->getManager();

        $item = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Items')
                     ->find($id);

        if (isset($_POST['txt_producto']))
        {
            $item->setProducto($request->get('txt_producto'));  
            $item->setCantidad($request->get('txt_cantidad'));
            $item->setCostoUnitario($request->get('txt_unit'));
            $item->setImpuestos($request->get('txt_imp'));
            $item->setCostoTotal($request->get('txt_total'));  
            $id = $item->getIdfactura();
            $em->flush();

            $mode = 'edit_ok';
        }
        else
            $mode = 'edit';

        return $this->render('SanJorgeBundle:Default:itemsFact.html.twig',array('mode'=>$mode,'id'=>$id,'resu'=>$item));
    }      

    //Borrar items.
    private function borrarItems(request $request)
    {
        $id   = $request->get('id');
        $em   = $this->getDoctrine()->getManager();

        $item = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Items')
                     ->find($id);

        $idfact = $item->getIdfactura();

        $em->remove($item);
        $em->flush();

        return $this->render('SanJorgeBundle:Default:itemsFact.html.twig',array('mode'=>'del_ok','id'=>$idfact));                     
    }
}
