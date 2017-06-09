<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/')) {
            // san_jorge_homepage
            if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'san_jorge_homepage'));
            }

            // san_jorge_clientes
            if (0 === strpos($pathinfo, '/clientes') && preg_match('#^/clientes/(?P<mode>[^/]+)/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\ClientesController::indexAction',)), array('_route' => 'san_jorge_clientes'));
            }

            // san_jorge_facturas
            if (0 === strpos($pathinfo, '/facturas') && preg_match('#^/facturas/(?P<mode>[^/]+)/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\FacturasController::indexAction',)), array('_route' => 'san_jorge_facturas'));
            }

            // san_jorge_items
            if (0 === strpos($pathinfo, '/items') && preg_match('#^/items/(?P<mode>[^/]+)/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\ItemsController::indexAction',)), array('_route' => 'san_jorge_items'));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
