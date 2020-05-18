<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/constant.php');

use \App\Punto;
use \App\Copertina;
use \App\Dorso;


$cover = new Copertina(150, 210, 5, 3, 0, 10, COPERTINA_RILEGATURA_FRESATA, 104, COPERTINA_GRAMMATURA_100);
$cover->setTitolo('TITOLO')
        ->setAutore('AUTORE')
        ->setPrezzo(9.99)
        ->setISBN('978-88-12345-00-1');
        
$cover->Draw();
