<?php

namespace GestionInfo\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CartridgeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('printerstype', TextType::class);
        $builder->add('inktype', TextType::class);
        $builder->add('inkname', TextType::class);
        $builder->add('quantite', IntegerType::class);
    }

    public function getName()
    {
        return 'cartridge';
    }

}
