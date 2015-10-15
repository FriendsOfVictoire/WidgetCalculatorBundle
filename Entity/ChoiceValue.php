<?php

namespace Victoire\Widget\CalculatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChoiceValue.
 *
 * @ORM\Table("vic_widget_calculator_choice_value")
 * @ORM\Entity
 */
class ChoiceValue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Variable", inversedBy="choiceValues")
     */
    private $variable;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label.
     *
     * @param string $label
     *
     * @return ChoiceValue
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return ChoiceValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set variable.
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\Variable $variable
     *
     * @return ChoiceValue
     */
    public function setVariable(\Victoire\Widget\CalculatorBundle\Entity\Variable $variable = null)
    {
        $this->variable = $variable;

        return $this;
    }

    /**
     * Get variable.
     *
     * @return \Victoire\Widget\CalculatorBundle\Entity\Variable
     */
    public function getVariable()
    {
        return $this->variable;
    }
}
