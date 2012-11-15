<?php

/**
 * 
 */
class GitCommit extends Git {
	
	public $id;
	public $sha1;
	public $author;
	public $date;
	public $mesage;
	
	function __construct($commit) {
		$this->id 		= substr($commit->commit, 0, 6);
		$this->sha1		= $commit->commit;
		$this->author 	= $commit->author;
		$this->date 	= $commit->date;
		$this->mesage	= $commit->mesage;
	}
}
