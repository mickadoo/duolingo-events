<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Request;

use DateTime;

abstract class AbstractRequest
{
    abstract public function getPath(): string;

    public function getQueryParams(): array
    {
        return [];
    }

    protected function formatDate(DateTime $date): string
    {
        return $date->format('Y-m-d\TH:i:s.u\Z');
    }
}