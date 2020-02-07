<?php

spl_autoload_register('Autoload::loadFromLessons');

class Autoload
{
    public static function loadFromLessons(string $className)
    {
        $lessonPaths = ['lesson-5','lesson-6'];
        foreach($lessonPaths as $lessonPath) {
            $fileNameOfClass = "{$lessonPath}/{$className}.php";
            if(file_exists($fileNameOfClass)) require_once $fileNameOfClass;
        }
    }
}