<?php

namespace MovieStore;

use Mustache_Engine;

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return array|Rental[]
     */
    public function getRentals(): array
    {
        return $this->rentals;
    }

    /**
     * @return string
     */
    public function statement($asHtml = false)
    {
        $mustache = new Mustache_Engine(['entity_flags' => ENT_QUOTES]);
        $templateFile = (!$asHtml) ? __DIR__ . '/templates/plaintext.tpl' : __DIR__ . '/templates/html.tpl';
        $template = file_get_contents($templateFile);
        return $mustache->render($template, $this);
    }

    public function getAmount()
    {
        $totalAmount = 0;
        foreach ($this->rentals as $rental) {
            $totalAmount += $rental->amountDue();
        }
        return $totalAmount;
    }


    public function getPoints()
    {
        $points = 0;
        foreach ($this->rentals as $rental) {
            $points += $rental->points();
        }
        return $points;
    }

}
