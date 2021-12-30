<?php

class Car
{
    public const ALLOWED_ENERGIES = [
        'fuel',
        'electric',
    ];
    private string $energy;
    private int $energyLevel;
    private string $color;
    private int $nbWheels;
    private int $currentSpeed;
    private int $nbSeats;
    private bool $hasParkBrake;

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->setEnergy($energy);
    }

    public function setParkBrake(bool $hasParkBrake): bool
    {
        if ($hasParkBrake) {
            $hasParkBrake = false;
        } else {
            $hasParkBrake = true;
        }
        return $hasParkBrake;
    }

    public function start(bool $hasParkBrake)
    {
        if ($hasParkBrake) {
            throw new Exception("The Park Brake is on!!!");
        }
        $this->currentSpeed = 0;
        return "Start the car !";
    }

    public function checkError(bool $hasParkBrake)
    {
        try {
            return $this->start($hasParkBrake);
        } catch (Exception $e){
            $hasParkBrake = $this->setParkBrake($hasParkBrake);
            return 'Error message: '. $e->getMessage();
        } finally {
            return 'Ma voiture roule comme un donut';
        }
    }

    public function forward(): string
    {
        $this->currentSpeed = 15;
        return "Go !";
    }

    public function brake(): string
    {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed--;
            $sentence .= "Brake !!!";
        }
        $sentence .= "I'm stopped !";
        return $sentence;
    }

    public function getCurrentSpeed(): int
    {
        return $this->currentSpeed;
    }

    public function setCurrentSpeed(int $currentSpeed): void
    {
        if ($currentSpeed >= 0) {
            $this->currentSpeed = $currentSpeed;
        }
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getNbSeats(): int
    {
        return $this->nbSeats;
    }

    public function setNbSeats(int $nbSeats): void
    {
        $this->nbSeats = $nbSeats;
    }

    public function getNbWheels(): int
    {
        return $this->nbWheels;
    }

    public function setNbWheels(int $nbWheels): void
    {
        $this->nbWheels = $nbWheels;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): Car
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }
}