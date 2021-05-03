<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Model;

use Locale;
use ResourceBundle;
use RuntimeException;

class LanguageCodes
{
    const SPANISH = 'es';
    const JAPANESE = 'ja';
    const ENGLISH = 'en';
    const ITALIAN = 'it';
    const PORTUGUESE = 'pt';
    const GERMAN = 'de';
    const DUTCH = 'nl-NL';
    const FRENCH = 'fr';
    const KOREAN = 'ko';
    const CHINESE = 'zh';
    const RUSSIAN = 'ru';
    const HINDI = 'hi';
    const ARABIC = 'ar';
    const TURKISH = 'tr';
    const LATIN = 'la';
    const SWEDISH = 'sv';
    const GREEK = 'el';
    const IRISH = 'ga';
    const POLISH = 'pl';
    const NORWEGIAN = 'no-BO';
    const HEBREW = 'he';
    const VIETNAMESE = 'vi';
    const HAWAIIAN = 'hw';
    const DANISH = 'da';
    const SCOTS_GAELIC = 'gd';
    const HIGH_VALYRIAN = 'hv';
    const INDONESIAN = 'id';
    const WELSH = 'cy';
    const ROMANIAN = 'ro';
    const CZECH = 'cs';
    const SWAHILI = 'sw';
    const FINNISH = 'fi';
    const HUNGARIAN = 'hu';
    const UKRAINIAN = 'uk';
    const KLINGON = 'tlh';
    const NAVAJO = 'nv';
    const ESPERANTO = 'eo';
    const CATALAN = 'ca';
    const GUARANI = 'gn';

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
        return ResourceBundle::getLocales('');
    }

    public static function getDisplayNameForCode(string $code): string
    {
        return Locale::getDisplayName($code);
    }
}