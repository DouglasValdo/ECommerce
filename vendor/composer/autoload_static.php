<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81ab01da9097e644b4c9c4f4b0bf7c28
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Library\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Library\\Authentication\\ApplicationUser' => __DIR__ . '/../..' . '/App/Model/Authentication/ApplicationUser.php',
        'Library\\Authentication\\AuthenticationFactory' => __DIR__ . '/../..' . '/App/Model/Authentication/AuthenticationFactory.php',
        'Library\\Authentication\\AuthenticatorEnum' => __DIR__ . '/../..' . '/App/Model/Authentication/AuthenticatorEnum.php',
        'Library\\Authentication\\DefaultAuthenticator' => __DIR__ . '/../..' . '/App/Model/Authentication/DefaultAuthenticator.php',
        'Library\\Authentication\\IAuthenticator' => __DIR__ . '/../..' . '/App/Model/Authentication/IAuthenticator.php',
        'Library\\DBase\\DBaseContext' => __DIR__ . '/../..' . '/App/Model/DBase/DBaseContext.php',
        'Library\\Registration\\Register' => __DIR__ . '/../..' . '/App/Model/Registration/Register.php',
        'Library\\Registration\\RegisterOutcome' => __DIR__ . '/../..' . '/App/Model/Registration/RegisterOutcome.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81ab01da9097e644b4c9c4f4b0bf7c28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81ab01da9097e644b4c9c4f4b0bf7c28::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81ab01da9097e644b4c9c4f4b0bf7c28::$classMap;

        }, null, ClassLoader::class);
    }
}