<?php

namespace SanJorge\SanJorgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Admin\AdminBundle\Entity\Destino;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager as Manager;
use SanJorge\SanJorgeBundle\Entity\Clientes;

class ClientesController extends Controller
{
    public function indexAction(request $request)
    {
    	$resu = null;

    	//Fijo variables.
    	$mode = $request->get('mode');
    	$id   = $request->get('id');

    	//Si viene la acción para crear nuevo cliente, grabo el registro y muestro el ok.
    	if (isset($_POST['txt_nombre'])&&($mode=='add'))
    		return $this->grabarCliente($request);

    	//Muestro la lista de clientes.
		if ($mode=='list')
    		return $this->listarClientes($request);

    	//Borrar clientes.
		if ($mode=='del')
    		return $this->borrarClientes($request);

    	//Editar clientes.
		if ($mode=='edit')
    		return $this->editarClientes($request);    	

        return $this->render('SanJorgeBundle:Default:clientes.html.twig',array('mode'=>$mode,'id'=>$id,'resu'=>$resu));
    }

    //Mostrar el listado de clientes.
    private function listarClientes(request $request)
    {
    	$id = $request->get('id');
    	$em = $this->getDoctrine()->getManager();

        $resu = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Clientes')
                     ->findAll();

        return $this->render('SanJorgeBundle:Default:clientes.html.twig',array('mode'=>'list','id'=>$id,'resu'=>$resu));
    }

    //Editar el cliente.
    private function editarClientes(request $request)
    {
    	$id   = $request->get('id');
    	$mode = null;
    	$em   = $this->getDoctrine()->getManager();

        $cli  = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Clientes')
                     ->find($id);

        if (isset($_POST['txt_nombre']))
        {
	        $cli->setNombre($request->get('txt_nombre'));
	        $cli->setApellido($request->get('txt_apellido'));
	        $cli->setDni($request->get('txt_dni'));
	        $cli->setTelefono($request->get('txt_tel'));
	        $cli->setEmail($request->get('txt_email'));
	        $cli->setDireccion($request->get('txt_dir')); 
            $em->flush();

			$mode = 'edit_ok';
        }
        else
        	$mode = 'edit';

        return $this->render('SanJorgeBundle:Default:clientes.html.twig',array('mode'=>$mode,'id'=>$id,'resu'=>$cli));
    }    

    //Agregar un cliente a la bd.
    private function grabarCliente(request $request)
    {
    	$em = $this->getDoctrine()->getManager();

        //Creo la instancia de la clase.
        $cli = new Clientes();
        $cli->setNombre($request->get('txt_nombre'));
        $cli->setApellido($request->get('txt_apellido'));
        $cli->setDni($request->get('txt_dni'));
        $cli->setTelefono($request->get('txt_tel'));
        $cli->setEmail($request->get('txt_email'));
        $cli->setDireccion($request->get('txt_dir'));        

        //Grabo los datos.
        $em->persist($cli);
        $em->flush();
     
        //Nuevo id.
        $id = $cli->getId();

        $_POST=null;

        if ($id!=null)
	       	return $this->render('SanJorgeBundle:Default:clientes.html.twig',array('mode'=>'add_ok','id'=>$id));
	    else
	       	return $this->render('SanJorgeBundle:Default:clientes.html.twig',array('mode'=>'add_error','id'=>$id));
    }

    //Borrar clientes.
    private function borrarClientes(request $request)
    {
    	$id   = $request->get('id');
    	$em   = $this->getDoctrine()->getManager();
        $resu = $this->getDoctrine()
                     ->getRepository('SanJorgeBundle:Clientes')
                     ->find($id);

        $em->remove($resu);
        $em->flush();

		return $this->render('SanJorgeBundle:Default:clientes.html.twig',array('mode'=>'del_ok','id'=>$id));
    }
}
