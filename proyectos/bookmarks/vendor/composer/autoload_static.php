<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit15e45c287a24cc6ba243e781c7615f46
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit15e45c287a24cc6ba243e781c7615f46::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit15e45c287a24cc6ba243e781c7615f46::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit15e45c287a24cc6ba243e781c7615f46::$classMap;

        }, null, ClassLoader::class);
    }
}
