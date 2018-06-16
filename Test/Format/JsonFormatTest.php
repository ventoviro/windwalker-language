<?php
/**
 * Part of Windwalker project Test files.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT Taiwan, Inc. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Language\Test\Format;

use Windwalker\Language\Format\JsonFormat;
use Windwalker\Language\Language;

/**
 * Test class of JsonFormat
 *
 * @since 2.0
 */
class JsonFormatTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test instance.
     *
     * @var JsonFormat
     */
    protected $instance;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->instance = new JsonFormat();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
    }

    /**
     * Method to test parse().
     *
     * @return void
     *
     * @throws \ReflectionException
     * @covers \Windwalker\Language\Format\JsonFormat::parse
     */
    public function testParse()
    {
        $file = file_get_contents(__DIR__ . '/../fixtures/json/en-GB.json');

        $lang = new Language();

        $lang->addStrings($this->instance->parse($file));

        $this->assertEquals($lang->translate('WINDWALKER_LANGUAGE_TEST_SAKURA'), 'Sakura');
        $this->assertEquals($lang->translate('WINDWALKER_LANGUAGE_TEST_Olive'), 'Olive');
    }
}
