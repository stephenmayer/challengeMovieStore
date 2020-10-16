<?php

namespace MovieStore;

use PHPUnit\Framework\TestCase;
require '../PointsCalculator.php';

class PointsCalculatorTest extends TestCase
{
    public function provideExpectedAmounts()
    {
        return [
            'ten days' => [1, 0, 0, 10, 1],
            'one days' => [1, 0, 0, 1, 1],
            'one day premium' => [1, 1, 1, 1, 1],
            'two day premium' => [1, 1, 1, 2, 2],
            'three day premium' => [1, 1, 1, 3, 2],
            'three day longer delay' => [1, 1, 3, 3, 1],
        ];
    }

    /**
     * @param $points
     * @param $extraPoints
     * @param $extraPointsDays
     * @param $days
     * @param $expectedTotal
     * @dataProvider provideExpectedAmounts
     */
    public function testGetTotal(
        $points,
        $extraPoints,
        $extraPointsDays,
        $days,
        $expectedTotal
    )
    {
        $calculator = new PointsCalculator(
            $points,
            $extraPoints,
            $extraPointsDays
        );
        $amount = $calculator->getTotal($days);
        $this->assertEquals($expectedTotal, $amount);
    }
}
