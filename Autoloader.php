<?php

abstract class Autoloader
{
    private static $_pluginPath = __DIR__.DIRECTORY_SEPARATOR;
    private static $_excludeDir = array('directory','templates');

    public static function register()
    {
        spl_autoload_register('self::initClasses');
        spl_autoload_extensions('.php');
    }

    public static function initClasses($className)
    {
        self::_directoryIterator($className);
    }

    private static function _initClass($path, $className)
    {
        $filePath = $path.$className.'.php';

        if (file_exists($filePath)) {
            require_once $filePath;
            return true;
        }

        return false;
    }

    private static function _directoryIterator(
        $className,
        $directoryName = false
    )
    {
        $path = self::$_pluginPath;

        if ($directoryName) {
            $path = self::$_pluginPath.$directoryName.DIRECTORY_SEPARATOR;
        }

        $result = self::_initClass($path, $className);

        if ($result) {
            return true;
        }

        $iterator = new DirectoryIterator($path);

        foreach ($iterator as $object) {
            if (!self::_isDirectory($object)) {
                continue;
            }

            $objectName = $object->getFilename();

            if (!self::_isAllowedDirectory($objectName)){
                continue;
            }

            $path = $object->getPathname().DIRECTORY_SEPARATOR;

            $result = self::_initClass($path, $className);

            if ($result) {
                return true;
            }

            $path = $objectName;

            if ($directoryName) {
                $path = $directoryName.DIRECTORY_SEPARATOR.$objectName;
            }

            self::_directoryIterator($className, $path);
        }
    }

    private static function _isAllowedDirectory(string $directoryName): bool
    {
        return !in_array($directoryName, static::$_excludeDir);
    }

    private static function _isDirectory(DirectoryIterator $object): bool
    {
        return !$object->isDot() && $object->isDir();
    }
}