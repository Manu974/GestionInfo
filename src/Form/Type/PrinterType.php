<?php

namespace GestionInfo\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PrinterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class);
        $builder->add('ip', TextType::class);
        $builder->add('location', TextType::class);
        $builder->add('achat', TextType::class);
    }

    public function getName()
    {
        return 'printer';
    }

    


}
