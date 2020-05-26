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

        $larghezza = $f3->get('POST.larghezza');
        $altezza = $f3->get('POST.altezza');
        $alette = $f3->get('POST.alette');

        $abbondanza = $f3->get('POST.abbondanza');
        $segnitaglio = $f3->get('POST.segnitaglio');
        $bordo = $f3->get('POST.bordo');

        $numeropagine = $f3->get('POST.numeropagine');
        $grammatura = $f3->get('POST.grammatura');
        $rilegatura = $f3->get('POST.rilegatura');

        if($rilegatura=="1") {
            $rilegatura=true;
        } else {
            $rilegatura=false;
        }

        $casaeditrice = $f3->get('POST.casaeditrice');
        $collana = $f3->get('POST.collana');

        $titolo = $f3->get('POST.titolo');
        $autore = $f3->get('POST.autore');

        $isbn = $f3->get('POST.isbn');
        $prezzo = $f3->get('POST.prezzo');

        $cover = new \App\Copertina($larghezza, $altezza, $abbondanza, $segnitaglio, $alette, $bordo, $rilegatura, $numeropagine, $grammatura);
        $cover->setTitolo($titolo)
            ->setAutore($autore)
            ->setPrezzo($prezzo)
            ->setISBN($isbn);
        
        $cover->Draw();
    }
}