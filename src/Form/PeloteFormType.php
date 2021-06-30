<?php

namespace App\Form;
use App\Entity\Marques;
use App\Entity\Pelotes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PeloteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('matiere')
            ->add('tailleAiguille')
            ->add('couleurNom')
            ->add('couleurNumero')
            ->add('longeure')
            ->add('grammage')
            ->add('echantillon')
            ->add('quantite')
            ->add('prix')
            ->add('imageFile', FileType::class, ['required' =>false])
            ->add('commentaire')
            ->add('marque', EntityType::class,[
                'class'=>Marques::class,
                'choice_label'=>'nom'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pelotes::class,
        ]);
    }
}
