<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'san_jorge_clientes' => array (  0 =>   array (    0 => 'mode',    1 => 'id',  ),  1 =>   array (    '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\ClientesController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'mode',    ),    2 =>     array (      0 => 'text',      1 => '/clientes',    ),  ),),
        'san_jorge_facturas' => array (  0 =>   array (    0 => 'mode',    1 => 'id',  ),  1 =>   array (    '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\FacturasController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'mode',    ),    2 =>     array (      0 => 'text',      1 => '/facturas',    ),  ),),
        'san_jorge_items' => array (  0 =>   array (    0 => 'mode',    1 => 'id',  ),  1 =>   array (    '_controller' => 'SanJorge\\SanJorgeBundle\\Controller\\ItemsController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]+',      3 => 'mode',    ),    2 =>     array (      0 => 'text',      1 => '/items',    ),  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }
}
