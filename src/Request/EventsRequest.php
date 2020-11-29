<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Request;

use \DateTime;

class EventsRequest extends AbstractRequest
{
    private DateTime $startRange;
    private DateTime $endRange;
    private array $languageCodes = [];
    private bool $getFeaturedOnly = false;

    public function __construct()
    {
        $this->startRange = new DateTime();
        $this->endRange = new DateTime('+3 days');
    }

    public function getStartRange(): DateTime
    {
        return $this->startRange;
    }

    public function setStartRange(DateTime $startRange): void
    {
        $this->startRange = $startRange;
    }

    public function getEndRange(): DateTime
    {
        return $this->endRange;
    }

    public function setEndRange(DateTime $endRange): void
    {
        $this->endRange = $endRange;
    }

    public function getLanguageCodes(): array
    {
        return $this->languageCodes;
    }

    public function setLanguageCodes(array $languageCodes): void
    {
        $this->languageCodes = $languageCodes;
    }

    public function isGetFeaturedOnly(): bool
    {
        return $this->getFeaturedOnly;
    }

    public function setGetFeaturedOnly(bool $getFeaturedOnly): void
    {
        $this->getFeaturedOnly = $getFeaturedOnly;
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
            'language_ids' => implode(',', $this->languageCodes),
            'is_featured_only' => $this->getFeaturedOnly,
        ];
    }
}