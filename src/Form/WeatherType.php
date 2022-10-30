<?php

namespace App\Form;

use App\Entity\Weather;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeatherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('time')
            ->add('cloudiness', ChoiceType::class, [
                'choices'  => Weather::getIntensities(),
                'choice_label' => function ($value) {
                    return $value;
                }
            ])
            ->add('temperature')
            ->add('precipitation', ChoiceType::class, [
                'choices'  => Weather::getIntensities(),
                'choice_label' => function ($value) {
                    return $value;
                }
            ])
            ->add('humidity')
            ->add('air_pressure')
            ->add('city')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Weather::class,
            'validation_groups' => [],
        ]);
    }
}
