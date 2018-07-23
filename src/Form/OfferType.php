<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 23/07/18
 * Time: 14:24
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', TextType::class, ['label' => 'Catégorie'])
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('details', TextareaType::class, ['label' => 'Détails'])
            ->add('details', TextareaType::class, ['label' => 'Détails'])
            ->getForm();
    }
}