<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, ['label' => 'Name', 'required' => true, 'attr' => array('class' => 'form-control', 'placeholder' => 'Enter Name')] )
            ->add('apellido',  TextType::class, ['label' => 'Surname', 'required' => true, 'attr' => array('class' => 'form-control', 'placeholder' => 'Enter Surname')])
            ->add('email',  EmailType::class, ['label' => 'Email', 'required' => true, 'attr' => array('class' => 'form-control', 'placeholder' => 'Enter Email')])
            ->add('password',  PasswordType::class, ['label' => 'Password', 'required' => true, 'attr' => array('class' => 'form-control', 'placeholder' => 'Enter Password')])
            ->add('save',  SubmitType::class, ['attr' => array('class' => 'btn btn-success')]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario',
            'csrf_protetion' => false,
            'cascade_validation' => true,
            'allow_extra_fields' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuario';
    }


}
