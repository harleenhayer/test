<?php

namespace Core;
/**
 * Class View
 * @package Core
 */
class View
{
    /**
     * @param $template
     * @param array $args
     * @throws \Exception
     */
    public static function renderTemplate($template, $args = [])
    {
        $data = $args;
        $file = dirname(__DIR__) . "/App/Views/$template";

        if (is_readable($file)) {
            include $file;
        }else {
            throw new \Exception("$file not found");
        }
    }
}