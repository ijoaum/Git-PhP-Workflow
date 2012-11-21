<?php

/**
 * Representação de uma branch
 * @property GitLog $log
 */
class GitBranch extends Git{
	
	public $name;
	public $errors;
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
	 * @return GitReturn
	 */
	private function push(){
		$gitReturn = new GitReturn();
		$gitStatus  = new GitStatus();
		
		if($gitStatus->hasChanges) {
			$gitReturn->sucess = false;
			$gitReturn->message = "Please commit your changes before push.";
		} else {
			$push = Git::execute("push origin ".$this->name);
			$gitReturn->shellReturn = $push;
			
			if(stripos($push, "error") !== false) {
				$gitReturn->sucess = false;
				$gitReturn->message = "Git error.";			
			} else {
				$gitReturn->sucess = true;
				$gitReturn->message = "Pushed.";
			}
		
		}
		
		return $gitReturn;
		
	}
	
	/**
	 * @return GitReturn
	 */
	private function pull(){
		$gitReturn = new GitReturn();
		$gitStatus  = new GitStatus();
		
		if($gitStatus->hasChanges) {
			$gitReturn->sucess = false;
			$gitReturn->message = "Please commit your changes before pull.";
		} else {
			$push = Git::execute("pull origin ".$this->name);
			$gitReturn->shellReturn = $push;
			
			if(stripos($push, "error") !== false) {
				$gitReturn->sucess = false;
				$gitReturn->message = "Git error.";			
			} else {
				$gitReturn->sucess = true;
				$gitReturn->message = "Pulled.";
			}
		
		}
		
		return $gitReturn;
		
	}
	
	/**
	 * @return GitReturn
	 */
	public function sync(){
		$gitReturn = new GitReturn();
		$gitStatus  = new GitStatus();
		
		if($gitStatus->hasChanges) {
			$gitReturn->sucess = false;
			$gitReturn->message = "Please commit your changes before sync.";
		} else {
			
			$pull = $this->pull();
			if(!$pull->sucess) {
				return $pull;
			} else {
				$push = $this->push();
				if(!$push->sucess) {
					return $push;
				} else {
					//Sucesso
					$gitReturn->sucess = true;
					$gitReturn->message = "Branch in sync.";
					$gitReturn->shellReturn = $pull->shellReturn . "\n\n" . $push->shellReturn;		
				}
			}
		}
		
		return $gitReturn;
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
	
	/**
	 * @return GitBranch
	 */
	public static function cast($gitBranch){
		return $gitBranch;
	}
	
	
}
