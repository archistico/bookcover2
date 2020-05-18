<?php
declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Dorso;

require_once __DIR__.'/../constant.php';

final class DorsoTest extends TestCase
{
    public function testDorsoFresataGrammatura100(): void
    {
        $this->assertEquals(
            3.4,
            (new Dorso(56, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_100))->CalcolaDorso()
        );

        $this->assertEquals(
            6.1,
            (new Dorso(104, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_100))->CalcolaDorso()
        );

        $this->assertEquals(
            23.8,
            (new Dorso(400, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_100))->CalcolaDorso()
        );
    }

    public function testDorsoFresataGrammatura120(): void
    {
        $this->assertEquals(
            4.1,
            (new Dorso(56, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_120))->CalcolaDorso()
        );

        $this->assertEquals(
            7.4,
            (new Dorso(104, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_120))->CalcolaDorso()
        );

        $this->assertEquals(
            28.5,
            (new Dorso(400, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_120))->CalcolaDorso()
        );
    }

    public function testDorsoFresataGrammatura85(): void
    {
        $this->assertEquals(
            2.7,
            (new Dorso(56, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_85))->CalcolaDorso()
        );

        $this->assertEquals(
            4.9,
            (new Dorso(104, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_85))->CalcolaDorso()
        );

        $this->assertEquals(
            18.6,
            (new Dorso(400, COPERTINA_RILEGATURA_FRESATA, COPERTINA_GRAMMATURA_85))->CalcolaDorso()
        );
    }
}