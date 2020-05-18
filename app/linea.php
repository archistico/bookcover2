<?php
namespace App;

use \App\Punto;

class Linea implements \App\iOggetto
{
    /**
     * Primo punto
     *
     * @var Punto
     */
    public $p1;

    /**
     * Secondo punto
     *
     * @var Punto
     */
    public $p2;

    /**
     * Get primo punto
     *
     * @return  Punto
     */ 
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * Set primo punto
     *
     * @param  Punto  $p1  Primo punto
     *
     * @return  self
     */ 
    public function setP1(Punto $p1)
    {
        $this->p1 = $p1;

        return $this;
    }

    /**
     * Get secondo punto
     *
     * @return  Punto
     */ 
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * Set secondo punto
     *
     * @param  Punto  $p2  Secondo punto
     *
     * @return  self
     */ 
    public function setP2(Punto $p2)
    {
        $this->p2 = $p2;

        return $this;
    }

    public function __construct(Punto $p1, Punto $p2)
    {
        $this->p1 = $p1;
        $this->p2 = $p2;
    }

    public function Draw($pdf, $style = null) {
        if(is_array($style)) {
            $pdf->Line($this->getP1()->getX(), $this->getP1()->getY(), $this->getP2()->getX(), $this->getP2()->getY(), $style);
        } else {
            $pdf->Line($this->getP1()->getX(), $this->getP1()->getY(), $this->getP2()->getX(), $this->getP2()->getY());
        }
    }

    public function Text() {
        echo "Linea\n";
        echo $this->getP1()->Text()."\n";
        echo $this->getP2()->Text()."\n";
    }
}