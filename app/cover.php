<?php
namespace App;

class Cover
{
    public function Homepage($f3)
    {
        $f3->set('titolo', 'Homepage');
        $f3->set('contenuto', '/homepage.htm');
        echo \Template::instance()->render('templates/base.htm');
    }

    public function Nuova($f3)
    {

        $larghezza = $f3->get('GET.larghezza');
        $altezza = $f3->get('GET.altezza');
        $alette = $f3->get('GET.alette');

        $abbondanza = $f3->get('GET.abbondanza');
        $segnitaglio = $f3->get('GET.segnitaglio');
        $bordo = $f3->get('GET.bordo');

        $numeropagine = $f3->get('GET.numeropagine');
        $grammatura = $f3->get('GET.grammatura');
        $rilegatura = $f3->get('GET.rilegatura');

        if($rilegatura=="1") {
            $rilegatura=true;
        } else {
            $rilegatura=false;
        }

        $casaeditrice = $f3->get('GET.casaeditrice');
        $collana = $f3->get('GET.collana');

        $titolo = $f3->get('GET.titolo');
        $autore = $f3->get('GET.autore');

        $isbn = $f3->get('GET.isbn');
        $isbn = filter_var($isbn, FILTER_SANITIZE_NUMBER_INT);
        
        $prezzo = $f3->get('GET.prezzo');

        $cover = new \App\Copertina($larghezza, $altezza, $abbondanza, $segnitaglio, $alette, $bordo, $rilegatura, $numeropagine, $grammatura);
        $cover->setTitolo($titolo)
            ->setAutore($autore)
            ->setPrezzo($prezzo)
            ->setISBN($isbn);
        
        $cover->Draw();
    }
}