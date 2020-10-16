<?php

namespace MovieStore;

require_once('vendor/autoload.php');
require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('PriceCalculator.php');
require_once('PointsCalculator.php');

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

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement(false);
