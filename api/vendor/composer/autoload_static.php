<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc33e18bb34e94155f68831c208901b70
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc33e18bb34e94155f68831c208901b70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc33e18bb34e94155f68831c208901b70::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc33e18bb34e94155f68831c208901b70::$classMap;

        }, null, ClassLoader::class);
    }
}