<?php

namespace App;

use \App\Indicatore;
use \App\Punto;

class Copertina
{
        // Valori iniziali
        private float $pagina_larghezza;
        private float $pagina_altezza;
        private float $abbondanza;
        private float $segni_taglio;
        private float $alette_larghezza;
        private float $bordi_sicurezza;
        private bool $rilegatura;
        private int $pagine_numero;
        private int $grammatura;

        // Info aggiuntive
        private string $titolo;
        private string $ISBN;

        // Valori calcolati
        private $dorso_larghezza;
        private $foglio_altezza;
        private $foglio_larghezza;
        private $cover_altezza;
        private $cover_larghezza;

        // Indicatori
        private $indicatore_top_ext_sx;
        private $indicatore_top_ext_dx;
        private $indicatore_top_dor_sx;
        private $indicatore_top_dor_dx;

        private $indicatore_bot_ext_sx;
        private $indicatore_bot_ext_dx;
        private $indicatore_bot_dor_sx;
        private $indicatore_bot_dor_dx;

        // Riquadri
        private $riquadro_cover;
        private $riquadro_taglio;
        private $riquadro_sicurezza_fronte;
        private $riquadro_sicurezza_retro;
        private $riquadro_sicurezza_dorso;

        // Assi
        private $asse_retro;
        private $asse_dorso;
        private $asse_fronte;

        private $asse_logo_cover_1;
        private $asse_logo_cover_2;

        private $asse_bandella_1;
        private $asse_bandella_2;
        
        public function __construct(float $pagina_larghezza, float $pagina_altezza, float $abbondanza, float $segni_taglio, float $alette_larghezza, float $bordi_sicurezza, bool $rilegatura, int $pagine_numero, int $grammatura)
        {
                $this->pagina_larghezza = $pagina_larghezza;
                $this->pagina_altezza = $pagina_altezza;
                $this->abbondanza = $abbondanza;
                $this->segni_taglio = $segni_taglio;
                $this->alette_larghezza = $alette_larghezza;
                $this->bordi_sicurezza = $bordi_sicurezza;
                $this->rilegatura = $rilegatura;
                $this->pagine_numero = $pagine_numero;
                $this->grammatura = $grammatura;

                $this->CalcolaDorso();
                $this->CalcolaFoglio();
                $this->CalcolaCover();
                $this->CalcolaIndicatori();
        }

        public function CalcolaDorso()
        {
                $dorso = new Dorso($this->pagine_numero, $this->rilegatura, $this->grammatura);
                $this->dorso_larghezza = $dorso->CalcolaDorso();
        }

        public function CalcolaFoglio()
        {
                $this->foglio_altezza = $this->pagina_altezza + 2 * $this->abbondanza + 2 * $this->segni_taglio;
                $this->foglio_larghezza = 2 * $this->segni_taglio + 2 * $this->abbondanza + 2 * $this->pagina_larghezza + $this->dorso_larghezza + 2 * $this->alette_larghezza;
        }

        public function CalcolaCover()
        {
                $this->cover_altezza = $this->pagina_altezza + 2 * $this->abbondanza;
                $this->cover_larghezza = 2 * $this->abbondanza + 2 * $this->pagina_larghezza + $this->dorso_larghezza + 2 * $this->alette_larghezza;
        }

