<?php
/**
 * Part of Windwalker project Test files.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT Taiwan, Inc. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Language\Test\Loader;

use Windwalker\Language\Loader\FileLoader;

/**
 * Test class of FileLoader
 *
 * @since 2.0
 */
class FileLoaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test instance.
     *
     * @var FileLoader
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
        $this->instance = new FileLoader;
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
     * Method to test load().
     *
     * @return void
     *
     * @covers \Windwalker\Language\Loader\FileLoader::load
     */
    public function testLoad()
    {
        $data = <<<DATA
{
	"windwalker" : {
		"language-test" : {
			"sakura" : "Sakura",
			"olive" : "Olive"
		}
	}
}
DATA;

        $this->assertJsonStringEqualsJsonString($this->instance->load(__DIR__ . '/../fixtures/json/en-GB.json'), $data);
    }
}
