<?php

namespace App\Form;

use App\Entity\Evenement;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomevenement', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('descripevenement',Type\TextareaType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('dateevenement',DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'data' => new \DateTime(),
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('lieu', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('nbrePL', Type\TextType::class, array(
                'attr' => array('class' => 'form-control', 'style' => 'line-height: 20px;')))
            ->add('imageFile', VichImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
