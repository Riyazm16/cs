<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit468c4bff6e4a59a5998316067784a377
{
    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit468c4bff6e4a59a5998316067784a377::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}