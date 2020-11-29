<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Request;

class EventRequest extends AbstractRequest
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getPath(): string
    {
        return 'events/' . $this->getId();
    }

    public function getId(): string
    {
        return $this->id;
    }
}