<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\CalculatorBundle\Entity\Variable;

/**
 * Edit Variable Type.
 */
class VariableType extends AbstractType
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
                    'label' => 'widget_calculator.form.variable.label.label',
                    'attr'  => [
                        'class' => 'calculator-variable-label',
                    ],
                ]
            )
            ->add('suffix', null, [
                    'label' => 'widget_calculator.form.variable.suffix.label',
                ]
            )
            ->add('type', ChoiceType::class, [
                    'label'   => 'widget_calculator.form.variable.choice.label',
                    'choices' => [
                        'widget_calculator.form.variable.choice.'.Variable::TYPE_NUMBER.'.label' => Variable::TYPE_NUMBER,
                        'widget_calculator.form.variable.choice.'.Variable::TYPE_TEXT.'.label' => Variable::TYPE_TEXT,
                        'widget_calculator.form.variable.choice.'.Variable::TYPE_CHOICE.'.label' => Variable::TYPE_CHOICE,
                    ],
                    'required' => 'required',
                    'attr'     => [
                        'class'                => 'selector-type',
                        'data-refreshOnChange' => 'true',
                    ],
                    'choices_as_values' => true
                ]
            )
            ->add('name', null, [
                    'label' => 'widget_calculator.form.variable.name.label',
                    'attr'  => [
                        'class'    => 'calculator-variable-name',
                        'onChange' => 'refreshCalculator()',
                    ],
                ]
            )
            ->add('triggers', CollectionType::class, [
                    'label'          => 'widget_calculator.form.variable.triggers.label',
                    'entry_type'           => TriggerType::class,
                    'required'       => false,
                    'allow_add'      => true,
                    'allow_delete'   => true,
                    'by_reference'   => false,
                    'prototype_name' => '__name_trigger__',
                ]
            );
            // manage conditional related type in preset data
            $builder->get('type')->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();
                self::manageRelatedType($data, $form->getParent());
            });

            // manage conditional related type in pre submit (ajax call to refresh view)
            $builder->get('type')->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();
                self::manageRelatedType($data, $form->getParent());
            });
    }

    /**
     * Add the related  type according to the type field.
     **/
    public static function manageRelatedType($type, $form)
    {
        switch ($type) {
            case Variable::TYPE_CHOICE:
                $form
                    ->add('choiceValues', CollectionType::class, [
                            'label'          => 'widget_calculator.form.variable.choiceValue.label',
                            'entry_type'           => ChoiceValueType::class,
                            'required'       => false,
                            'allow_add'      => true,
                            'allow_delete'   => true,
                            'by_reference'   => false,
                            'prototype_name' => '__name_option__',
                        ]
                    )
                    ->add('radio', CheckboxType::class, [
                            'label' => 'widget_calculator.form.variable.radio.label',
                        ]
                    );
                break;
            default:
                $form->remove('choiceValues');
                break;
        }
    }

    /**
     * bind to Variable entity.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Variable::class,
        ]);
    }
}
