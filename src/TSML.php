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
                    if (isset($parts[1])) {
                        $partOne = array_map('trim', explode(',', $parts[1]));
                        if (count($partOne) === 1) {
                            $partOne = $partOne[0];
                        }
                    }
                    $parent[$key] = isset($parts[1]) ? $partOne : [];
                    break;
                }

                $parent = &$parent[$key];
            }
        }

        return $result;
    }
}