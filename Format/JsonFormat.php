<?php declare(strict_types=1);
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2019 LYRASOFT.
 * @license    LGPL-2.0-or-later
 */

namespace Windwalker\Language\Format;

/**
 * Class JsonFormat
 *
 * @since 2.0
 */
class JsonFormat extends AbstractFormat
{
    /**
     * Property name.
     *
     * @var  string
     */
    protected $name = 'json';

    /**
     * parse
     *
     * @param string $string
     *
     * @return  string[]
     */
    public function parse($string)
    {
        $array = json_decode($string);

        return $this->toOneDimension($array);
    }
}
