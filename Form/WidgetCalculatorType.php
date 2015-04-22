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
        $builder
            ->add('seizure', null, array(
                    'label' => 'widget_calculator.form.seizure.label'
            ))            ->add('algorithm', null, array(
                    'label' => 'widget_calculator.form.algorithm.label'
            ));
        parent::buildForm($builder, $options);

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
