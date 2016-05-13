<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\CalculatorBundle\Entity\Trigger;

/**
 * Edit Trigger Type.
 */
class TriggerType extends AbstractType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('target', null, [
                    'label' => 'widget_calculator.form.trigger.target.label',
                ]
            )
            ->add('value', null, [
                    'label' => 'widget_calculator.form.trigger.value.label',
                ]
            )
            ->add('comparisonSymbol', ChoiceType::class, [
                    'label'   => false,
                    'choices' => [
                        Trigger::COMPARISON_EQUAL_TO            => Trigger::COMPARISON_EQUAL_TO,
                        Trigger::COMPARISON_GREATER_THAN        => Trigger::COMPARISON_GREATER_THAN,
                        Trigger::COMPARISON_LESS_THAN           => Trigger::COMPARISON_LESS_THAN,
                        Trigger::COMPARISON_DIFFERENT_TO        => Trigger::COMPARISON_DIFFERENT_TO,
                        Trigger::COMPARISON_GREATER_OR_EQUAL_TO => Trigger::COMPARISON_GREATER_OR_EQUAL_TO,
                        Trigger::COMPARISON_LESS_OR_EQUAL_TO    => Trigger::COMPARISON_LESS_OR_EQUAL_TO,
                    ],
                    'required'          => 'required',
                    'choices_as_values' => true,
                ]
            );
    }

    /**
     * bind to Trigger entity.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trigger::class,
        ]);
    }
}
