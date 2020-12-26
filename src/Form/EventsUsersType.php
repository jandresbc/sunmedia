<?php

namespace App\Form;

use App\Entity\EventsUsers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsUsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ip_user',null,[
                "attr"=>["class"=>"form-control w-25 m-3 d-inline"]
            ])
            ->add('user_agent',null,[
                "attr"=>["class"=>"form-control w-25 m-3 d-inline"]
            ])
            ->add('code_county',null,[
                "attr"=>["class"=>"form-control w-25 m-3 d-inline"]
            ])
            ->add('event_key',null,[
                "attr"=>["class"=>"form-control w-25 m-3 d-inline"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EventsUsers::class,
        ]);
    }
}
