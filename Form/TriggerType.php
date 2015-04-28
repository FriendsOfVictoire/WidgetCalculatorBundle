<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;
use Victoire\Widget\CalculatorBundle\Entity\Trigger;

/**
 * Edit Trigger Type
 */
class TriggerType extends AbstractType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('target', null, array(
                    'label' => 'widget_calculator.form.trigger.target.label'
                )
            )
            ->add('value', null, array(
                    'label' => 'widget_calculator.form.trigger.value.label'
                )
            )
            ->add('comparisonSymbol', 'choice', array(
                    'label' => false,
                    "choices" => array(
                        Trigger::COMPARISON_EQUAL_TO => Trigger::COMPARISON_EQUAL_TO,
                        Trigger::COMPARISON_GREATER_THAN => Trigger::COMPARISON_GREATER_THAN,
                        Trigger::COMPARISON_LESS_THAN => Trigger::COMPARISON_LESS_THAN,
                        Trigger::COMPARISON_DIFFERENT_TO => Trigger::COMPARISON_DIFFERENT_TO,
                        Trigger::COMPARISON_GREATER_OR_EQUAL_TO => Trigger::COMPARISON_GREATER_OR_EQUAL_TO,
                        Trigger::COMPARISON_LESS_OR_EQUAL_TO => Trigger::COMPARISON_LESS_OR_EQUAL_TO,
                    ),
                    "required" => 'required',
                )
            )
            ;
    }

    /**
     * bind to Trigger entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\CalculatorBundle\Entity\Trigger',
        ));
    }

    /**
     * get form name
     */
    public function getName()
    {
        return 'victoire_widget_form_calculator_trigger';
    }
}
