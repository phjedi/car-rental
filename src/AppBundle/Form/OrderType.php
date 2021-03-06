<?php

namespace AppBundle\Form;

use AppBundle\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $years = range(date('Y'), date('Y') + 1);

        $builder
            ->add('client')
            ->add('car')
            ->add('office')
            ->add('startAt', DateTimeType::class, [
                'years'        => $years,
                'with_seconds' => false,
            ])
            ->add('endAt', DateTimeType::class, [
                'years'        => $years,
                'with_seconds' => false,
            ])
            ->add('returnOffice');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
