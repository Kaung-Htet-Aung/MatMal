<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita9da34a68bc661e48c4ede46ab99a514
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Libs\\' => 5,
        ),
        'H' => 
        array (
            'Helpers\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/_classes/Libs',
        ),
        'Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/_classes/Helpers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita9da34a68bc661e48c4ede46ab99a514::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita9da34a68bc661e48c4ede46ab99a514::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita9da34a68bc661e48c4ede46ab99a514::$classMap;

        }, null, ClassLoader::class);
    }
}