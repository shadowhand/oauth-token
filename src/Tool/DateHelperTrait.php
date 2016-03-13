<?php

namespace League\Token\Tool;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

trait DateHelperTrait
{
    private function getDateFromTimestamp($timestamp)
    {
        $timezone = new DateTimeZone('UTC');
        return DateTimeImmutable::createFromFormat('U', $timestamp, $timezone);
    }

    private function getImmutableDate(DateTimeInterface $date)
    {
        if ($date instanceof DateTime) {
            // DateTimeImmutable::createFromMutable does not exist until PHP 5.6
            $date = $this->getDateFromTimestamp($date->getTimestamp());
        }

        return $date;
    }
}
