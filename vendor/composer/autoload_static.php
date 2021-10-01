<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba184d61635daedd2985b1e4b2a7db32
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'ReallySimpleJWT\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ReallySimpleJWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/rbdwllr/reallysimplejwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba184d61635daedd2985b1e4b2a7db32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba184d61635daedd2985b1e4b2a7db32::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba184d61635daedd2985b1e4b2a7db32::$classMap;

        }, null, ClassLoader::class);
    }
}