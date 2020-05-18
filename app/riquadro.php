<?php
namespace App;

use \App\Punto;

class Riquadro implements \App\iOggetto
{
    /**
     * Primo punto
     *
     * @var Punto
     */
    private $p1;
    private $larghezza;
    private $altezza;

    public function __construct(Punto $p1, float $larghezza, float $altezza)
    {
        $this->p1 = $p1;
        $this->larghezza = $larghezza;
        $this->altezza = $altezza;
    }

    public function Draw($pdf, $style = null) {
        if(is_array($style)) {
            $pdf->Rect($this->p1->getX(), $this->p1->getY(), $this->larghezza, $this->altezza, 'D', array('all' => $style));
        } else {
            $pdf->Rect($this->p1->getX(), $this->p1->getY(), $this->larghezza, $this->altezza, 'D', '');
        }
    }

    public function Text() {
        echo "Riquadro\n";
        
    }

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
}