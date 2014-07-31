<?php
if (!function_exists('render')) {
  die("render() must be defined!".PHP_EOL);
}
class Z {
  function __construct() {
    $this->data = func_get_args();
  }
  function __toString() {
    return render($this->data);
  }
}