        public function CalcolaIndicatori()
        {
                // Dipende dal tipo di copertina, se con alette o senza
                if($this->alette_larghezza == 0)
                {
                        // Senza Alette
                        
                        // Punti
                        $p1 = new Punto($this->abbondanza + $this->segni_taglio, $this->abbondanza + $this->segni_taglio);
                        $p2 = new Punto($this->abbondanza + $this->segni_taglio + $this->pagina_larghezza, $this->abbondanza + $this->segni_taglio);
                        $p3 = new Punto($this->abbondanza + $this->segni_taglio + $this->pagina_larghezza + $this->dorso_larghezza, $this->abbondanza + $this->segni_taglio);
                        $p4 = new Punto($this->abbondanza + $this->segni_taglio + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->abbondanza + $this->segni_taglio);

                        $p5 = new Punto($this->abbondanza + $this->segni_taglio, $this->abbondanza + $this->segni_taglio + $this->pagina_altezza);
                        $p6 = new Punto($this->abbondanza + $this->segni_taglio + $this->pagina_larghezza, $this->abbondanza + $this->segni_taglio + $this->pagina_altezza);
                        $p7 = new Punto($this->abbondanza + $this->segni_taglio + $this->pagina_larghezza + $this->dorso_larghezza, $this->abbondanza + $this->segni_taglio + $this->pagina_altezza);
                        $p8 = new Punto($this->abbondanza + $this->segni_taglio + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->abbondanza + $this->segni_taglio + $this->pagina_altezza);

                        $p9  = new Punto($this->abbondanza + $this->segni_taglio + $this->bordi_sicurezza, $this->abbondanza + $this->segni_taglio + $this->bordi_sicurezza);
                        $p10 = new Punto($this->abbondanza + $this->segni_taglio + $this->pagina_larghezza + $this->dorso_larghezza + $this->bordi_sicurezza, $this->abbondanza + $this->segni_taglio + $this->bordi_sicurezza);
                        $p11 = new Punto($this->abbondanza + $this->segni_taglio + $this->pagina_larghezza, $this->abbondanza + $this->segni_taglio + $this->bordi_sicurezza);
                        

                        // Indicatori
                        $this->indicatore_top_ext_sx = new Indicatore($p1, $this->segni_taglio, $this->abbondanza, [true, false, false, true]);
                        $this->indicatore_top_dor_sx = new Indicatore($p2, $this->segni_taglio, $this->abbondanza, [true, false, false, false]);
                        $this->indicatore_top_dor_dx = new Indicatore($p3, $this->segni_taglio, $this->abbondanza, [true, false, false, false]);
                        $this->indicatore_top_ext_dx = new Indicatore($p4, $this->segni_taglio, $this->abbondanza, [true, true, false, false]);

                        $this->indicatore_bot_ext_sx = new Indicatore($p5, $this->segni_taglio, $this->abbondanza, [false, false, true, true]);
                        $this->indicatore_bot_dor_sx = new Indicatore($p6, $this->segni_taglio, $this->abbondanza, [false, false, true, false]);
                        $this->indicatore_bot_dor_dx = new Indicatore($p7, $this->segni_taglio, $this->abbondanza, [false, false, true, false]);
                        $this->indicatore_bot_ext_dx = new Indicatore($p8, $this->segni_taglio, $this->abbondanza, [false, true, true, false]);

                        // Riquadri
                        $this->riquadro_cover = new Riquadro($p1, 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->pagina_altezza);
                        $this->riquadro_taglio = new Riquadro(new Punto($this->segni_taglio, $this->segni_taglio), 2 * $this->pagina_larghezza + $this->dorso_larghezza + 2 * $this->abbondanza, $this->pagina_altezza + 2 * $this->abbondanza);

                        // Bordi sicurezza
                        $this->riquadro_sicurezza_fronte = new Riquadro($p9, $this->pagina_larghezza - 2 * $this->bordi_sicurezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);
                        $this->riquadro_sicurezza_retro = new Riquadro($p10, $this->pagina_larghezza - 2 * $this->bordi_sicurezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);
                        $this->riquadro_sicurezza_dorso = new Riquadro($p11, $this->dorso_larghezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);

                        // Assi
                        $this->asse_retro = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza / 2, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza / 2, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_dorso = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->dorso_larghezza / 2, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->dorso_larghezza / 2, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_fronte = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->pagina_larghezza / 2  + $this->dorso_larghezza, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->pagina_larghezza / 2  + $this->dorso_larghezza, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));

