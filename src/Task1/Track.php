<?php

declare(strict_types=1);

namespace App\Task1;
use App\Task1\Car;

class Track
{
    protected $lapLength;
    protected $lapsNumber;
    public $cars = [];
    public $time = array();

    public function __construct(float $lapLength, int $lapsNumber)
    {
        $this->lapLength = $lapLength;
        $this->lapsNumber = $lapsNumber;
    }

    public function getLapLength(): float
    {
        return $this->lapLength;
    }

    public function getLapsNumber(): int
    {
        return $this->lapsNumber;
    }

    public function add(Car $car): void
    {
        array_push($this->cars, $car);
    }

    public function all(): array
    {
        $this->cars[] = [];
        return $this->cars;
    }

    public function run(): Car
    {
        $path = $this->lapLength * $this->lapsNumber;
        
    }
}

