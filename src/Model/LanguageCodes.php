<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Model;

use Locale;
use ResourceBundle;
use RuntimeException;

class LanguageCodes
{
    public static function getCodeForDisplayName(string $name): string
    {
        $codesToNames = static::getCodesToNames();
        if (in_array($name, $codesToNames)) {
            return array_search($name, $codesToNames);
        }

        throw new RuntimeException(sprintf('Cannot find language with name "%s"', $name));
    }

    public static function getCodesToNames(): array
    {
        return array_combine(
            static::getLanguageCodes(),
            array_map(fn($code) => static::getDisplayNameForCode($code), static::getLanguageCodes())
        );
    }

    public static function getLanguageCodes(): array
    {
        $locales = ResourceBundle::getLocales('');
        $languages = array_map(function ($locale) {
            return Locale::getPrimaryLanguage($locale);
        }, $locales);
        $extraLanguages = ['tlh']; // Klingon

        return array_unique(array_merge($languages, $extraLanguages));
    }

    public static function getDisplayNameForCode(string $code): string
    {
        return Locale::getDisplayName($code);
    }
}