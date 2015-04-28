<?php

namespace Victoire\Widget\CalculatorBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;
use Victoire\Widget\CalculatorBundle\Entity\Variable;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

/**
 * Edit Variable Type
 */
class VariableType extends AbstractType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', null, array(
                    'label' => 'widget_calculator.form.variable.label.label',
                    'attr' => array(
                        'class' => 'calculator-variable-label',
                    )
                )
            )
            ->add('suffix', null, array(
                    'label' => 'widget_calculator.form.variable.suffix.label'
                )
            )
            ->add('type', 'choice', array(
                    'label' => 'widget_calculator.form.variable.choice.label',
                    "choices" => array(
                        Variable::TYPE_NUMBER => "widget_calculator.form.variable.choice.".Variable::TYPE_NUMBER.".label",
                        Variable::TYPE_TEXT => "widget_calculator.form.variable.choice.".Variable::TYPE_TEXT.".label",
                        Variable::TYPE_CHOICE => "widget_calculator.form.variable.choice.".Variable::TYPE_CHOICE.".label"
                    ),
                    "required" => 'required',
                    'attr' => array(
                        'class' => 'selector-type',
                        'data-refreshOnChange' => "true",
                    )
                )
            )
            ->add('name', null, array(
                    'label' => 'widget_calculator.form.variable.name.label',
                    'attr' => array(
                        'class' => 'calculator-variable-name',
                        'onChange' => 'refreshCalculator()'
                    )
                )
            )
            ->add('triggers', 'collection', array(
                    'label' => 'widget_calculator.form.variable.triggers.label',
                    'type'          => 'victoire_widget_form_calculator_trigger',
                    'required'      => false,
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false,
                    "prototype_name" => "__name_trigger__"
                )
            )
            ;
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
     * Add the related  type according to the type field
     **/
    public static function manageRelatedType($type, $form)
    {
        switch ($type) {
            case Variable::TYPE_CHOICE:
                $form
                    ->add('choiceValues', 'collection', array(
                            'label' => 'widget_calculator.form.variable.choiceValue.label',
                            'type'          => 'victoire_widget_form_calculator_choice_value',
                            'required'      => false,
                            'allow_add'     => true,
                            'allow_delete'  => true,
                            'by_reference'  => false,
                            "prototype_name" => "__name_option__"
                        )
                    )
                    ->add('radio', 'checkbox', array(
                            'label' => 'widget_calculator.form.variable.radio.label'
                        )
                    );
                break;
            default:
                $form->remove('choiceValues');
                break;
        }
    }

    /**
     * bind to Variable entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\CalculatorBundle\Entity\Variable',
        ));
    }

    /**
     * get form name
     */
    public function getName()
    {
        return 'victoire_widget_form_calculator_variable';
    }
}
