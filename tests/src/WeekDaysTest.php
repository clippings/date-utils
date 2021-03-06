<?php

namespace CL\DateUtils\Test;

use PHPUnit\Framework\TestCase;
use CL\DateUtils\WeekDays;
use DateTime;

/**
 * @coversDefaultClass CL\DateUtils\WeekDays
 */
class WeekDaysTest extends TestCase
{
    public function dataToDateTime()
    {
        return [
            [5, new DateTime('2015-02-02'), new DateTime('2015-02-09')],
            [12, new DateTime('2015-03-01'), new DateTime('2015-03-17')],
            [4, new DateTime('2015-03-01'), new DateTime('2015-03-01 + 4 weekdays')],
            [5, new DateTime('2015-06-20'), new DateTime('2015-06-26')],
        ];
    }

    /**
     * @covers ::toDateTime
     * @dataProvider dataToDateTime
     */
    public function testToDateTime($input, $start, $result)
    {
        $days = new WeekDays($input);

        $this->assertEquals($result->format('d m Y'), $days->toDateTime($start)->format('d m Y'));
    }

    public function dataHumanize()
    {
        return [
            [new WeekDays(5), '5 week days'],
            [new WeekDays('235'), '235 week days'],
            [new WeekDays('sdhfk'), '0 week days'],
        ];
    }

    /**
     * @covers ::humanize
     * @dataProvider dataHumanize
     */
    public function testHumanize($input, $result)
    {
        $this->assertSame($result, $input->humanize());
    }
}