                        /// -----------------------------------------------
                        // Assi nuovi
                        $this->asse_logo_cover_1 = new Linea(
                                new Punto(
                                        $this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->alette_larghezza + $this->pagina_larghezza / 2 + $this->dorso_larghezza + LOGO_COVER_LARGHEZZA/2, 
                                        $this->segni_taglio), 
                                new Punto(
                                        $this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->pagina_larghezza / 2 + $this->dorso_larghezza + $this->alette_larghezza + LOGO_COVER_LARGHEZZA/2,
                                        $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_logo_cover_2 = new Linea(
                                new Punto(
                                        $this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->alette_larghezza + $this->pagina_larghezza / 2 + $this->dorso_larghezza - LOGO_COVER_LARGHEZZA/2, 
                                        $this->segni_taglio), 
                                new Punto(
                                        $this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->pagina_larghezza / 2 + $this->dorso_larghezza + $this->alette_larghezza - LOGO_COVER_LARGHEZZA/2, 
                                        $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        
                        $this->asse_bandella_1 = new Linea(
                                new Punto(
                                        $this->segni_taglio, 
                                        $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza - ASSE_BANDELLA_Y), 
                                new Punto(
                                        $this->segni_taglio + 2 * $this->abbondanza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, 
                                        $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza - ASSE_BANDELLA_Y));

                        $this->asse_bandella_2 = new Linea(
                                new Punto(
                                        $this->segni_taglio, 
                                        $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza - ASSE_BANDELLA_Y - ASSE_BANDELLA_SPESSORE), 
                                new Punto(
                                        $this->segni_taglio + 2 * $this->abbondanza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, 
                                        $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza - ASSE_BANDELLA_Y - ASSE_BANDELLA_SPESSORE));

                        // Riquadri elementi grafici
                        // $this->riquadro_cover = new Riquadro();

                        /*
                        riquadro logo cover
                        x 37 y -20
                        L 76 A 14
                        */

                        /// -----------------------------------------------

                } else {
                        // Con Alette

                        // Punti
                        $p1 = new Punto($this->segni_taglio + $this->abbondanza, $this->segni_taglio + $this->abbondanza);
                        $p2 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza, $this->segni_taglio + $this->abbondanza);
                        $p3 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->pagina_larghezza, $this->segni_taglio + $this->abbondanza);
                        $p4 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza);
                        $p5 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza);
                        $p6 = new Punto($this->segni_taglio + $this->abbondanza + 2 * $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza);

