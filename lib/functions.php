<?php

// Utility HTML Tags
/**
 *dynamically create html helper functions which take the args 
 *$string_contents, $optional_hash_of_options 
 *and return the contents wrapped in a tag 
 */  

$allowed_tags = array(
                      '!doctype', 'a', 'abbr', 'address', 'area', 'article',
                      'aside', 'audio', 'b', 'base', 'bb', 'bdi', 'bdo', 
                      'blockquote', 'body', 'br', 'button', 'canvas', 'caption',
                      'cite', 'code', 'col', 'colgroup', 'command', 'data',
                      'datagrid', 'datalist', 'dd', 'del', 'details', 'dfn', 
                      'div', 'dl', 'dt', 'em', 'embed', 'eventsource', 'fieldset',
                      'figcaption', 'figure', 'footer', 'form', 'h1', 'h2', 'h3', 
                      'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html',
                      'i', 'iframe', 'img', 'input', 'ins', 'kbd', 'keygen',
                      'label', 'legend', 'li', 'link', 'mark', 'map', 'menu',
                      'meta', 'meter', 'nav', 'noscript', 'object', 'ol', 
                      'optgroup', 'option', 'output', 'p', 'param', 'pre', 
                      'progress', 'q', 'ruby', 'rp', 'rt', 's', 'samp', 'script',
                      'section', 'select', 'small', 'source', 'span', 'strong', 
                      'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 
                      'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr',
                      'track', 'u', 'ul', 'var', 'video', 'wbr'
                      ); 

$args = '$html, $options=Array()'; 
$evalCode = <<<'PHP'
  $o = ""; 
  foreach ($options as $a => $b) { 
    $o .= " $a=\"$b\""; 
  } 
  return "<$tag$o>$html</$tag>"; 
PHP;
 
foreach ($allowed_tags as $key => $tag) { 
  ${$tag} = create_function($args, "\$tag = '$tag'; $evalCode"); 
} 


function is_not_array($a)
{
  return !is_array($a);
}

function render($arg) {

  if (!is_array($arg)) {
    return $arg;
  }

  $currentItem = array_shift($arg);
  
  $attributes = array_filter($arg, 'is_array');
  $not_attributes = array_filter($arg, 'is_not_array');
  
  if (count($attributes) > 0) {
    $params = call_user_func_array('array_merge', $attributes);
  }
  else {
    $params = array();
  }

  return $currentItem(
		      implode(PHP_EOL, array_map('render', $not_attributes)),
		      $params
		      );
}

function z()
{
  return new Z(func_get_args());
}
