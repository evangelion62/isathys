<?php
function autoload($class)
{
  if (is_file('../'.str_replace('\\', '/', $class).'.class.php')){
	require '../'.str_replace('\\', '/', $class).'.class.php';
  }
}
 
spl_autoload_register('autoload');