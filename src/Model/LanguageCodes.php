<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Model;

abstract class LanguageCodes
{
    const SPANISH = 'es';
    const JAPANESE = 'jp';
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

    public static function getLanguageCodes()
    {
        return [
            self::SPANISH,
            self::JAPANESE,
            self::ENGLISH,
            self::ITALIAN,
            self::PORTUGUESE,
            self::GERMAN,
            self::DUTCH,
            self::KOREAN,
            self::CHINESE,
            self::RUSSIAN,
            self::ARABIC,
            self::TURKISH,
            self::LATIN,
            self::SWEDISH,
            self::GREEK,
            self::IRISH,
            self::POLISH,
            self::NORWEGIAN,
            self::HEBREW,
            self::VIETNAMESE,
            self::HAWAIIAN,
            self::DANISH,
            self::SCOTS_GAELIC,
            self::HIGH_VALYRIAN,
            self::INDONESIAN,
            self::WELSH,
            self::ROMANIAN,
            self::CZECH,
            self::SWAHILI,
            self::FINNISH,
            self::HUNGARIAN,
            self::UKRAINIAN,
            self::KLINGON,
            self::NAVAJO,
            self::ESPERANTO,
        ];
    }
}