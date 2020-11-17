<?php
declare(strict_types = 1);

namespace Mickadoo\Duolingo\Request;

use \DateTime;

class EventRequest extends AbstractRequest
{
    private DateTime $startRange;
    private DateTime $endRange;
    private array $languages = [];
    private bool $getFeaturedOnly = false;

    public function __construct()
    {
        $this->startRange = new DateTime();
        $this->endRange = new DateTime('+3 days');
    }

    public function getPath(): string
    {
        return 'events';
    }

    public function getQueryParams(): array
    {
        return [
            'start_range' => $this->formatDate($this->startRange),
            'end_range' => $this->formatDate($this->endRange),
            'language_id' => $this->languages,
            'is_featured_only' => $this->getFeaturedOnly,
        ];
    }
}