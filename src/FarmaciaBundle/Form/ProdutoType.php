<?php

namespace FarmaciaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProdutoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome')
                ->add('preco', MoneyType::class, array(
                    "currency" => "BRL",
                    "label" => "Preço"
                ))
                ->add('categoria', ChoiceType::class, array(
                    "choices" => array(
                        "Remédio" => "remedio",
                        "Perfumaria" => "perfume",
                        "Higiene" => "higiene",
                    ),
                    "expanded" => false,
                    "multiple" => false,
                ))
                ->add('marca');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FarmaciaBundle\Entity\Produto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'farmaciabundle_produto';
    }


}
