<?php

class Equipment
{
    private $lifePoints;
    private $partOfBody;

    public function __construct($lifePoints, $partOfBody)
    {
        $this->lifePoints = $lifePoints;
        $this->partOfBody = $partOfBody;
    }

    public function getLifePoints()
    {
        return $this->lifePoints;
    }

    public function getPartOfBody()
    {
        return $this->partOfBody;
    }
}