<?php

/*
 * This file is part of JSON5-php.
 *
 * (c) Hiroto Kitazawa <hiro.yo.yo1610@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HirotoK\JSON5;

use HirotoK\JSON5\Exception\FileNotFoundException;
use SplFileObject;

/**
 * Class JSON5.
 *
 * @package HirotoK\JSON5
 */
class JSON5
{
    /**
     * Decode JSON5 string.
     *
     * @param string $json5
     * @param bool   $assoc
     *
     * @return mixed
     */
    public static function decode($json5, $assoc = false)
    {
        $parser = new Parser($json5);

        return $parser->parse($assoc);
    }

    /**
     * Encode JSON5.
     *
     * @todo Implement this method
     *
     * @param mixed $json5
     *
     * @return mixed
     */
    public static function encode($json5)
    {
        return json_encode($json5);
    }

    /**
     * Decode JSON5 by file.
     *
     * @param string|SplFileObject $file
     * @param bool                 $assoc
     *
     * @throws \HirotoK\JSON5\Exception\FileNotFoundException
     *
     * @return mixed
     */
    public static function decodeFile($file, $assoc = false)
    {
        if (!$file instanceof SplFileObject) {
            if (!file_exists($file)) {
                throw new FileNotFoundException('File does not exist.');
            }

            return self::decodeFile(new SplFileObject($file, 'r'), $assoc);
        }
        $json5 = $file->fread($file->getSize());

        return self::decode($json5, $assoc);
    }
}
