<?php
class matcheslist
{
	public $_head;     
	public $_tail;
	public $_count;

    	function __construct() {
        	$this->_firstNode = NULL;
        	$this->_lastNode = NULL;
        	$this->_count = 0;
    	}
}

class matches
{
	public $next;
    	public $previous;
	public $matchnumber;
	public $email;
	public $gender;
	public $picturelink;
	public $matchesarr;
	public $age;
	
	function __construct() {
		$this->next = NULL;
		$this->previous = NULL;
		$this->matchnumber = 0;
		$this->email = "";
		$this->gender = "";
		$this->picturelink = "";
		$this->matchesarr = NULL;
		$this->age = 0;
	}
}

$usermatches = new matcheslist();
$usermatches->_head = NULL;
$usermatches->_tail = NULL;

$newmatch = new matches();
?>