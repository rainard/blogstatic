<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3cbdb6f4e7d2e7aa01fda9888df93861
{
    public static $files = array (
        '3df8ee254224091c21b9aebb792d2f8b' => __DIR__ . '/..' . '/codeinwp/themeisle-sdk/load.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit3cbdb6f4e7d2e7aa01fda9888df93861::$classMap;

        }, null, ClassLoader::class);
    }
}
