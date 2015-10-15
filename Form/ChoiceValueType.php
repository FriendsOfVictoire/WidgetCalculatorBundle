<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Edit ChoiceValue Type.
 */
class ChoiceValueType extends AbstractType
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
            ->add('label', null, [
                    'label' => 'widget_calculator.form.option.value.label.label',
                ]
            )
            ->add('value', null, [
                    'label' => 'widget_calculator.form.option.value.value.label',
                ]
            );
    }

    /**
     * bind to choiceValue entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Victoire\Widget\CalculatorBundle\Entity\choiceValue',
        ]);
    }

    /**
     * get form name.
     */
    public function getName()
    {
        return 'victoire_widget_form_calculator_choice_value';
    }
}
