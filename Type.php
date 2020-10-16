<?php

namespace MovieStore;

class Type
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $points = 0;

    /**
     * @var int
     */
    private $extraPoints = 0;

    /**
     * @var int
     */
    private $extraPointsDays = 0;

    /**
     * @var \MovieStore\PriceCalculator
     */
    private $priceCalculator;

    /**
     * @var PointsCalculator
     */
    private $pointsCalculator;

    /**
     * @param string $name
     * @param \MovieStore\PriceCalculator $priceCalculator
     * @param PointsCalculator $pointsCalculator
     */
    public function __construct(
        string $name, PriceCalculator $priceCalculator, PointsCalculator $pointsCalculator
    ) {
        $this->name = $name;
        $this->priceCalculator = $priceCalculator;
        $this->pointsCalculator = $pointsCalculator;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    public function getTotal(int $daysRented): float
    {
        return $this->priceCalculator->getTotal($daysRented);
    }

    public function getPoints(int $daysRented): int
    {
        return $this->pointsCalculator->points($daysRented);
    }
}
