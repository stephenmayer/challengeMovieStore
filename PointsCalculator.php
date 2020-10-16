<?php


namespace MovieStore;


class PointsCalculator
{
    /**
     * @var int
     */
    private $points;

    /**
     * @var int
     */
    private $extraPoints;

    /**
     * @var int
     */
    private $extraPointsDays;

    public function __construct(int $points, int $extraPoints, int $extraPointsDays) {

        $this->points = $points;
        $this->extraPoints = $extraPoints;
        $this->extraPointsDays = $extraPointsDays;
    }

    /**
     * @param int $daysRented
     * @return int
     */
    public function getTotal(int $daysRented): int
    {
        return $this->points + $this->getExtraPoints($daysRented);
    }

    /**
     * @param int $daysRented
     * @return int
     */
    private function getExtraPoints(int $daysRented): int
    {
        if ($this->extraPoints && $daysRented > $this->extraPointsDays) {
            return $this->extraPoints;
        }
        return 0;
    }
}