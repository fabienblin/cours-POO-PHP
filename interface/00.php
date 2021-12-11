<style>
    .DieselCar{
        color: red;
    }

    .ElectricCar{
        color: blue;
    }
</style>
<?php

interface IVehicule {
    public function toggle_engine();
    public function accelerate();
    public function slow();
    public function log($message);
}

class DieselCar implements IVehicule {
    const FUEL_CONSUMPTION = 0.3;
    const MAX_SPEED = 190;

    private $fuel_load = 10;
    private $is_engine_on = false;
    private $speed = 0;

    public function toggle_engine(){
        if($this->fuel_load > 0){
            $this->is_engine_on = !$this->is_engine_on;
            if($this->is_engine_on){
                $this->fuel_load -= self::FUEL_CONSUMPTION / 2;
                $this->log("Engine started");
            }
            else{
                $this->log("Engine off");
            }
        }
        else{
            $this->is_engine_on = false;
            $this->log("Can't start engine, no fuel");
        }
    }

    public function accelerate(){
        if($this->is_engine_on && $this->fuel_load > 0){
            if($this->speed < self::MAX_SPEED){
                $this->speed += 1;
                $this->fuel_load -= self::FUEL_CONSUMPTION;
                $this->log("Accelerating");
            }
            else{
                $this->log("Max speed");
            }
        }
        else {
            $this->log("Can't accelerate, no fuel");
        }
    }

    public function slow(){
        if($this->speed > 0){
            $this->speed -= 1;
            $this->log("Slowing");
        }
        else{
            $this->log("Stopped");
        }
    }

    public function log($message){
        echo "<span class='DieselCar'>DieselCar : {$message}; speed = {$this->speed}; fuel = {$this->fuel_load}</span><br>";
    }
}

class ElectricCar implements IVehicule {
    const BATTERY_CONSUMPTION = 0.3;
    const MAX_SPEED = 170;

    private $battery_load = 8;
    private $is_engine_on = false;
    private $speed = 0;

    public function toggle_engine(){
        if($this->battery_load > 0){
            $this->is_engine_on = !$this->is_engine_on;
            if($this->is_engine_on){
                $this->battery_load -= self::BATTERY_CONSUMPTION / 10;
                $this->log("Engine started");
            }
            else {
                $this->log("Engine off");
            }
        }
        else{
            $this->is_engine_on = false;
            $this->log("Can't start engine, battery flat");
        }
    }

    public function accelerate(){
        if($this->is_engine_on && $this->battery_load > 0){
            if($this->speed < self::MAX_SPEED){
                $this->speed += 1;
                $this->battery_load -= self::BATTERY_CONSUMPTION;
                $this->log("Accelerating");
            }
            else{
                $this->log("Max speed");
            }
        }
        else{
            $this->log("Can't accelerate, battery flat");
        }
    }

    public function slow(){
        if($this->speed > 0){
            $this->speed -= 1;
            $this->battery_load += self::BATTERY_CONSUMPTION / 5;
            $this->log("Slowing");
        }
        else{
            $this->log("Stopped");
        }
    }

    public function log($message){
        echo "<span class='ElectricCar'>ElectricCar : {$message}; speed = {$this->speed}; battery = {$this->battery_load}</span><br>";
    }
}

$diesel_car = new DieselCar();
$electric_car = new ElectricCar();

$diesel_car->toggle_engine();
$electric_car->toggle_engine();
echo "<br>";

for($i = 0; $i < 70; $i++){
    $diesel_car->accelerate();
    $electric_car->accelerate();
}
echo "<br>";

for($i = 0; $i < 80; $i++){
    $diesel_car->slow();
    $electric_car->slow();
}
echo "<br>";

$diesel_car->toggle_engine();
$electric_car->toggle_engine();