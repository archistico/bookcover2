<?php

namespace App;

require_once __DIR__.'/../constant.php';

class Dorso
{
    private int $numero_pagine;
    private bool $rilegatura;
    private int $grammatura;

    public function __construct(int $numero_pagine, bool $rilegatura, int $grammatura)
    {
        $this->numero_pagine = $numero_pagine;
        $this->rilegatura = $rilegatura;
        $this->grammatura = $grammatura;
    }

    function roundUpToAny($n,$x=8) {
        return (ceil($n)%$x === 0) ? ceil($n) : round(($n+$x/2)/$x)*$x;
    }

    public function CalcolaDorso()
    {
        $spessore_fresata_85 = [
            8    => 0.04,
            16    => 0.11,
            24    => 0.16,
            32    => 0.19,
            40    => 0.21,
            48    => 0.23,
            56    => 0.27,
            64    => 0.31,
            72    => 0.34,
            80    => 0.38,
            88    => 0.42,
            96    => 0.45,
            104    => 0.49,
            112    => 0.52,
            120    => 0.56,
            128    => 0.59,
            136    => 0.63,
            144    => 0.67,
            152    => 0.71,
            160    => 0.75,
            168    => 0.79,
            176    => 0.83,
            184    => 0.86,
            192    => 0.90,
            200    => 0.94,
            208    => 0.98,
            216    => 1.02,
            224    => 1.06,
            232    => 1.11,
            240    => 1.14,
            248    => 1.16,
            256    => 1.20,
            264    => 1.24,
            272    => 1.28,
            280    => 1.31,
            288    => 1.35,
            296    => 1.39,
            304    => 1.43,
            312    => 1.46,
            320    => 1.50,
            328    => 1.54,
            336    => 1.57,
            344    => 1.61,
            352    => 1.65,
            360    => 1.69,
            368    => 1.74,
            376    => 1.77,
            384    => 1.80,
            392    => 1.83,
            400    => 1.86,
            408    => 1.90,
            416    => 1.94,
            424    => 1.98,
            432    => 2.01,
            440    => 2.05,
            448    => 2.09,
            456    => 2.13,
            464    => 2.17,
            472    => 2.20,
            480    => 2.24,
            488    => 2.28,
            496    => 2.33,
            504    => 2.37
        ];

        $spessore_fresata_100 = [
            8    => 0.05,
            16    => 0.10,
            24    => 0.15,
            32    => 0.20,
            40    => 0.25,
            48    => 0.29,
            56    => 0.34,
            64    => 0.39,
            72    => 0.44,
            80    => 0.48,
            88    => 0.52,
            96    => 0.57,
            104    => 0.61,
            112    => 0.66,
            120    => 0.71,
            128    => 0.76,
            136    => 0.81,
            144    => 0.86,
            152    => 0.91,
            160    => 0.95,
            168    => 1.00,
            176    => 1.05,
            184    => 1.09,
            192    => 1.14,
            200    => 1.19,
            208    => 1.24,
            216    => 1.28,
            224    => 1.33,
            232    => 1.38,
            240    => 1.43,
            248    => 1.48,
            256    => 1.52,
            264    => 1.57,
            272    => 1.61,
            280    => 1.66,
            288    => 1.71,
            296    => 1.76,
            304    => 1.80,
            312    => 1.84,
            320    => 1.89,
            328    => 1.93,
            336    => 1.98,
            344    => 2.03,
            352    => 2.08,
            360    => 2.13,
            368    => 2.18,
            376    => 2.23,
            384    => 2.28,
            392    => 2.33,
            400    => 2.38,
            408    => 2.42,
            416    => 2.45,
            424    => 2.50,
            432    => 2.54,
            440    => 2.59,
            448    => 2.65,
            456    => 2.70,
            464    => 2.74,
            472    => 2.79,
            480    => 2.84,
            488    => 2.89,
            496    => 2.94,
            504    => 2.98
        ];

        $spessore_fresata_120 = [
            8    => 0.06,
            16    => 0.12,
            24    => 0.18,
            32    => 0.23,
            40    => 0.29,
            48    => 0.35,
            56    => 0.41,
            64    => 0.46,
            72    => 0.51,
            80    => 0.57,
            88    => 0.63,
            96    => 0.68,
            104    => 0.74,
            112    => 0.79,
            120    => 0.85,
            128    => 0.91,
            136    => 0.96,
            144    => 1.02,
            152    => 1.08,
            160    => 1.14,
            168    => 1.20,
            176    => 1.25,
            184    => 1.31,
            192    => 1.36,
            200    => 1.42,
            208    => 1.48,
            216    => 1.53,
            224    => 1.59,
            232    => 1.65,
            240    => 1.71,
            248    => 1.77,
            256    => 1.83,
            264    => 1.89,
            272    => 1.94,
            280    => 1.98,
            288    => 2.04,
            296    => 2.10,
            304    => 2.16,
            312    => 2.22,
            320    => 2.28,
            328    => 2.34,
            336    => 2.39,
            344    => 2.45,
            352    => 2.50,
            360    => 2.56,
            368    => 2.62,
            376    => 2.68,
            384    => 2.73,
            392    => 2.79,
            400    => 2.85,
            408    => 2.91,
            416    => 2.97,
            424    => 3.03,
            432    => 3.08,
            440    => 3.14,
            448    => 3.20,
            456    => 3.26,
            464    => 3.32,
            472    => 3.38,
            480    => 3.43,
            488    => 3.49,
            496    => 3.54,
            504    => 3.60
        ];


        $spessore_cucita_85 = [
            8    => 0.06,
            16    => 0.12,
            24    => 0.17,
            32    => 0.23,
            40    => 0.29,
            48    => 0.35,
            56    => 0.38,
            64    => 0.40,
            72    => 0.43,
            80    => 0.45,
            88    => 0.50,
            96    => 0.55,
            104    => 0.57,
            112    => 0.60,
            120    => 0.65,
            128    => 0.70,
            136    => 0.75,
            144    => 0.80,
            152    => 0.85,
            160    => 0.90,
            168    => 0.93,
            176    => 0.95,
            184    => 0.97,
            192    => 1.00,
            200    => 1.05,
            208    => 1.10,
            216    => 1.15,
            224    => 1.20,
            232    => 1.25,
            240    => 1.30,
            248    => 1.35,
            256    => 1.40,
            264    => 1.45,
            272    => 1.50,
            280    => 1.55,
            288    => 1.55,
            296    => 1.58,
            304    => 1.60,
            312    => 1.65,
            320    => 1.70,
            328    => 1.75,
            336    => 1.80,
            344    => 1.84,
            352    => 1.88,
            360    => 1.92,
            368    => 1.95,
            376    => 1.98,
            384    => 2.00,
            392    => 2.05,
            400    => 2.10,
            408    => 2.15,
            416    => 2.20,
            424    => 2.23,
            432    => 2.25,
            440    => 2.27,
            448    => 2.30,
            456    => 2.35,
            464    => 2.40,
            472    => 2.45,
            480    => 2.50,
            488    => 2.52,
            496    => 2.55,
            504    => 2.59
        ];

        $spessore_cucita_100 = [
            8    => 0.07,
            16    => 0.15,
            24    => 0.22,
            32    => 0.30,
            40    => 0.35,
            48    => 0.40,
            56    => 0.45,
            64    => 0.50,
            72    => 0.55,
            80    => 0.60,
            88    => 0.65,
            96    => 0.70,
            104    => 0.75,
            112    => 0.80,
            120    => 0.85,
            128    => 0.90,
            136    => 0.95,
            144    => 1.00,
            152    => 1.05,
            160    => 1.10,
            168    => 1.20,
            176    => 1.25,
            184    => 1.30,
            192    => 1.35,
            200    => 1.40,
            208    => 1.45,
            216    => 1.52,
            224    => 1.60,
            232    => 1.63,
            240    => 1.65,
            248    => 1.67,
            256    => 1.70,
            264    => 1.77,
            272    => 1.85,
            280    => 1.93,
            288    => 2.00,
            296    => 2.05,
            304    => 2.10,
            312    => 2.15,
            320    => 2.20,
            328    => 2.25,
            336    => 2.30,
            344    => 2.35,
            352    => 2.40,
            360    => 2.45,
            368    => 2.50,
            376    => 2.56,
            384    => 2.63,
            392    => 2.67,
            400    => 2.70,
            408    => 2.78,
            416    => 2.85,
            424    => 2.92,
            432    => 3.00,
            440    => 3.05,
            448    => 3.10,
            456    => 3.17,
            464    => 3.25,
            472    => 3.30,
            480    => 3.35,
            488    => 3.42,
            496    => 3.50,
            504    => 3.55

        ];

        $spessore_cucita_120 = [
            8    => 0.07,
            16    => 0.15,
            24    => 0.22,
            32    => 0.30,
            40    => 0.35,
            48    => 0.40,
            56    => 0.45,
            64    => 0.50,
            72    => 0.57,
            80    => 0.65,
            88    => 0.73,
            96    => 0.80,
            104    => 0.95,
            112    => 1.00,
            120    => 1.05,
            128    => 1.10,
            136    => 1.15,
            144    => 1.20,
            152    => 1.25,
            160    => 1.30,
            168    => 1.35,
            176    => 1.40,
            184    => 1.50,
            192    => 1.60,
            200    => 1.65,
            208    => 1.70,
            216    => 1.75,
            224    => 1.80,
            232    => 1.88,
            240    => 1.95,
            248    => 2.02,
            256    => 2.10,
            264    => 2.15,
            272    => 2.20,
            280    => 2.30,
            288    => 2.40,
            296    => 2.45,
            304    => 2.50,
            312    => 2.55,
            320    => 2.60,
            328    => 2.65,
            336    => 2.70,
            344    => 2.75,
            352    => 2.80,
            360    => 2.85,
            368    => 2.90,
            376    => 2.95,
            384    => 3.00
        ];

        if($this->rilegatura == COPERTINA_RILEGATURA_FRESATA && $this->grammatura == COPERTINA_GRAMMATURA_85) {
            $spessore = $spessore_fresata_85;
        }

        if($this->rilegatura == COPERTINA_RILEGATURA_CUCITA && $this->grammatura == COPERTINA_GRAMMATURA_85) {
            $spessore = $spessore_cucita_85;
        }

        if($this->rilegatura == COPERTINA_RILEGATURA_FRESATA && $this->grammatura == COPERTINA_GRAMMATURA_100) {
            $spessore = $spessore_fresata_100;
        }

        if($this->rilegatura == COPERTINA_RILEGATURA_CUCITA && $this->grammatura == COPERTINA_GRAMMATURA_100) {
            $spessore = $spessore_cucita_100;
        }

        if($this->rilegatura == COPERTINA_RILEGATURA_FRESATA && $this->grammatura == COPERTINA_GRAMMATURA_120) {
            $spessore = $spessore_fresata_120;
        }

        if($this->rilegatura == COPERTINA_RILEGATURA_CUCITA && $this->grammatura == COPERTINA_GRAMMATURA_120) {
            $spessore = $spessore_cucita_120;
        }

        return $spessore[$this->roundUpToAny($this->numero_pagine)] * 10;
    }
}
