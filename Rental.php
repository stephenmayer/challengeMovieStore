<?php

namespace MovieStore;

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;

    /**
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * @return Movie
     */
    public function movie()
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function daysRented()
    {
        return $this->daysRented;
    }

    /**
     * @return float
     */
    public function amountDue(): float
    {
        return $this->movie->type()->getTotal(
            $this->daysRented()
        );
    }

    /**
     * @return float
     */
    public function points(): float
    {
        return $this->movie->type()->getPoints(
            $this->daysRented()
        );
    }
}
