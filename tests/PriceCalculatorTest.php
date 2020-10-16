<?php

namespace MovieStore;

use PHPUnit\Framework\TestCase;
require '../PriceCalculator.php';

class PriceCalculatorTest extends TestCase
{
    public function provideExpectedAmounts()
    {
        return [
            'ten days' => [5, 5, 1, 10, 10],
            'three days' => [5, 3, 0, 10, 5],
            'free initially' => [0, 2, 2, 10, 16],
            'always free' => [0, 1, 0, 99, 0],
            'daily' => [1, 1, .5, 3, 2]
        ];
    }

    /**
     * @param $rentalAmount
     * @param $rentalDays
     * @param $lateAmount
     * @param $days
     * @param $expectedAmount
     *
     * @dataProvider provideExpectedAmounts
     */
    public function testGetTotal(
        $rentalAmount,
        $rentalDays,
        $lateAmount,
        $days,
        $expectedAmount
    )
    {
        $calculator = new PriceCalculator(
            $rentalAmount,
            $rentalDays,
            $lateAmount
        );
        $amount = $calculator->getTotal($days);
        $this->assertEquals($expectedAmount, $amount);
    }
}
