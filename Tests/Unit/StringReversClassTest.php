<?php

namespace Unit;

use Src\StringRevers;
use \PHPUnit\Framework\TestCase;

class StringReversClassTest extends TestCase
{
    protected StringRevers $service;

    public function setUp(): void
    {
        $this->service = new StringRevers();
    }
    public function test_string_validate()
    {
        $this->assertEquals('Ьшым', $this->service->handler('Мышь'));
        $this->assertEquals('esuOh', $this->service->handler('houSe'));
        $this->assertEquals('кимОД', $this->service->handler('домИК'));
        $this->assertEquals('tnAhPele', $this->service->handler('elEpHant'));
        $this->assertEquals('tac,', $this->service->handler('cat,'));
        $this->assertEquals('Амиз:', $this->service->handler('Зима:'));
        $this->assertEquals("si 'dloc' won", $this->service->handler("is 'cold' now"));
        $this->assertEquals('отэ «Кат» "отсорп"', $this->service->handler('это «Так» "просто"'));
        $this->assertEquals('driht-trap', $this->service->handler('third-part'));
        $this->assertEquals('nac`t', $this->service->handler('can`t'));
        $this->assertEquals('яаНнилд аЗарф! с ук-йеч ?анз.вок"', $this->service->handler('длИнная фРаза! с ку-чей ?зна.ков"'));
        $this->assertEquals('Etualmu Üöä ni üÖÄ', $this->service->handler('Umlaute Äöü in äÖÜ'));
    }
}