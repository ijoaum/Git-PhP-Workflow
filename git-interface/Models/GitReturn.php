<?php

/**
 * 
 * 
 */
class GitReturn extends Git{
	
	public $success;
	public $message;
	public $shellReturn;
	
	/**
	 * @return GitReturn
	 */
	public static function cast($object){
		return $object;
	}
	
	
}