                        $p7 = new Punto($this->segni_taglio + $this->abbondanza, $this->segni_taglio + $this->abbondanza + $this->pagina_altezza);
                        $p8 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza, $this->segni_taglio + $this->abbondanza + $this->pagina_altezza);
                        $p9 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->pagina_larghezza, $this->segni_taglio + $this->abbondanza + $this->pagina_altezza);
                        $p10 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza + $this->pagina_altezza);
                        $p11 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza + $this->pagina_altezza);
                        $p12 = new Punto($this->segni_taglio + $this->abbondanza + 2 * $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza + $this->pagina_altezza);
                        
                        $p13 = new Punto($this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza);
                        $p14 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->bordi_sicurezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza);
                        $p15 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->pagina_larghezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza);
                        $p16 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + $this->pagina_larghezza + $this->dorso_larghezza + $this->bordi_sicurezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza);
                        $p17 = new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza + $this->bordi_sicurezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza);

                        // Indicatori
                        $this->indicatore_top_ext_sx_aletta = new Indicatore($p1, $this->segni_taglio, $this->abbondanza, [true, false, false, true]);
                        $this->indicatore_top_ext_sx = new Indicatore($p2, $this->segni_taglio, $this->abbondanza, [true, false, false, false]);
                        $this->indicatore_top_dor_sx = new Indicatore($p3, $this->segni_taglio, $this->abbondanza, [true, false, false, false]);
                        $this->indicatore_top_dor_dx = new Indicatore($p4, $this->segni_taglio, $this->abbondanza, [true, false, false, false]);
                        $this->indicatore_top_ext_dx = new Indicatore($p5, $this->segni_taglio, $this->abbondanza, [true, false, false, false]);
                        $this->indicatore_top_ext_dx_aletta = new Indicatore($p6, $this->segni_taglio, $this->abbondanza, [true, true, false, false]);

                        $this->indicatore_bottom_ext_sx_aletta = new Indicatore($p7, $this->segni_taglio, $this->abbondanza, [false, false, true, true]);
                        $this->indicatore_bottom_ext_sx = new Indicatore($p8, $this->segni_taglio, $this->abbondanza, [false, false, true, false]);
                        $this->indicatore_bottom_dor_sx = new Indicatore($p9, $this->segni_taglio, $this->abbondanza, [false, false, true, false]);
                        $this->indicatore_bottom_dor_dx = new Indicatore($p10, $this->segni_taglio, $this->abbondanza, [false, false, true, false]);
                        $this->indicatore_bottom_ext_dx = new Indicatore($p11, $this->segni_taglio, $this->abbondanza, [false, false, true, false]);
                        $this->indicatore_bottom_ext_dx_aletta = new Indicatore($p12, $this->segni_taglio, $this->abbondanza, [false, true, true, false]);

                        // Riquadri
                        $this->riquadro_cover = new Riquadro($p1, 2 * $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza, $this->pagina_altezza);
                        $this->riquadro_taglio = new Riquadro(new Punto($this->segni_taglio, $this->segni_taglio), 2 * $this->alette_larghezza + 2 * $this->pagina_larghezza + $this->dorso_larghezza + 2 * $this->abbondanza, $this->pagina_altezza + 2 * $this->abbondanza);

                        // Bordi sicurezza
                        $this->riquadro_sicurezza_aletta_sx = new Riquadro($p13, $this->alette_larghezza - 2 * $this->bordi_sicurezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);
                        $this->riquadro_sicurezza_retro = new Riquadro($p14, $this->pagina_larghezza - 2 * $this->bordi_sicurezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);
                        $this->riquadro_sicurezza_dorso = new Riquadro($p15, $this->dorso_larghezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);
                        $this->riquadro_sicurezza_fronte = new Riquadro($p16, $this->pagina_larghezza - 2 * $this->bordi_sicurezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);
                        $this->riquadro_sicurezza_aletta_dx = new Riquadro($p17, $this->alette_larghezza - 2 * $this->bordi_sicurezza, $this->pagina_altezza - 2 * $this->bordi_sicurezza);

                        // Assi
                        $this->asse_aletta_sx = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza / 2, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->alette_larghezza / 2, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_retro = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza / 2 + $this->alette_larghezza, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza / 2 + $this->alette_larghezza, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_dorso = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->alette_larghezza + $this->dorso_larghezza / 2, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->dorso_larghezza / 2 + $this->alette_larghezza, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_fronte = new Linea(new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->alette_larghezza + $this->pagina_larghezza / 2  + $this->dorso_larghezza, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->pagina_larghezza / 2  + $this->dorso_larghezza + $this->alette_larghezza, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                        $this->asse_aletta_dx = new Linea(new Punto($this->segni_taglio + $this->abbondanza + 2 * $this->pagina_larghezza + $this->alette_larghezza + $this->alette_larghezza / 2  + $this->dorso_larghezza, $this->segni_taglio), new Punto($this->segni_taglio + $this->abbondanza + 2 * $this->pagina_larghezza + $this->alette_larghezza + $this->alette_larghezza / 2  + $this->dorso_larghezza, $this->segni_taglio + 2 * $this->abbondanza + $this->pagina_altezza));
                }
        }

        public function Draw()
        {
                if($this->alette_larghezza == 0)
                {
                        $this->CopertinaSenzaAlette();
                } else {
                        $this->CopertinaConAlette();
                }
        }

        public function CopertinaConAlette()
        {
                $pageLayout = array($this->foglio_larghezza, $this->foglio_altezza);
                $pdf = new \TCPDF('L', PDF_UNIT, $pageLayout, true, 'UTF-8', false);

                // set document information
                // $pdf->SetCreator('BookCover - Archistico.com');
                // $pdf->SetAuthor('Emilie Rollandin - Archistico.com');
                // $pdf->SetTitle('Cover');
                // $pdf->SetSubject('PDF bookcover');
                // $pdf->SetKeywords('PDF, book, cover');

                $pdf->setPageUnit('mm');

                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);

                // CMYK
                $pdf->SetDrawColor(0, 0, 0, 100);
                $pdf->SetFillColor(0, 0, 0, 100);
                $pdf->SetTextColor(0, 0, 0, 100);
                
                $border_style = array('all' => array('width' => 1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));

                // add a page
                $pdf->AddPage();

                // INIZIO LAYER SEGNI DI TAGLIO
                $pdf->startLayer('Segni_di_taglio', true, true);

                $this->indicatore_top_ext_sx_aletta->Draw($pdf);
                $this->indicatore_top_ext_sx->Draw($pdf);
                $this->indicatore_top_dor_sx->Draw($pdf);
                $this->indicatore_top_dor_dx->Draw($pdf);
                $this->indicatore_top_ext_dx->Draw($pdf);
                $this->indicatore_top_ext_dx_aletta->Draw($pdf);

                $this->indicatore_bottom_ext_sx_aletta->Draw($pdf);
                $this->indicatore_bottom_ext_sx->Draw($pdf);
                $this->indicatore_bottom_dor_sx->Draw($pdf);
                $this->indicatore_bottom_dor_dx->Draw($pdf);
                $this->indicatore_bottom_ext_dx->Draw($pdf);
                $this->indicatore_bottom_ext_dx_aletta->Draw($pdf);

                // FINE LAYER SEGNI DI TAGLIO
                $pdf->endLayer();

                // INIZIO LAYER BORDO COPERTINA CON ABBONDANZA
                $pdf->startLayer('Bordo_con_abbondanza', false, true);

                $this->riquadro_taglio->Draw($pdf);
                
                // FINE LAYER BORDO COPERTINA CON ABBONDANZA
                $pdf->endLayer();

                // INIZIO LAYER BORDO TAGLIO
                $pdf->startLayer('Bordo_di_taglio', false, true);

                $stile_bordo_cover = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(255, 0, 0));
                $this->riquadro_cover->Draw($pdf, $stile_bordo_cover);
                                
                // FINE LAYER BORDO TAGLIO
                $pdf->endLayer();

                // INIZIO LAYER BORDO SICUREZZA
                $pdf->startLayer('Bordo_sicurezza', false, true);
                $stile_bordo_sicurezza = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => '3,6', 'color' => array(255, 0, 0));

                $this->riquadro_sicurezza_aletta_sx->Draw($pdf, $stile_bordo_sicurezza);
                $this->riquadro_sicurezza_fronte->Draw($pdf, $stile_bordo_sicurezza);
                $this->riquadro_sicurezza_retro->Draw($pdf, $stile_bordo_sicurezza);
                $this->riquadro_sicurezza_dorso->Draw($pdf, $stile_bordo_sicurezza);
                $this->riquadro_sicurezza_aletta_dx->Draw($pdf, $stile_bordo_sicurezza);

                // FINE LAYER BORDO SICUREZZA
                $pdf->endLayer();

                // INIZIO LAYER ASSI
                $pdf->startLayer('Assi', false, true);
                $stile_asse = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => '6,3,1,3', 'color' => array(0, 255, 0));

                $this->asse_aletta_sx->Draw($pdf, $stile_asse);
                $this->asse_retro->Draw($pdf, $stile_asse);
                $this->asse_dorso->Draw($pdf, $stile_asse);
                $this->asse_fronte->Draw($pdf, $stile_asse);
                $this->asse_aletta_dx->Draw($pdf, $stile_asse);

                // NUOVI ASSI
                $this->asse_logo_cover_1->Draw($pdf, $stile_asse);
                $this->asse_logo_cover_2->Draw($pdf, $stile_asse);
                
                $this->asse_bandella_1->Draw($pdf, $stile_asse);
                $this->asse_bandella_2->Draw($pdf, $stile_asse);

                // FINE LAYER ASSI
                $pdf->endLayer();

                //Close and output PDF document
                $pdf->setFontSubsetting(false);
                $saveFile = false;
                if ($saveFile) {
                        $pdf->Output(__DIR__ . '/cover.pdf', 'F');
                } else {
                        $pdf->Output('cover.pdf', 'I');
                }
        }

        public function CopertinaSenzaAlette()
        {
                $pageLayout = array($this->foglio_larghezza, $this->foglio_altezza);
                $pdf = new \TCPDF('L', PDF_UNIT, $pageLayout, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Emilie Rollandin - Archistico.com');
                $pdf->SetTitle('Cover');
                $pdf->SetSubject('PDF bookcover');
                $pdf->SetKeywords('PDF, book, cover');

                $pdf->setPageUnit('mm');

                // remove default header/footer
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(false);

                // CMYK
                $pdf->SetDrawColor(0, 0, 0, 100);
                $pdf->SetFillColor(0, 0, 0, 100);
                $pdf->SetTextColor(0, 0, 0, 100);
                
                $border_style = array('all' => array('width' => 1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));

                // add a page
                $pdf->AddPage();

                // INIZIO LAYER SEGNI DI TAGLIO
                $pdf->startLayer('Segni_di_taglio', true, true, true);

                $this->indicatore_top_ext_sx->Draw($pdf);
                $this->indicatore_top_dor_sx->Draw($pdf);
                $this->indicatore_top_dor_dx->Draw($pdf);
                $this->indicatore_top_ext_dx->Draw($pdf);

                $this->indicatore_bot_ext_sx->Draw($pdf);
                $this->indicatore_bot_dor_sx->Draw($pdf);
                $this->indicatore_bot_dor_dx->Draw($pdf);
                $this->indicatore_bot_ext_dx->Draw($pdf);

                // FINE LAYER SEGNI DI ABBONDANZA
                $pdf->endLayer();

                // INIZIO LAYER BORDO COPERTINA CON ABBONDANZA
                $pdf->startLayer('Bordo_con_abbondanza', false, true);

                $this->riquadro_taglio->Draw($pdf);
                
                // FINE LAYER BORDO COPERTINA CON ABBONDANZA
                $pdf->endLayer();

                // INIZIO LAYER BORDO TAGLIO
                $pdf->startLayer('Bordo_di_taglio', false, true);

                $stile_bordo_cover = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(255, 0, 0));
                $this->riquadro_cover->Draw($pdf, $stile_bordo_cover);
                                
                // FINE LAYER BORDO TAGLIO
                $pdf->endLayer();                

                // INIZIO LAYER BORDO SICUREZZA
                $pdf->startLayer('Bordo_sicurezza', false, true, false);
                $stile_bordo_sicurezza = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => '3,6', 'color' => array(255, 0, 0));

                $this->riquadro_sicurezza_fronte->Draw($pdf, $stile_bordo_sicurezza);
                $this->riquadro_sicurezza_retro->Draw($pdf, $stile_bordo_sicurezza);
                $this->riquadro_sicurezza_dorso->Draw($pdf, $stile_bordo_sicurezza);

                // FINE LAYER BORDO SICUREZZA
                $pdf->endLayer();

                // INIZIO LAYER ASSI
                $pdf->startLayer('Assi', false, true, false);
                $stile_asse = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => '6,3,1,3', 'color' => array(0, 255, 0));

                $this->asse_retro->Draw($pdf, $stile_asse);
                $this->asse_dorso->Draw($pdf, $stile_asse);
                $this->asse_fronte->Draw($pdf, $stile_asse);

                // NUOVI ASSI
                $this->asse_logo_cover_1->Draw($pdf, $stile_asse);
                $this->asse_logo_cover_2->Draw($pdf, $stile_asse);
                
                $this->asse_bandella_1->Draw($pdf, $stile_asse);
                $this->asse_bandella_2->Draw($pdf, $stile_asse);
                
                // FINE LAYER ASSI
                $pdf->endLayer();

                                // INIZIO LAYER ISBN
                                $pdf->startLayer('ISBN', true, true, false);
                
                                if(!empty($this->ISBN)) {
                                        $nISBN = new \App\ISBN();
                                        $nISBN->Codifica($this->ISBN);
                                        $aISBN = str_split($nISBN->getISBN());
                
                                        // Disegna ISBN
                                        $Lmodulo = 0.33;
                                        $Hmodulo = 15;
                                        $bordo = 5;
                                        
                                        $posX = $this->segni_taglio + $this->abbondanza + $this->pagina_larghezza - $this->bordi_sicurezza - $Lmodulo*95 - $bordo;
                                        $posY = $this->pagina_altezza - $this->segni_taglio - $this->abbondanza - $this->bordi_sicurezza - $Hmodulo - $bordo+2;
                                        
                                        $pdf->SetFillColor(255,255,255);
                                        $pdf->Rect($posX-$bordo, $posY-$bordo, $Lmodulo*95+2*$bordo, $Hmodulo+2*$bordo-2, 'F');
                                        
                                        $pdf->SetLineWidth(0);
                                        $pdf->SetFillColor(0,0,0);
                                        
                                        for($c=0;$c<count($aISBN);$c++){
                                                if($aISBN[$c]==1) {
                                                if($c<=3 || $c>=92 || ($c>=46 && $c<=49)) {
                                                        $pdf->Rect($posX+$c*$Lmodulo, $posY, $Lmodulo, $Hmodulo, 'F');
                                                } else {
                                                        $pdf->Rect($posX+$c*$Lmodulo, $posY, $Lmodulo, $Hmodulo-2, 'F');
                                                }
                                                }
                                        }
                                        
                                        //$pdf->SetFont('Helvetica', '', 8);
                                        $deltaX = -3;
                                        $deltaY = -1.5;
                                        $pdf->Text($posX+$deltaX, $posY+$Hmodulo+$deltaY, $this->ISBN[0]);
                                        for($c=1;$c<=6;$c++) { $pdf->Text($posX+1.75+($c-1)*2.40, $posY+$Hmodulo+$deltaY, $this->ISBN[$c]); }
                                        for($c=1;$c<=6;$c++) { $pdf->Text($posX+17.75+($c-1)*2.40, $posY+$Hmodulo+$deltaY, $this->ISBN[$c+6]); }
                                        //$pdf->SetFont('Helvetica', '', 8.25);
                                        $pdf->Text($posX-1, $posY-3.5, "ISBN:  ".substr($this->ISBN,0,3)."-".substr($this->ISBN,3,2)."-".substr($this->ISBN,5,7)."-".substr($this->ISBN,12,1));
                                }
                
                // FINE LAYER ISBN
                $pdf->endLayer(); 

                // INIZIO LAYER TESTI
                $pdf->startLayer('Testi', true, true, false);

                //$pdf->SetFont('Helvetica', '', 18);
                $altezza_linea = 10;

                $pdf->setXY($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->dorso_larghezza + $this->bordi_sicurezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza + $this->pagina_altezza / 3);
                $pdf->Cell($this->pagina_larghezza-2*$this->bordi_sicurezza, $altezza_linea, $this->titolo, 0, 1, 'C');
                //$pdf->SetFont('Helvetica', '', 18);
                $lunghezza_testo = $pdf->GetStringWidth($this->titolo);
                $pdf->Cell($this->pagina_larghezza-2*$this->bordi_sicurezza, $altezza_linea, $lunghezza_testo, 0, 1, 'C');
                
                $pdf->setXY($this->segni_taglio + $this->abbondanza + $this->pagina_larghezza + $this->dorso_larghezza, $this->segni_taglio + $this->abbondanza + $this->bordi_sicurezza + $this->pagina_altezza / 3);
                $pdf->Rotate(-90);
                //$pdf->SetFont('Helvetica', '', $this->dorso_larghezza/0.6);
                $pdf->Cell($this->pagina_altezza / 3, $this->dorso_larghezza, $this->titolo, 0, 0);
                $pdf->StopTransform();

                // FINE LAYER TESTI
                $pdf->endLayer();         

                //Close and output PDF document
                $saveFile = false;
                if ($saveFile) {
                        $pdf->Output(__DIR__ . '/cover.pdf', 'F');
                } else {
                        $pdf->Output('cover.pdf', 'I');
                }
        }

        

        /**
         * Get the value of pagina_larghezza
         */ 
        public function getPagina_larghezza()
        {
                return $this->pagina_larghezza;
        }

        /**
         * Set the value of pagina_larghezza
         *
         * @return  self
         */ 
        public function setPagina_larghezza($pagina_larghezza)
        {
                $this->pagina_larghezza = $pagina_larghezza;

                return $this;
        }

        /**
         * Get the value of pagina_altezza
         */ 
        public function getPagina_altezza()
        {
                return $this->pagina_altezza;
        }

        /**
         * Set the value of pagina_altezza
         *
         * @return  self
         */ 
        public function setPagina_altezza($pagina_altezza)
        {
                $this->pagina_altezza = $pagina_altezza;

                return $this;
        }

        /**
         * Get the value of abbondanza
         */ 
        public function getAbbondanza()
        {
                return $this->abbondanza;
        }

        /**
         * Set the value of abbondanza
         *
         * @return  self
         */ 
        public function setAbbondanza($abbondanza)
        {
                $this->abbondanza = $abbondanza;

                return $this;
        }

        /**
         * Get the value of segni_taglio
         */ 
        public function getSegni_taglio()
        {
                return $this->segni_taglio;
        }

        /**
         * Set the value of segni_taglio
         *
         * @return  self
         */ 
        public function setSegni_taglio($segni_taglio)
        {
                $this->segni_taglio = $segni_taglio;

                return $this;
        }

        /**
         * Get the value of alette_larghezza
         */ 
        public function getAlette_larghezza()
        {
                return $this->alette_larghezza;
        }

        /**
         * Set the value of alette_larghezza
         *
         * @return  self
         */ 
        public function setAlette_larghezza($alette_larghezza)
        {
                $this->alette_larghezza = $alette_larghezza;

                return $this;
        }

        /**
         * Get the value of bordi_sicurezza
         */ 
        public function getBordi_sicurezza()
        {
                return $this->bordi_sicurezza;
        }

        /**
         * Set the value of bordi_sicurezza
         *
         * @return  self
         */ 
        public function setBordi_sicurezza($bordi_sicurezza)
        {
                $this->bordi_sicurezza = $bordi_sicurezza;

                return $this;
        }

        /**
         * Get the value of rilegatura
         */ 
        public function getRilegatura()
        {
                return $this->rilegatura;
        }

        /**
         * Set the value of rilegatura
         *
         * @return  self
         */ 
        public function setRilegatura($rilegatura)
        {
                $this->rilegatura = $rilegatura;

                return $this;
        }

        /**
         * Get the value of grammatura
         */ 
        public function getGrammatura()
        {
                return $this->grammatura;
        }

        /**
         * Set the value of grammatura
         *
         * @return  self
         */ 
        public function setGrammatura($grammatura)
        {
                $this->grammatura = $grammatura;

                return $this;
        }

        /**
         * Get the value of pagine_numero
         */ 
        public function getPagine_numero()
        {
                return $this->pagine_numero;
        }

        /**
         * Set the value of pagine_numero
         *
         * @return  self
         */ 
        public function setPagine_numero($pagine_numero)
        {
                $this->pagine_numero = $pagine_numero;

                return $this;
        }

        /**
         * Get the value of titolo
         */ 
        public function getTitolo()
        {
                return $this->titolo;
        }

        /**
         * Set the value of titolo
         *
         * @return  self
         */ 
        public function setTitolo($titolo)
        {
                $this->titolo = $titolo;

                return $this;
        }

        /**
         * Get the value of autore
         */ 
        public function getAutore()
        {
                return $this->autore;
        }

        /**
         * Set the value of autore
         *
         * @return  self
         */ 
        public function setAutore($autore)
        {
                $this->autore = $autore;

                return $this;
        }

        /**
         * Get the value of ISBN
         */ 
        public function getISBN()
        {
                return $this->ISBN;
        }

        /**
         * Set the value of ISBN
         *
         * @return  self
         */ 
        public function setISBN($ISBN)
        {
                $this->ISBN = (int) filter_var($ISBN, FILTER_SANITIZE_NUMBER_INT);

                return $this;
        }

        /**
         * Get the value of prezzo
         */ 
        public function getPrezzo()
        {
                return $this->prezzo;
        }

        /**
         * Set the value of prezzo
         *
         * @return  self
         */ 
        public function setPrezzo($prezzo)
        {
                $this->prezzo = $prezzo;

                return $this;
        }
}
