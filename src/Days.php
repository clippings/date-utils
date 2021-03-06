<?php

namespace CL\DateUtils;

use DateTime;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2015, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Days
{
    /**
     * @var integer
     */
    private $days;

    /**
     * @param integer $days
     */
    public function __construct($days)
    {
        $this->days = (int) $days;
    }

    /**
     * @return integer
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param  Days $days
     * @return self
     */
    public function add(Days $days)
    {
        $this->days = $this->days + $days->days;

        return $this;
    }

    /**
     * @param  DateTime|null $start
     * @return DateTime
     */
    public function getNewStartDate(DateTime $start = null)
    {
        return $start ? clone $start : new DateTime('now');
    }

    /**
     * @param  DateTime|null $start
     * @return DateTime
     */
    public function toDateTime(DateTime $start = null)
    {
        return $this->getNewStartDate($start)->modify("+ {$this->days} days");
    }

    /**
     * @return string
     */
    public function humanize()
    {
        return "{$this->days} days";
    }
}
