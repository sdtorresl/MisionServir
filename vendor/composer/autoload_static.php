<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb5d3788f8b0ae0ca29b3d4e6c0689510
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb5d3788f8b0ae0ca29b3d4e6c0689510::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb5d3788f8b0ae0ca29b3d4e6c0689510::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
