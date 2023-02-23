<?php

abstract class Autoloader
{
    const DEFAULT_DIR_LEVEL_UP = 1;

    private static string $projectPath;

    private static array $excludeDir = array(
        'directory',
        'templates',
        'storage',
        'public',
        'vendor',
        '.git',
        '.idea'
    );

    /**
     * @param int $level
     */
    public static function register(int $level = self::DEFAULT_DIR_LEVEL_UP)
    {
        self::setProjectPath($level);

        spl_autoload_register('self::initClasses');
        spl_autoload_extensions('.php');
    }

    /**
     * @param $className
     */
    public static function initClasses($className)
    {
        self::directoryIterator($className);
    }

    private static function initClass($path, $className): bool
    {
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

        $filePath = $path . $className . '.php';

        if (file_exists($filePath)) {
            require_once $filePath;

            return true;
        }

        return false;
    }

    private static function directoryIterator(
        $className,
        $directoryName = false
    )
    {
        $path = self::$projectPath;

        if ($directoryName) {
            $path = self::$projectPath . $directoryName . DIRECTORY_SEPARATOR;
        }

        if (self::initClass($path, $className)) {
            return true;
        }

        $iterator = new DirectoryIterator($path);

        foreach ($iterator as $object) {
            if (!self::isDirectory($object)) {
                continue;
            }

            $objectName = $object->getFilename();

            if (!self::isAllowedDirectory($objectName)) {
                continue;
            }

            $path = $object->getPathname() . DIRECTORY_SEPARATOR;

            if (self::initClass($path, $className)) {
                return true;
            }

            $path = $objectName;

            if ($directoryName) {
                $path = $directoryName . DIRECTORY_SEPARATOR . $objectName;
            }

            if (self::directoryIterator($className, $path)) {
                return true;
            }
        }
    }

    private static function isAllowedDirectory(string $directoryName): bool
    {
        return !in_array($directoryName, static::$excludeDir);
    }

    private static function isDirectory(DirectoryIterator $object): bool
    {
        return !$object->isDot() && $object->isDir();
    }

    private static function setProjectPath(int $level)
    {
        self::$projectPath = (dirname(__FILE__, $level).DIRECTORY_SEPARATOR);
    }
}