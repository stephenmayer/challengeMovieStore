<?php

namespace MovieStore;

require_once('vendor/autoload.php');
require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('Type.php');
require_once('PriceCalculator.php');
require_once('PointsCalculator.php');

$economy = new PriceCalculator(
    1.5, 3, 1.5
);
$premium = new PriceCalculator(
    3, 1, 3
);
$standard = new PriceCalculator(
    2, 2, 1.5
);

$standardPoints = new PointsCalculator(
    1, 0, 0
);
$premiumPoints = new PointsCalculator(
    1, 1, 1
);

$childrens = new Type(
    'Childrens', $economy, $standardPoints
);
$newRelease = new Type(
    'New Release', $premium, $premiumPoints
);
$regular = new Type(
    'Regular', $standard, $standardPoints
);

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        $childrens
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        $regular
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        $newRelease
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement(false);
