<?php

abstract class Autoloader
{
    private static string $projectPath = __DIR__.DIRECTORY_SEPARATOR;

    private static array $excludeDir = array(
        'directory',
        'templates',
        'storage',
        'public',
        'vendor'
    );

    public static function register()
    {
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

    /**
     * @param $path
     * @param $className
     * @return bool
     */
    private static function initClass($path, $className): bool
    {
        $filePath = $path.$className.'.php';

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
            $path = self::$projectPath.$directoryName.DIRECTORY_SEPARATOR;
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

            if (!self::isAllowedDirectory($objectName)){
                continue;
            }

            $path = $object->getPathname().DIRECTORY_SEPARATOR;

            if (self::initClass($path, $className)) {
                return true;
            }

            $path = $objectName;

            if ($directoryName) {
                $path = $directoryName.DIRECTORY_SEPARATOR.$objectName;
            }

            self::directoryIterator($className, $path);
        }
    }

    /**
     * @param string $directoryName
     * @return bool
     */
    private static function isAllowedDirectory(string $directoryName): bool
    {
        return !in_array($directoryName, static::$excludeDir);
    }

    /**
     * @param DirectoryIterator $object
     * @return bool
     */
    private static function isDirectory(DirectoryIterator $object): bool
    {
        return !$object->isDot() && $object->isDir();
    }
}