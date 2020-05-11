<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Car;
use App\Task1\Track;

class CarTrackHtmlPresenter
{
    public function present(Track $track): string
    {
        $res_html = [];
        $t_cars = $track->cars;
        
        $res_html[] = '<div style="width: 70%; margin: 0 auto; display: flex; flex-flow: column nowrap; align-items: center;">';
        $res_html[] = '<h2>Довжина трека: ' . $track->getLapLength() . ' Кількість кругів: ' . $track->getLapsNumber() . '</h2>';
        $res_html[] = '</br>';
        $res_html[] = '<div style="width: 100%; display: flex; justify-content: space-around;">';
        foreach ($t_cars as $car) {
            $res_html[] = '<div>';
            $res_html[] = '<img src="' . $car->image . '">';
            $res_html[] = '<p>Марка автомобіля: <strong>' . $car->name . '</strong></p>';
            $res_html[] = '<p>Характеристики автомобіля: </p>';
            $res_html[] = '<p>Швидкість: ' . $car->speed . ' км/час</p>';
            $res_html[] = '<p>Витрати палива: ' . $car->fuelConsumption . ' літрів/100км</p>';
            $res_html[] = '<p>Час заправки: ' . $car->pitStopTime . '</p>';
            $res_html[] = '<p>Місткість баку: ' . $car->fuelTankVolume . '</p>';
            $res_html[] = '</div>';
        }
        $res_html[] = '</div>';
        $winner = $track->run();
        $res_html[] = "<h2 style='text-align: center'>Переможець гонки - " . $winner->name . "</h2>";
        $res_html[] = '</div>';
        
        $str_html = "";
        foreach($res_html as $rh) {
            $str_html .= $rh;
        }
        return $str_html;
    }
}