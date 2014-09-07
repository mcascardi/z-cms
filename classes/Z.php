<?php
/**
 * Z Class File
 *
 * Defines the FileUtil class
 *
 * PHP Version 5
 *
 * @since 0.1
 */
if (!function_exists('render')) {
  die("render() must be defined!".PHP_EOL);
}

/**
 * Z Class Definition
 *
 * Z class which contains a data structure that is passed to the
 * constructor that can be rendered to html content when expressed as
 * a string.
 * 
 * @since 0.1
 */
class Z {
    
    /**
     * Z Constructor
     *
     * Attaches the parameters to the $data property.
     *
     * @since 0.1
     */
    function __construct() {
        $this->data = func_get_args();
    }
    
    /** 
     * Z To String
     *
     * Calls render on the $data property
     *
     * @return string
     * @since 0.1
     */
    function __toString() {
        return render($this->data);
    }
}
