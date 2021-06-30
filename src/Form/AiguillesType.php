<?php

namespace App\Form;

use App\Entity\Marques;
use App\Entity\Aiguilles;
use App\Entity\TypeAiguilles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AiguillesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille')
            ->add('typeAiguilles', EntityType::class,[
                'class'=>TypeAiguilles::class,
                'choice_label'=>'nom'])
            ->add('quantite')
            ->add('prix')
            ->add('marque', EntityType::class,[
                'class'=>Marques::class,
                'choice_label'=>'nom'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aiguilles::class,
        ]);
    }
}
