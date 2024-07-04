<?php
/*
 * Instead of loading files all the time in classes, this function (after _autoload became deprecated)
 * checks for all instantiated classes within the namespace that will be defined and autoloads them
 * instead of requiring/including classes every now and then.
 */
spl_autoload_register(function ($className) {
    /*
     * Replace namespace separator with directory separator (works for Windows/Linux/Mac)
     */
    $className = str_replace('app\\', '', $className);
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $path = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
    
    if (!file_exists($path)) {
        return false;
    }
    
    require $path;
});
