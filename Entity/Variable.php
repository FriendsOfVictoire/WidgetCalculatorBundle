<?php

namespace Victoire\Widget\CalculatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variable
 *
 * @ORM\Table("vic_widget_calculator_variable")
 * @ORM\Entity
 */
class Variable
{
    const TYPE_TEXT      = "type_text";
    const TYPE_NUMBER   = "type_number";
    const TYPE_CHOICE    = "type_choice";

    /**
     * @var integer
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
     * @ORM\Column(name="suffix", type="string", length=255)
     */
    private $suffix;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="ChoiceValue", mappedBy="variable", cascade={"remove", "persist"}, orphanRemoval=true)
     */
    private $choiceValues;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Trigger", mappedBy="variable", cascade={"remove", "persist"}, orphanRemoval=true)
     */
    private $triggers;

    /**
     * @var boolean
     *
     * @ORM\Column(name="radio", type="boolean", nullable=true)
     */
    private $radio;


    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="WidgetCalculator", inversedBy="variables")
     */
    private $widgetCalculator;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->choiceValues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->type = $this::TYPE_NUMBER;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Variable
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Variable
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Variable
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add choiceValue
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\ChoiceValue $choiceValue
     *
     * @return Variable
     */
    public function addChoiceValue(\Victoire\Widget\CalculatorBundle\Entity\ChoiceValue $choiceValue = null)
    {
        if ($choiceValue) {
            $this->choiceValues[] = $choiceValue;
            $choiceValue->setVariable($this);
        }

        return $this;
    }

    /**
     * Remove choiceValue
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\ChoiceValue $choiceValue
     */
    public function removeChoiceValue(\Victoire\Widget\CalculatorBundle\Entity\ChoiceValue $choiceValue)
    {
        $this->choiceValues->removeElement($choiceValue);
    }

    /**
     * Get choiceValues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChoiceValues()
    {
        return $this->choiceValues;
    }

    /**
     * Set widgetCalculator
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\WidgetCalculator $widgetCalculator
     *
     * @return Variable
     */
    public function setWidgetCalculator(\Victoire\Widget\CalculatorBundle\Entity\WidgetCalculator $widgetCalculator = null)
    {
        $this->widgetCalculator = $widgetCalculator;

        return $this;
    }

    /**
     * Get widgetCalculator
     *
     * @return \Victoire\Widget\CalculatorBundle\Entity\WidgetCalculator
     */
    public function getWidgetCalculator()
    {
        return $this->widgetCalculator;
    }

    /**
     * Set radio
     *
     * @param boolean $radio
     *
     * @return Variable
     */
    public function setRadio($radio)
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * Get radio
     *
     * @return boolean
     */
    public function isRadio()
    {
        return $this->radio;
    }

    /**
     * Set suffix
     *
     * @param string $suffix
     *
     * @return Variable
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Get radio
     *
     * @return boolean
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Add trigger
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\Trigger $trigger
     *
     * @return Variable
     */
    public function addTrigger(\Victoire\Widget\CalculatorBundle\Entity\Trigger $trigger = null)
    {
        if ($trigger) {
            $this->triggers[] = $trigger;
            $trigger->setVariable($this);
        }


        return $this;
    }

    /**
     * Remove trigger
     *
     * @param \Victoire\Widget\CalculatorBundle\Entity\Trigger $trigger
     */
    public function removeTrigger(\Victoire\Widget\CalculatorBundle\Entity\Trigger $trigger)
    {
        $this->triggers->removeElement($trigger);
    }

    /**
     * Get triggers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTriggers()
    {
        return $this->triggers;
    }
}
