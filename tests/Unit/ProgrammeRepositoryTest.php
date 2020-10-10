<?php

namespace Tests\Unit;

use App\Repositories\ProgrammeRepository;
use PHPUnit\Framework\TestCase;

class ProgrammeRepositoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testConvertTimezoneName()
    {
        $tzn = 'Europe-London';
        $tznConverted = 'Europe/London';

        $this->assertEquals(
            $tznConverted,
            ProgrammeRepository::convertTimezoneName($tzn)
        );

        $this->assertTrue(
            is_string(ProgrammeRepository::convertTimezoneName($tzn))
        );
    }
}
