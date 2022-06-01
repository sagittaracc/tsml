<?php

namespace sagittaracc;

/**
 * The Simplest Markup Language
 * @author Yuriy Arutyunayn <sagittaracc@gmail.com>
 */
class TSML
{
    public static function parse($list, $indentation = '    ')
    {
        $result = array();
        $path = array();

        foreach (explode("\n", $list) as $line) {
            $depth = 0;
            while (substr($line, 0, strlen($indentation)) === $indentation) {
                $depth += 1;
                $line = substr($line, strlen($indentation));
            }

            while ($depth < sizeof($path)) {
                array_pop($path);
            }

            $line = trim($line);
            $parts = explode(' ', $line, 2);
            $path[$depth] = $parts[0];

            $parent = &$result;
            foreach ($path as $depth => $key) {
                if (!isset($parent[$key])) {
                    $partOne = isset($parts[1]) ? self::cast($parts[1]) : null;
                    $parent[$key] = $partOne ? $partOne : [];
                    break;
                }

                $parent = &$parent[$key];
            }
        }

        return $result;
    }

    private static function cast($arg)
    {
        $partOne = array_map('trim', explode(',', $arg));

        foreach ($partOne as &$part) {
            if ($part === 'true') {
                $part = true;
            }
        }
        unset($part);

        if (count($partOne) === 1) {
            $partOne = $partOne[0];
        }

        return $partOne;
    }
}