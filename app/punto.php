<?php
namespace App;

class Punto implements \App\iOggetto
{
    /**
     * X
     *
     * @var float
     */
    public $x;

    /**
     * Y
     *
     * @var float
     */
    public $y;

    /**
     * Get the value of x
     */ 
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set the value of x
     *
     * @return  self
     */ 
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get the value of y
     */ 
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set the value of y
     *
     * @return  self
     */ 
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    public function __construct(float $x, float $y)
    {
        $this->x = (float)$x;
        $this->y = (float)$y;
    }
    
    public function Draw($pdf) 
    {
        
    }

    public function Text()
    {
        echo sprintf("X: %.2f Y: %.2f", $this->getX(), $this->getY());
    }
}