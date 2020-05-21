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
}