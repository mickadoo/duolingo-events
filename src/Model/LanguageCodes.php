<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Model;

use \RuntimeException;

class LanguageCodes
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
            self::FRENCH,
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

    public static function getCodesToNames(): array
    {
        return array_combine(
            static::getLanguageCodes(),
            array_map(fn($code) => static::getDisplayNameForCode($code), static::getLanguageCodes())
        );
    }

    public static function getDisplayNameForCode(string $code): string
    {
        switch ($code) {
            case self::SPANISH:
                return 'Spanish';
            case self::JAPANESE:
                return 'Japanese';
            case self::ENGLISH:
                return 'English';
            case self::ITALIAN:
                return 'Italian';
            case self::PORTUGUESE:
                return 'Portuguese';
            case self::GERMAN:
                return 'German';
            case self::DUTCH:
                return 'Dutch';
            case self::FRENCH:
                return 'French';
            case self::KOREAN:
                return 'Korean';
            case self::CHINESE:
                return 'Chinese';
            case self::RUSSIAN:
                return 'Russian';
            case self::ARABIC:
                return 'Arabic';
            case self::TURKISH:
                return 'Turkish';
            case self::LATIN:
                return 'Latin';
            case self::SWEDISH:
                return 'Swedish';
            case self::GREEK:
                return 'Greek';
            case self::IRISH:
                return 'Irish';
            case self::POLISH:
                return 'Polish';
            case self::NORWEGIAN:
                return 'Norwegian';
            case self::HEBREW:
                return 'Hebrew';
            case self::VIETNAMESE:
                return 'Vietnamese';
            case self::HAWAIIAN:
                return 'Hawaiian';
            case self::DANISH:
                return 'Danish';
            case self::SCOTS_GAELIC:
                return 'Scottish Gaelic';
            case self::HIGH_VALYRIAN:
                return 'High Valyrian';
            case self::INDONESIAN:
                return 'Indonesian';
            case self::WELSH:
                return 'Welsh';
            case self::ROMANIAN:
                return 'Romanian';
            case self::CZECH:
                return 'Czech';
            case self::SWAHILI:
                return 'Swahili';
            case self::FINNISH:
                return 'Finnish';
            case self::HUNGARIAN:
                return 'Hungarian';
            case self::UKRAINIAN:
                return 'Ukrainian';
            case self::KLINGON:
                return 'Klingon';
            case self::NAVAJO:
                return 'Navajo';
            case self::ESPERANTO:
                return 'Esperanto';
        }

        throw new RuntimeException(sprintf('Cannot find language code "%s"', $code));
    }
}