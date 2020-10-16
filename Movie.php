<?php

namespace MovieStore;

class Movie
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var PriceCalculator
     */
    private $priceCalculator;

    /**
     * @var PointsCalculator
     */
    private $pointsCalculator;

    /**
     * @param string $name
     * @param PriceCalculator $priceCalculator
     * @param PointsCalculator $pointsCalculator
     */
    public function __construct(string $name, PriceCalculator $priceCalculator, PointsCalculator $pointsCalculator)
    {
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

    /**
     * @return PriceCalculator
     */
    public function price(): PriceCalculator
    {
        return $this->priceCalculator;
    }

    /**
     * @return PointsCalculator
     */
    public function points(): PointsCalculator
    {
        return $this->pointsCalculator;
    }
}
