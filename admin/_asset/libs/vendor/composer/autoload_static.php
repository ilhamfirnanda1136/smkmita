<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb973746b1a31fabe6f2051df0dbaaa4c
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'R' => 
        array (
            'Ramsey\\Uuid\\' => 12,
        ),
        'M' => 
        array (
            'Moontoast\\Math\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Ramsey\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramsey/uuid/src',
        ),
        'Moontoast\\Math\\' => 
        array (
            0 => __DIR__ . '/..' . '/moontoast/math/src/Moontoast/Math',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb973746b1a31fabe6f2051df0dbaaa4c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb973746b1a31fabe6f2051df0dbaaa4c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb973746b1a31fabe6f2051df0dbaaa4c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
