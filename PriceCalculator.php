<?php


namespace MovieStore;


class PriceCalculator
{
    /**
     * @var int
     */
    private $rentalDays = 1;

    /**
     * @var float
     */
    private $rentalAmount;

    /**
     * @var float
     */
    private $lateAmount;

    /**
     * PriceCalculator constructor.
     * @param $rentalAmount
     * @param $rentalDays
     * @param $lateAmount
     */
    public function __construct($rentalAmount, $rentalDays, $lateAmount)
    {
        $this->rentalAmount = $rentalAmount;
        $this->rentalDays = $rentalDays;
        $this->lateAmount = $lateAmount;
    }

    /**
     * @param int $daysRented
     * @return float
     */
    public function getTotal(int $daysRented): float
    {
        $amount = $this->rentalAmount;
        if ($daysRented > $this->rentalDays) {
            $amount += $this->lateAmount * ($daysRented - $this->rentalDays);
        }
        return $amount;
    }

}