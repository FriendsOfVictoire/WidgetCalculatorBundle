<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Widget\CalculatorBundle\Entity\WidgetCalculator;

/**
 * WidgetCalculator form type.
 */
class WidgetCalculatorType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('label', null, [
                    'label'    => 'widget_calculator.form.label.label',
                    'required' => 'required',
                ]
            )
            ->add('suffix', null, [
                    'label' => 'widget_calculator.form.suffix.label',
                ]
            )
            ->add('algorithm', null, [
                    'label'    => 'widget_calculator.form.algorithm.label',
                    'required' => 'required',
                    'attr'     => [
                        'class' => 'calculator-algorithm',
                    ],
                ]
            )
            ->add('variables', CollectionType::class, [
                    'label'         => 'widget_calculator.form.variables.label',
                    'entry_type'    => VariableType::class,
                    'required'      => false,
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false,
                    'prototype'     => true,
                ]
            );
    }

    /**
     * bind form to WidgetCalculator entity.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => WidgetCalculator::class,
            'widget'             => 'Calculator',
            'translation_domain' => 'victoire',
        ]);
    }
}
