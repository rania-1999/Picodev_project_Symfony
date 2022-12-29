<?php

namespace App\Form;

use App\Entity\Listeatt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ListeattType extends AbstractType
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

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Listeatt::class,
        ]);
    }
}
