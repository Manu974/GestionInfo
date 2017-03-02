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
        $builder->add('achat', DateType::class);
    }

    public function getName()
    {
        return 'name';
    }

    public function getIp()
    {
        return 'ip';
    }

    public function getLocation()
    {
        return 'location';
    }

    public function getAchat()
    {
        return 'achat';
    }


}
