<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Equipment;
use App\Entity\Mark;
use App\Entity\Model;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('stock')
            ->add('price')
            ->add('description')
            ->add('launch_date')
            ->add('compatibility')
            ->add('waranty')
            ->add('weight')
            ->add('image')
            ->add('dimension')
            ->add('opinion')
            ->add('tec_spec')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'label',
                'placeholder' => 'Sélectionner une catégorie',

            ])
            ->add('mark', EntityType::class, [
                'class' => Mark::class,
                'choice_label' => 'name',
                'label' => 'Marque',
        'placeholder' => 'Sélectionner une marque',

            ])
            ->add('model', EntityType::class, [
                'class' => Model::class,
                'choice_label' => 'label',
            ])
            // ->add('Category', EntityType::class, [
            //     'class' => Category::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
