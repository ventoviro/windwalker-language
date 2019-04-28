<?php declare(strict_types=1);
/**
 * Part of Windwalker project Test files.  @codingStandardsIgnoreStart
 *
 * @copyright  Copyright (C) 2019 LYRASOFT Taiwan, Inc.
 * @license    LGPL-2.0-or-later
 */

namespace Windwalker\Language\Test;

use Windwalker\Language\LanguageNormalize;

/**
 * Test class of LanguageNormalize
 *
 * @since 2.0
 */
class LanguageNormalizeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * getToTagCases
     *
     * @return  array
     */
    public function getToTagCases()
    {
        return [
            [
                'foo_bar',
                'foo.bar',
            ],
            [
                'flower-sakura-flower',
                'flower.sakura.flower',
            ],
            [
                'FLOWER_SAKURA_FLOWER',
                'flower.sakura.flower',
            ],
            [
                'Lorem ipsum dolor sit amet, consectetur.',
                'lorem.ipsum.dolor.sit.amet.consectetur',
            ],
            [
                '--test-foo.bar/yoo\\go{play}test[fly]--',
                'test.foo.bar.yoo.go.play.test.fly',
            ],
            [
                '雲彩裡，許是懺悔 THe B612 只有用心靈，一個人才能看得很清楚',
                'the.b612',
            ],
        ];
    }

    /**
     * Method to test toLanguageTag().
     *
     * @return void
     *
     * @covers \Windwalker\Language\LanguageNormalize::toLanguageTag
     */
    public function testToLanguageTag()
    {
        $this->assertEquals('en-GB', LanguageNormalize::toLanguageTag('en_gb'));
        $this->assertEquals('en-GB', LanguageNormalize::toLanguageTag('EN_GB'));
        $this->assertEquals('en-GB', LanguageNormalize::toLanguageTag('en-gb'));
        $this->assertEquals('en-GB', LanguageNormalize::toLanguageTag('EN-gB'));
    }

    /**
     * Method to test getLocaliseClassPrefix().
     *
     * @return void
     *
     * @covers \Windwalker\Language\LanguageNormalize::getLocaliseClassPrefix
     */
    public function testGetLocaliseClassPrefix()
    {
        $this->assertEquals('EnGB', LanguageNormalize::getLocaliseClassPrefix('en_gb'));
        $this->assertEquals('EnGB', LanguageNormalize::getLocaliseClassPrefix('EN_GB'));
        $this->assertEquals('EnGB', LanguageNormalize::getLocaliseClassPrefix('en-gb'));
        $this->assertEquals('EnGB', LanguageNormalize::getLocaliseClassPrefix('EN-gB'));
    }

    /**
     * Method to test toLanguageKey().
     *
     * @param string $origin
     * @param string $expected
     *
     * @return void
     *
     * @covers       \Windwalker\Language\LanguageNormalize::toLanguageKey
     *
     * @dataProvider getToTagCases
     */
    public function testToLanguageKey($origin, $expected)
    {
        $this->assertEquals($expected, LanguageNormalize::toLanguageKey($origin));
    }
}
