<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Model;

class User
{
    private string $bio = '';
    private string $learningLanguage = '';
    private string $name = '';
    private string $picture = '';
    private string $profileLocationName = '';
    private string $timezone = '';
    private string $userId = '';
    private string $username = '';

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    public function getLearningLanguage(): string
    {
        return $this->learningLanguage;
    }

    public function setLearningLanguage(string $learningLanguage): void
    {
        $this->learningLanguage = $learningLanguage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    public function getProfileLocationName(): string
    {
        return $this->profileLocationName;
    }

    public function setProfileLocationName(string $profileLocationName): void
    {
        $this->profileLocationName = $profileLocationName;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}