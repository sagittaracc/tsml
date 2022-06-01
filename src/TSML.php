<?php

namespace sagittaracc;

/**
 * The Simplest Markup Language
 * @author Yuriy Arutyunayn <sagittaracc@gmail.com>
 */
class TSML
{
    public static function parse($string, $indentation = '    ')
    {
        $result = array();
        $path = array();

        foreach (explode("\n", $string) as $line) {
            $depth = 0;
            while (substr($line, 0, strlen($indentation)) === $indentation) {
                $depth += 1;
                $line = substr($line, strlen($indentation));
            }

            while ($depth < sizeof($path)) {
                array_pop($path);
            }

            $valueList = explode(' ', trim($line), 2);
            $key = $valueList[0];
            $value = isset($valueList[1]) ? $valueList[1] : null;
            $path[$depth] = $key;

            $parent = &$result;
            foreach ($path as $depth => $key) {
                if (!isset($parent[$key])) {
                    $parent[$key] = $value ? self::typecast($value) : [];
                    break;
                }

                $parent = &$parent[$key];
            }
        }

        return $result;
    }

    private static function typecast($value)
    {
        if (is_null($value)) {
            return null;
        }

        $valueList = array_map('trim', explode(',', $value));

        foreach ($valueList as &$valueItem) {
            if ($valueItem === 'true') {
                $valueItem = true;
            }
        }
        unset($valueItem);

        if (count($valueList) === 1) {
            $valueList = $valueList[0];
        }

        return $valueList;
    }
}