<?php

namespace Victoire\Widget\CalculatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trigger.
 *
 * @ORM\Table("vic_widget_calculator_trigger")
 * @ORM\Entity
 */
class Trigger
{
    const COMPARISON_EQUAL_TO = '==';
    const COMPARISON_GREATER_THAN = '>';
    const COMPARISON_LESS_THAN = '<';
    const COMPARISON_DIFFERENT_TO = '!=';
    const COMPARISON_GREATER_OR_EQUAL_TO = '>=';
    const COMPARISON_LESS_OR_EQUAL_TO = '<=';
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
     * @ORM\Column(name="target", type="string", length=255)
     */
    private $target;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="comparisonSymbol", type="string", length=255)
     */
    private $comparisonSymbol;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Variable", inversedBy="triggers")
     */
    private $variable;

    public function __construct()
    {
        $this->comparisonSymbol = $this::COMPARISON_EQUAL_TO;
    }

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
     * Set target.
     *
     * @param string $target
     *
     * @return Trigger
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target.
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return Trigger
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
     * @return Trigger
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

    /**
     * Set comparisonSymbol.
     *
     * @param string $comparisonSymbol
     *
     * @return Trigger
     */
    public function setComparisonSymbol($comparisonSymbol)
    {
        $this->comparisonSymbol = $comparisonSymbol;

        return $this;
    }

    /**
     * Get comparisonSymbol.
     *
     * @return string
     */
    public function getComparisonSymbol()
    {
        return $this->comparisonSymbol;
    }
}
