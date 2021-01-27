<?php

if (! function_exists('load_class')) {

    function &load_class($class, $directory = '')
    {
        $registry = Class_Registry::getInstance();
		
		//if the object already exists in the registry
		if($registry->getObject($class) != NULL){
			$object = $registry->getObject($class);
			return $object;
		}
		
		//if not, load the files
		$full_path = ROOT .'/'. $directory . '/' . strtolower($class) . '.php';
		
		if (file_exists($full_path)){
			require_once($full_path);
		}else{
			die($class . " is not found!");
		}
		$className = ucfirst(strtolower($class));
		
		//put it in the registry
		$registry->storeObject($class, new $className());
		
		$object = $registry->getObject($class);
		return $object;
    }
}