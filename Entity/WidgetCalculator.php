<?php

namespace Victoire\Widget\CalculatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetCalculator.
 *
 * @ORM\Table("vic_widget_calculator")
 * @ORM\Entity
 */
class WidgetCalculator extends Widget
{
    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="suffix", type="string", length=255)
     */
    private $suffix;

    /**
     * @var text
     * @Assert\NotBlank
     * @ORM\Column(name="algorithm", type="text")
     */
    protected $algorithm;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Variable", mappedBy="widgetCalculator", cascade={"remove", "persist"}, orphanRemoval=true)
     */
    private $variables;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Calculator #'.$this->id;
    }

    /**
     * Set algorithm.
     *
     * @param string $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;

        return $this;
    }

    /**
     * Get algorithm.
     *
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->variables = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add variable.
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\Variable $variable
     *
     * @return WidgetCalculator
     */
    public function addVariable(\Victoire\Widget\CalculatorBundle\Entity\Variable $variable)
    {
        $this->variables[] = $variable;
        $variable->setWidgetCalculator($this);

        return $this;
    }

    /**
     * Remove variable.
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\Variable $variable
     */
    public function removeVariable(\Victoire\Widget\CalculatorBundle\Entity\Variable $variable)
    {
        $this->variables->removeElement($variable);
    }

    /**
     * Get variables.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Set label.
     *
     * @param string $label
     *
     * @return WidgetCalculator
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
     * Set suffix.
     *
     * @param string $suffix
     *
     * @return WidgetCalculator
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix.
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }
}
