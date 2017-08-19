<?php

namespace FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="produto")
 */
class Produto 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; 
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nome;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $preco;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $categoria;
    
    /**
     * @ORM\ManyToOne(targetEntity="Marca")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     */
    private $marca;

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
     * Set nome
     *
     * @param string $nome
     *
     * @return Produto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set preco
     *
     * @param string $preco
     *
     * @return Produto
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get preco
     *
     * @return string
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Produto
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Produto
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }
}
