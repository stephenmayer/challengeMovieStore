<?php

namespace MovieStore;

use PHPUnit\Framework\TestCase;

require_once('../vendor/autoload.php');
require_once('../Movie.php');
require_once('../Rental.php');
require_once('../Customer.php');
require_once('../PriceCalculator.php');
require_once('../PointsCalculator.php');

class CustomerTest extends TestCase
{
    public $customer;

    public function setUp(): void
    {
        parent::setUp();

        // define pricing structures
        $childrens = new PriceCalculator(
            1.5, 3, 1.5
        );
        $premium = new PriceCalculator(
            3, 1, 3
        );
        $standard = new PriceCalculator(
            2, 2, 1.5
        );

        // define frequent reward point structures
        $standardPoints = new PointsCalculator(
            1, 0, 0
        );
        $premiumPoints = new PointsCalculator(
            1, 1, 1
        );

        $rental1 = new Rental(
            new Movie(
                'Back to the Future',
                $childrens,
                $standardPoints
            ), 4
        );

        $rental2 = new Rental(
            new Movie(
                'Office Space',
                $standard,
                $standardPoints
            ), 3
        );

        $rental3 = new Rental(
            new Movie(
                'The Big Lebowski',
                $premium,
                $premiumPoints
            ), 5
        );

        $this->customer = new Customer('Joe Schmoe');

        $this->customer->addRental($rental1);
        $this->customer->addRental($rental2);
        $this->customer->addRental($rental3);
    }

    public function testGetAmount()
    {
        $expectedAmount = 21.5;
        $this->assertEquals($expectedAmount, $this->customer->getAmount());
    }

    public function testGetPoints()
    {
        $expectedPoints = 4;
        $this->assertEquals($expectedPoints, $this->customer->getPoints());
    }
}
