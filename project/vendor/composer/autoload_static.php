<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit35073860b566d102377d420a5fda5e9a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/bootstrap',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
    );

    public static $classMap = array (
        'App\\controller\\homeController' => __DIR__ . '/../..' . '/application/controller/homeController.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'model\\Database' => __DIR__ . '/../..' . '/application/model/Database.php',
        'model\\Food' => __DIR__ . '/../..' . '/application/model/Food.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit35073860b566d102377d420a5fda5e9a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit35073860b566d102377d420a5fda5e9a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit35073860b566d102377d420a5fda5e9a::$classMap;

        }, null, ClassLoader::class);
    }
}
