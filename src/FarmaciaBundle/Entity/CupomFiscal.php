<?php

namespace FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FarmaciaBundle\Entity\Produto;


/**
 * @ORM\Entity
 * @ORM\Table(name="cupom")
 */
class CupomFiscal {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $valorTotal;
    
    /**
     * @ORM\ManyToMany(targetEntity="Produto")
     * @ORM\JoinTable(name="cupom_produtos",
     *      joinColumns={@ORM\JoinColumn(name="cupom_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="produto_id", referencedColumnName="id")}
     *      )
     */
    private $produtos = array();
            
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produtos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set valorTotal
     *
     * @param string $valorTotal
     *
     * @return CupomFiscal
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return string
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * Add produto
     *
     * @param \FarmaciaBundle\Entity\Produto $produto
     *
     * @return CupomFiscal
     */
    public function addProduto(\FarmaciaBundle\Entity\Produto $produto)
    {
        $this->produtos[] = $produto;

        return $this;
    }

    /**
     * Remove produto
     *
     * @param \FarmaciaBundle\Entity\Produto $produto
     */
    public function removeProduto(\FarmaciaBundle\Entity\Produto $produto)
    {
        $this->produtos->removeElement($produto);
    }

    /**
     * Get produtos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProdutos()
    {
        return $this->produtos;
    }
}
