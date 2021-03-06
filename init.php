<?php
/**
 * Automatically includes classes
 * 
 * @throws Exception
 * 
 * @param  string $class_name  Name of the class to load
 * @return void
 */
function __autoload($class_name)
{
    // Customize this to your root Flourish directory
    $flourish_root = __DIR__ . '/flourish/';
    
    $file = $flourish_root . $class_name . '.php';
    
    if (file_exists($file)) {
        include $file;
        return;
    }
    
    throw new Exception('The class ' . $class_name . ' could not be loaded');
}