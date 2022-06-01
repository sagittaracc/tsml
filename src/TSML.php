<?php

namespace sagittaracc;

/**
 * The Simplest Markup Language
 * @author Yuriy Arutyunayn <sagittaracc@gmail.com>
 */
class TSML
{
    /**
     * Парсит строку формата TSML
     * @param string $string
     * @param string $indentation
     * @param boolean $typecasting нужно ли пытаться преобразовывать типы значений
     * @return array
     */
    public static function parse($string, $indentation = '    ', $typecasting = true)
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
                    if ($value) {
                        if ($typecasting) {
                            $value = self::typecast($value);
                        }
                    }
                    else {
                        $value = [];
                    }
                    $parent[$key] = $value;
                    break;
                }

                $parent = &$parent[$key];
            }
        }

        return $result;
    }
    /**
     * Попытка преобразовать типы значений
     * @param string $value
     * @return mixed
     */
    private static function typecast($value)
    {
        $valueList = array_map('trim', explode(',', $value));

        foreach ($valueList as &$valueItem) {
            if (self::checkBoolean($valueItem)) {
                $valueItem = filter_var($valueItem, FILTER_VALIDATE_BOOLEAN);
            }
            else if (is_numeric($valueItem)) {
                $valueItem = $valueItem + 0;
            }
        }
        unset($valueItem);

        if (count($valueList) === 1) {
            $valueList = $valueList[0];
        }

        return $valueList;
    }
    /**
     * Проверка на boolean
     * @param string $string
     * @return boolean
     */
    private static function checkBoolean($string){
        $string = strtolower($string);
        return (in_array($string, array('true', 'false'), true));
    }
}