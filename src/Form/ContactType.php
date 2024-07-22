<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'required'=>false,
                'label'=>"Nom"
            ])
            ->add('mail',TextType::class,[
                'required'=>false
            ])
            ->add('message',TextareaType::class,[
                'required'=>false
            ])
            ->add('service',ChoiceType::class,[
                'choices'=>[
                    'directeur'=>'cto@company.com',
                    'comptabilité'=>'compta@company.com',
                    'support'=>'support@company.com'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
        ]);
    }

}
