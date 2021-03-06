<?php
declare(strict_types=1);

namespace Test\Model;

use Mickadoo\DuolingoEvents\Model\LanguageCodes;
use PHPUnit\Framework\TestCase;

class LanguageCodesTest extends TestCase
{
    public function testCodesToNamesWillReturnMappedArray()
    {
        $codesToNames = LanguageCodes::getCodesToNames();
        $codes = LanguageCodes::getLanguageCodes();
        foreach($codesToNames as $code => $name) {
            $this->assertContains($code, $codes);
            $this->assertEquals($name, LanguageCodes::getDisplayNameForCode($code));
        }
    }

    public function testWillIncludeNonStandardLanguagesLikeKlingon()
    {
        $this->assertEquals('Klingon', LanguageCodes::getDisplayNameForCode('tlh'));
        $this->assertContains('tlh', LanguageCodes::getLanguageCodes());
        $this->assertContains('Klingon', LanguageCodes::getCodesToNames());
    }
}
