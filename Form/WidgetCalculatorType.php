<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;


/**
 * WidgetCalculator form type
 */
class WidgetCalculatorType extends WidgetType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('label', null, array(
                    'label' => 'widget_calculator.form.label.label',
                    "required" => "required"
                )
            )
            ->add('suffix', null, array(
                    'label' => 'widget_calculator.form.suffix.label',
                )
            )
            ->add('algorithm', null, array(
                    'label' => 'widget_calculator.form.algorithm.label',
                    'required' => 'required',
                    'attr' => array(
                        'class'=> 'calculator-algorithm'
                    )
                )
            )
            ->add('variables', 'collection', array(
                    'label' => 'widget_calculator.form.variables.label',
                    'type'          => 'victoire_widget_form_calculator_variable',
                    'required'      => false,
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false,
                    "prototype"     => true
                )
            )
            ;

    }


    /**
     * bind form to WidgetCalculator entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\CalculatorBundle\Entity\WidgetCalculator',
            'widget'             => 'Calculator',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_calculator';
    }
}
