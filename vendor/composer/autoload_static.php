<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba2d5054fac2176e81f25954accab9a1
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba2d5054fac2176e81f25954accab9a1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba2d5054fac2176e81f25954accab9a1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
