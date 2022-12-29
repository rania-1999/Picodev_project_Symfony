<?php

namespace App\Form;

use App\Entity\Arbitre;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArbitreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('prenom', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('filiere', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('imageFile', VichImageType::class)
            ->add('disponibilite', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
          //  ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Arbitre::class,
        ]);
    }
}
