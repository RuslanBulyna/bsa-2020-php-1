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

        foreach ($this->cars as $key => $car) {
            $time[$key] = 0;
            $path_to_pitstop = ($car->fuelTankVolume * 100) / $car->fuelConsumption;

            if ($path <= $path_to_pitstop) { 
                $time[$key] =  $path / $car->speed;
            } else
            {
                while ($path > $path_to_pitstop) {
                    $time[$key] = $time[$key] + ($path / $car->speed) +  ($car->pitStopTime / 3600);
                    $path = $path - $path_to_pitstop;
                }
                if ($path < $path_to_pitstop) {
                    $time[$key] = $time[$key] + ($path / $car->speed);
                }

            }
            $this->time[] =  $time[$key];
        }

        $t = $this->time[0];
        $winner = 0;
        
        foreach ($this->time as $key => $time) {
            if($t > $time){
                $t = $time;
                $winner = $key;
            }
        }
        return $this->cars[0];

    }
}

