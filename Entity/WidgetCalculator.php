<?php
namespace Victoire\Widget\CalculatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetCalculator
 *
 * @ORM\Table("vic_widget_calculator")
 * @ORM\Entity
 */
class WidgetCalculator extends Widget
{

    /**
     * @var text
     *
     * @ORM\Column(name="seizure", type="text")
     */
    protected $seizure;

    /**
     * @var text
     *
     * @ORM\Column(name="algorithm", type="text")
     */
    protected $algorithm;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent
     *
     * @return String
     */
    public function __toString()
    {
        return 'Calculator #'.$this->id;
    }


    /**
     * Set seizure
     *
     * @param string $seizure
     */
    public function setSeizure($seizure)
    {
        $this->seizure = $seizure;

        return $this;
    }

    /**
     * Get seizure
     *
     * @return string
     */
    public function getSeizure()
    {
        return $this->seizure;
    }

    /**
     * Set algorithm
     *
     * @param string $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;

        return $this;
    }

    /**
     * Get algorithm
     *
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

}
