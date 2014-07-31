<?php

class FileUtil {

  /**
   * Finds path, relative to the given root folder, of all files and
   * directories in the given directory and its sub-directories non
   * recursively.
   *
   * Returns an array of arrays like so:
   * array(
   *   'files' => [],
   *   'dirs'  => [],
   * )
   *
   * 
   * @author sreekumar
   * @param string $root
   * @result array
   */
  function listFiles($root = '.', $readHidden = false)
  {
    $files  = array();
    $directories  = array();
    $last_letter  = $root[strlen($root)-1];
    $root  = ($last_letter == '\\' || $last_letter == '/') ?
      $root : $root.DIRECTORY_SEPARATOR;
    $directories[]  = $root;
    while (sizeof($directories)) {
      $dir  = array_pop($directories);
      if ($handle = opendir($dir)) {
	while (false !== ($file = readdir($handle))) {
	  if (!$readHidden) {
	    if (substr($file, 0, 1) == '.' ) {
	      continue;
	    }
	  }
	  if ($file == '.' || $file == '..') {
	    continue;
	  }
	  $file  = $dir.$file;
	  /*
	  if (is_dir($file)) {
	    $directory_path = $file.DIRECTORY_SEPARATOR;
	    array_push($directories, $directory_path);
	    $files['dirs'][]  = $directory_path;
	  } else
	  */
	  if (is_file($file)) {
	    $files[]  = $file;
	  }
	}
	closedir($handle);
      }
    }
    return $files;
  }
  
  function includeAll($path) {
    foreach (self::listFiles($path) as $file) {
      include $file;
    }
  }
  
}

