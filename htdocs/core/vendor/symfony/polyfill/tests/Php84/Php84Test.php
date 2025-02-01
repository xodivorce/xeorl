<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Polyfill\Tests\Php84;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Php84Test extends TestCase
{
    /**
     * @dataProvider ucFirstDataProvider
     */
    public function testMbUcFirst(string $string, string $expected)
    {
        $this->assertSame($expected, mb_ucfirst($string));
    }

    /**
     * @dataProvider lcFirstDataProvider
     */
    public function testMbLcFirst(string $string, string $expected)
    {
        $this->assertSame($expected, mb_lcfirst($string));
    }

    /**
     * @dataProvider arrayFindDataProvider
     */
    public function testArrayFind(array $array, callable $callback, $expected)
    {
        $this->assertSame($expected, array_find($array, $callback));
    }

    /**
     * @dataProvider arrayFindKeyDataProvider
     */
    public function testArrayFindKey(array $array, callable $callback, $expected)
    {
        $this->assertSame($expected, array_find_key($array, $callback));
    }

    /**
     * @dataProvider arrayAnyDataProvider
     */
    public function testArrayAny(array $array, callable $callback, bool $expected)
    {
        $this->assertSame($expected, array_any($array, $callback));
    }

    /**
     * @dataProvider arrayAllDataProvider
     */
    public function testArrayAll(array $array, callable $callback, bool $expected)
    {
        $this->assertSame($expected, array_all($array, $callback));
    }

    /**
     * @requires extension curl
     */
    public function testCurlHttp3Constants()
    {
        $ch = curl_init();

        $this->assertIsBool(curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_3));

        if (defined('CURLOPT_SSH_HOST_PUBLIC_KEY_SHA256')) {
            $this->assertIsBool(curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_3ONLY));
        }
    }

    public static function ucFirstDataProvider(): array
    {
        return [
            ['', ''],
            ['test', 'Test'],
            ['TEST', 'TEST'],
            ['TesT', 'TesT'],
            ['ａｂ', 'Ａｂ'],
            ['ＡＢＳ', 'ＡＢＳ'],
            ['đắt quá!', 'Đắt quá!'],
            ['აბგ', 'აბგ'],
            ['ǉ', 'ǈ'],
            ["\u{01CA}", "\u{01CB}"],
            ["\u{01CA}\u{01CA}", "\u{01CB}\u{01CA}"],
            ['łámał', 'Łámał'],
            // Full case-mapping and case-folding that changes the length of the string only supported
            // in PHP > 7.3.
            ['ßst', \PHP_VERSION_ID < 70300 ? 'ßst' : 'Ssst'],
        ];
    }

    public static function lcFirstDataProvider(): array
    {
        return [
            ['', ''],
            ['test', 'test'],
            ['Test', 'test'],
            ['tEST', 'tEST'],
            ['Ａｂ', 'ａｂ'],
            ['ＡＢＳ', 'ａＢＳ'],
            ['Đắt quá!', 'đắt quá!'],
            ['აბგ', 'აბგ'],
            ['ǈ', \PHP_VERSION_ID < 70200 ? 'ǈ' : 'ǉ'],
            ["\u{01CB}", \PHP_VERSION_ID < 70200 ? "\u{01CB}" : "\u{01CC}"],
            ["\u{01CA}", "\u{01CC}"],
            ["\u{01CA}\u{01CA}", "\u{01CC}\u{01CA}"],
            ["\u{212A}\u{01CA}", "\u{006b}\u{01CA}"],
            ['ß', 'ß'],
        ];
    }

    public static function arrayFindDataProvider(): array
    {
        $callable = function ($value): bool {
            return \strlen($value) > 2;
        };

        $callableKey = function ($value, $key): bool {
            return is_numeric($key);
        };

        return [
            [[], $callable, null],
            [['a', 'aa', 'aaa', 'aaaa'], $callable, 'aaa'],
            [['a', 'aa'], $callable, null],
            [['a' => '1', 'b' => '12', 'c' => '123', 'd' => '1234'], $callable, '123'],
            [['a' => '1', 'b' => '12', 'c' => '123', 3 => '1234'], $callableKey, '1234'],
        ];
    }

    public static function arrayFindKeyDataProvider(): array
    {
        $callable = function ($value): bool {
            return \strlen($value) > 2;
        };

        $callableKey = function ($value, $key): bool {
            return is_numeric($key);
        };

        return [
            [[], $callable, null],
            [['a', 'aa', 'aaa', 'aaaa'], $callable, 2],
            [['a', 'aa'], $callable, null],
            [['a' => '1', 'b' => '12', 'c' => '123', 'd' => '1234'], $callable, 'c'],
            [['a' => '1', 'b' => '12', 'c' => '123', 3 => '1234'], $callableKey, 3],
        ];
    }

    public static function arrayAnyDataProvider(): array
    {
        $callable = function ($value): bool {
            return \strlen($value) > 2;
        };

        $callableKey = function ($value, $key): bool {
            return is_numeric($key);
        };

        return [
            [[], $callable, false],
            [['a', 'aa', 'aaa', 'aaaa'], $callable, true],
            [['a', 'aa'], $callable, false],
            [['a' => '1', 'b' => '12', 'c' => '123', 'd' => '1234'], $callable, true],
            [['a' => '1', 'b' => '12', 'c' => '123', 3 => '1234'], $callableKey, true],
            [['a' => '1', 'b' => '12', 'c' => '123', 'd' => '1234'], $callableKey, false],
        ];
    }

    public static function arrayAllDataProvider(): array
    {
        $callable = function ($value): bool {
            return \strlen($value) > 2;
        };

        $callableKey = function ($value, $key): bool {
            return is_numeric($key);
        };

        return [
            [[], $callable, true],
            [['a', 'aa', 'aaa', 'aaaa'], $callable, false],
            [['aaa', 'aaa'], $callable, true],
            [['a' => '1', 'b' => '12', 'c' => '123', 'd' => '1234'], $callable, false],
            [['a' => '1', 'b' => '12', 'c' => '123', 'd' => '1234'], $callableKey, false],
            [[1 => '1', 2 => '12', 3 => '123', 4 => '1234'], $callableKey, true],
        ];
    }

    /**
     * @covers \Symfony\Polyfill\Php84\Php84::mb_trim
     *
     * @dataProvider mbTrimProvider
     */
    public function testMbTrim(string $expected, string $string, ?string $characters = null, ?string $encoding = null)
    {
        $this->assertSame($expected, mb_trim($string, $characters, $encoding));
    }

    /**
     * @covers \Symfony\Polyfill\Php84\Php84::mb_ltrim
     *
     * @dataProvider mbLTrimProvider
     */
    public function testMbLTrim(string $expected, string $string, ?string $characters = null, ?string $encoding = null)
    {
        $this->assertSame($expected, mb_ltrim($string, $characters, $encoding));
    }

    /**
     * @covers \Symfony\Polyfill\Php84\Php84::mb_rtrim
     *
     * @dataProvider mbRTrimProvider
     */
    public function testMbRTrim(string $expected, string $string, ?string $characters = null, ?string $encoding = null)
    {
        $this->assertSame($expected, mb_rtrim($string, $characters, $encoding));
    }

    public function testMbTrimException()
    {
        $this->expectException(\ValueError::class);
        mb_trim("\u{180F}", '', 'NULL');
    }

    public function testMbTrimEncoding()
    {
        $this->assertSame('あ', mb_convert_encoding(mb_trim("\x81\x40\x82\xa0\x81\x40", "\x81\x40", 'SJIS'), 'UTF-8', 'SJIS'));
        $this->assertSame('226f575b', bin2hex(mb_ltrim(mb_convert_encoding("\u{FFFE}漢字", 'UTF-16LE', 'UTF-8'), mb_convert_encoding("\u{FFFE}\u{FEFF}", 'UTF-16LE', 'UTF-8'), 'UTF-16LE')));
        $this->assertSame('6f225b57', bin2hex(mb_ltrim(mb_convert_encoding("\u{FEFF}漢字", 'UTF-16BE', 'UTF-8'), mb_convert_encoding("\u{FFFE}\u{FEFF}", 'UTF-16BE', 'UTF-8'), 'UTF-16BE')));
    }

    public function testMbTrimCharactersEncoding()
    {
        $strUtf8 = "\u{3042}\u{3000}";

        $this->assertSame(1, mb_strlen(mb_trim($strUtf8)));
        $this->assertSame(1, mb_strlen(mb_trim($strUtf8, null, 'UTF-8')));

        $old = mb_internal_encoding();
        mb_internal_encoding('Shift_JIS');
        $strSjis = mb_convert_encoding($strUtf8, 'Shift_JIS', 'UTF-8');

        $this->assertSame(1, mb_strlen(mb_trim($strSjis)));
        $this->assertSame(1, mb_strlen(mb_trim($strSjis, null, 'Shift_JIS')));
        mb_internal_encoding($old);
    }

    public static function mbTrimProvider(): iterable
    {
        yield ['ABC', 'ABC'];
        yield ['ABC', "\0\t\nABC \0\t\n"];
        yield ["\0\t\nABC \0\t\n", "\0\t\nABC \0\t\n", ''];

        yield ['', ''];

        yield ['あいうえおあお', ' あいうえおあお ', ' ', 'UTF-8'];
        yield ['foo BAR Spa', 'foo BAR Spaß', 'ß', 'UTF-8'];
        yield ['oo BAR Spaß', 'oo BAR Spaß', 'f', 'UTF-8'];

        yield ['oo BAR Spa', 'foo BAR Spaß', 'ßf', 'UTF-8'];
        yield ['oo BAR Spa', 'foo BAR Spaß', 'fß', 'UTF-8'];
        yield ['いうおえお', ' あいうおえお  あ', ' あ', 'UTF-8'];
        yield ['いうおえお', ' あいうおえお  あ', 'あ ', 'UTF-8'];
        yield [' あいうおえお ', ' あいうおえお a', 'あa', 'UTF-8'];
        yield [' あいうおえお  a', ' あいうおえお  a', "\xe3", 'UTF-8'];

        yield ['', str_repeat(' ', 129)];
        yield ['a', str_repeat(' ', 129).'a'];

        yield ['', " \f\n\r\v\x00\u{00A0}\u{1680}\u{2000}\u{2001}\u{2002}\u{2003}\u{2004}\u{2005}\u{2006}\u{2007}\u{2008}\u{2009}\u{200A}\u{2028}\u{2029}\u{202F}\u{205F}\u{3000}\u{0085}\u{180E}"];

        yield [' abcd ', ' abcd ', ''];

        yield ['f', 'foo', 'oo'];

        yield ["foo\n", "foo\n", 'o'];
    }

    public static function mbLTrimProvider(): iterable
    {
        yield ['ABC', 'ABC'];
        yield ["ABC \0\t\n", "\0\t\nABC \0\t\n"];
        yield ["\0\t\nABC \0\t\n", "\0\t\nABC \0\t\n", ''];

        yield ['', ''];

        yield [' test ', ' test ', ''];

        yield ['いああああ', 'あああああああああああああああああああああああああああああああああいああああ', 'あ'];

        yield ['漢字', "\u{FFFE}漢字", "\u{FFFE}\u{FEFF}"];
        yield [' abcd ', ' abcd ', ''];
    }

    public static function mbRTrimProvider(): iterable
    {
        yield ['ABC', 'ABC'];
        yield ['ABC', "ABC \0\t\n"];
        yield ["\0\t\nABC \0\t\n", "\0\t\nABC \0\t\n", ''];

        yield ['', ''];

        yield ['                                                                                                                                 a', str_repeat(' ', 129).'a'];

        yield ['あああああああああああああああああああああああああああああああああい', 'あああああああああああああああああああああああああああああああああいああああ', 'あ'];

        yield [' abcd ', ' abcd ', ''];

        yield ["foo\n", "foo\n", 'o'];
    }
}
