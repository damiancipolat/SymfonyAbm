<?php

namespace SanJorge\SanJorgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items")
 * @ORM\Entity
 */
class Items
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="idfactura", type="bigint", nullable=true)
     */
    private $idfactura;

    /**
     * @var string
     *
     * @ORM\Column(name="producto", type="string", length=200, nullable=true)
     */
    private $producto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="costo_unitario", type="float", nullable=true)
     */
    private $costoUnitario;

    /**
     * @var float
     *
     * @ORM\Column(name="impuestos", type="float", nullable=true)
     */
    private $impuestos;

    /**
     * @var float
     *
     * @ORM\Column(name="costo_total", type="float", nullable=true)
     */
    private $costoTotal;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idfactura
     *
     * @param integer $idfactura
     * @return Items
     */
    public function setIdfactura($idfactura)
    {
        $this->idfactura = $idfactura;
    
        return $this;
    }

    /**
     * Get idfactura
     *
     * @return integer 
     */
    public function getIdfactura()
    {
        return $this->idfactura;
    }

    /**
     * Set producto
     *
     * @param string $producto
     * @return Items
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;
    
        return $this;
    }

    /**
     * Get producto
     *
     * @return string 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Items
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set costoUnitario
     *
     * @param float $costoUnitario
     * @return Items
     */
    public function setCostoUnitario($costoUnitario)
    {
        $this->costoUnitario = $costoUnitario;
    
        return $this;
    }

    /**
     * Get costoUnitario
     *
     * @return float 
     */
    public function getCostoUnitario()
    {
        return $this->costoUnitario;
    }

    /**
     * Set impuestos
     *
     * @param float $impuestos
     * @return Items
     */
    public function setImpuestos($impuestos)
    {
        $this->impuestos = $impuestos;
    
        return $this;
    }

    /**
     * Get impuestos
     *
     * @return float 
     */
    public function getImpuestos()
    {
        return $this->impuestos;
    }

    /**
     * Set costoTotal
     *
     * @param float $costoTotal
     * @return Items
     */
    public function setCostoTotal($costoTotal)
    {
        $this->costoTotal = $costoTotal;
    
        return $this;
    }

    /**
     * Get costoTotal
     *
     * @return float 
     */
    public function getCostoTotal()
    {
        return $this->costoTotal;
    }
}