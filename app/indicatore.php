<?php
namespace App;

use \App\Punto;
use \App\Linea;

class Indicatore implements \App\iOggetto
{
    /**
     * Punto
     *
     * @var Punto
     */
    private $p;

    /**
     * Lunghezza segni di taglio
     *
     * @var float
     */
    private $dimensione;

    /**
     * Abbondanza - distanza dal punto
     *
     * @var float
     */
    private $abbondanza;

    /**
     * Formato bool angoli [top, right, bottom, left]
     *
     * @var array
     */
    private $formato;

    private $top;
    private $right;
    private $bottom;
    private $left;

    private $linea_top;
    private $linea_right;
    private $linea_bottom;
    private $linea_left;

    public function __construct(Punto $p, float $dimensione, float $abbondanza, array $formato)
    {
        $this->p = $p;
        $this->dimensione = (float)$dimensione;
        $this->abbondanza = (float)$abbondanza;
        $this->formato = $formato;
        $this->top = $formato[0] ?? false;
        $this->right = $formato[1] ?? false;
        $this->bottom = $formato[2] ?? false;
        $this->left = $formato[3] ?? false;

        $this->linea_top = new Linea(new Punto($this->p->getX(), $this->p->getY()-$this->abbondanza), new Punto($this->p->getX(), $this->p->getY()-$this->abbondanza-$this->dimensione));
        $this->linea_bottom = new Linea(new Punto($this->p->getX(), $this->p->getY()+$this->abbondanza), new Punto($this->p->getX(), $this->p->getY()+$this->abbondanza+$this->dimensione));
        $this->linea_right = new Linea(new Punto($this->p->getX()+$this->abbondanza, $this->p->getY()), new Punto($this->p->getX()+$this->abbondanza+$this->dimensione, $this->p->getY()));
        $this->linea_left = new Linea(new Punto($this->p->getX()-$this->abbondanza, $this->p->getY()), new Punto($this->p->getX()-$this->abbondanza-$this->dimensione, $this->p->getY()));

    }

    public function Draw($pdf) {
        if($this->top) {
            $this->linea_top->Draw($pdf);
        }
        
        if($this->right) {
            $this->linea_right->Draw($pdf);
        }
        
        if($this->bottom) {
            $this->linea_bottom->Draw($pdf);
        }

        if($this->left) {
            $this->linea_left->Draw($pdf);
        }
    }

    public function Text() {
        echo "Indicatore\n";
        if($this->top) {
            $this->linea_top->Text();
        }
        
        if($this->right) {
            $this->linea_right->Text();
        }

        if($this->bottom) {
            $this->linea_bottom->Text();
        }

        if($this->left) {
            $this->linea_left->Text();
        }
    }

    /**
     * Get punto
     *
     * @return  Punto
     */ 
    public function getP()
    {
        return $this->p;
    }

    /**
     * Set punto
     *
     * @param  Punto  $p  Punto
     *
     * @return  self
     */ 
    public function setP(Punto $p)
    {
        $this->p = $p;

        return $this;
    }

    /**
     * Get formato bool angoli [top, right, bottom, left]
     *
     * @return  array
     */ 
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * Set formato bool angoli [top, right, bottom, left]
     *
     * @param  array  $formato  Formato bool angoli [top, right, bottom, left]
     *
     * @return  self
     */ 
    public function setFormato(array $formato)
    {
        $this->formato = $formato;

        return $this;
    }
}