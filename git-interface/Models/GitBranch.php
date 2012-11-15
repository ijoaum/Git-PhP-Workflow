<?php

/**
 * Representação de uma branch
 * @property GitLog $log
 */
class GitBranch extends Git{
	
	public $name;
	private $log;
	
	private $active = false;
	
	public function __construct($name) {
		
		if(substr($name, 0, 1) == "*") {
			$this->active = true;
			$name = substr($name, 1);
		}
		
		$name = trim($name);
		$this->name = $name;
		
		$this->log = new GitLog($this);
		
	}
	/**
	 * @return GitLog
	 */
	public function log(){
		return $this->log;
	}
	
	public function isActive(){
		return $this->active;
	}
	
	/**
	 * Static functions
	 */
	
	public static function newBranch($branchName){
		return Git::execute("branch ".$branchName);
	}
	
	public static function checkoutBranch($branchName){
		return Git::execute("checkout ".$branchName);
	}
	
	public static function merge($branchName){
		return Git::execute("merge ".$branchName);
	}
	
}
