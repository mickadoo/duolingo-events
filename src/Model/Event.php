<?php

declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Model;

use DateTime;

class Event
{
    const RECUR_WEEKLY = 'WEEKLY';
    const RECUR_ONCE = 'ONCE';
    const STATUS_SCHEDULED = 1; // unsure of the meaning of these codes so far, assuming 1 is "scheduled"
    const STATUS_CANCELLED = 2;
    const ATTENDEE_PROFICIENCY_BEGINNER = 'BEGINNER';
    const ATTENDEE_PROFICIENCY_INTERMEDIATE = 'INTERMEDIATE';
    const ATTENDEE_PROFICIENCY_ADVANCED = 'ADVANCED';

    private int $attendeeLimit = 0;
    private array $attendeeProficiency = [];
    private string $description = '';
    private float $duration = 0.0;
    private string $eventId = '';
    private array $hostIds = [];
    private bool $isHidden = false;
    private array $languages = [];
    private string $onlineLink = '';
    private string $recurrence_pattern = self::RECUR_ONCE;
    private DateTime $eventStart;
    private DateTime $eventStartLocalTime;
    private int $status = self::STATUS_SCHEDULED;
    private string $timezone = '';
    private string $title = '';
    private string $instructionToJoin = '';
    private int $price = 0;

    /**
     * @var User[]
     */
    private array $hosts = []; // only set on specific event requests, not collection request

    public function getAttendeeLimit(): int
    {
        return $this->attendeeLimit;
    }

    public function setAttendeeLimit(int $attendeeLimit): void
    {
        $this->attendeeLimit = $attendeeLimit;
    }

    public function getAttendeeProficiency(): array
    {
        return $this->attendeeProficiency;
    }

    public function setAttendeeProficiency(array $attendeeProficiency): void
    {
        $this->attendeeProficiency = $attendeeProficiency;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): void
    {
        $this->duration = $duration;
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function setEventId(string $eventId): void
    {
        $this->eventId = $eventId;
    }

    public function getHostIds(): array
    {
        return $this->hostIds;
    }

    public function setHostIds(array $hostIds): void
    {
        $this->hostIds = $hostIds;
    }

    public function isHidden(): bool
    {
        return $this->isHidden;
    }

    public function setIsHidden(bool $isHidden): void
    {
        $this->isHidden = $isHidden;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function setLanguages(array $languages): void
    {
        $this->languages = $languages;
    }

    public function getOnlineLink(): string
    {
        return $this->onlineLink;
    }

    public function setOnlineLink(string $onlineLink): void
    {
        $this->onlineLink = $onlineLink;
    }

    public function getRecurrencePattern(): string
    {
        return $this->recurrence_pattern;
    }

    public function setRecurrencePattern(string $recurrence_pattern): void
    {
        $this->recurrence_pattern = $recurrence_pattern;
    }

    public function getEventStart(): DateTime
    {
        return $this->eventStart;
    }

    public function setEventStart(DateTime $eventStart): void
    {
        $this->eventStart = $eventStart;
    }

    public function getEventStartLocalTime(): DateTime
    {
        return $this->eventStartLocalTime;
    }

    public function setEventStartLocalTime(DateTime $eventStartLocalTime): void
    {
        $this->eventStartLocalTime = $eventStartLocalTime;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getInstructionToJoin(): string
    {
        return $this->instructionToJoin;
    }

    public function setInstructionToJoin(string $instructionToJoin): void
    {
        $this->instructionToJoin = $instructionToJoin;
    }

    public function getDuolingoLink(): string
    {
        return sprintf('https://events.duolingo.com/event/%s', $this->eventId);
    }

    public function getHosts(): array
    {
        return $this->hosts;
    }

    public function addHost(User $host): void
    {
        $this->hosts[] = $host;
    }

    /**
     * @return int The price in US cents (e.g. 600 = $6)
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}