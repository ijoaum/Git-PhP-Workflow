<?php

/**
 * Representação de uma branch
 */
class GitBranch {
	
	public $name;
	private $active = false;
	
	public function __construct($name) {
		
		if(substr($name, 0, 1) == "*") {
			$this->active = true;
			$name = substr($name, 1);
		}
		
		$name = trim($name);
		$this->name = $name;
	}
	
	public function isActive(){
		return $this->active;
	}
}
