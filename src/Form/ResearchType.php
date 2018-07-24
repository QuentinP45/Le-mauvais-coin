<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 24/07/18
 * Time: 10:50
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;

class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', SearchType::class, [
                'label' => 'Je recherche :'
            ])
            ->getForm();
    }
}