<?php
/*
	
	"A person with a new idea is a crank until the idea succeeds." ~Mark Twain
	
	"There are three methods to gaining wisdom. 
	The first is reflection, which is the highest. 
	The second is limitation, which is the easiest. 
	The third is experience, which is the bitterest." ~Confucius
	
	~K
*/
class main extends BaseController {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		load::view("welcome");

		
		
	}

	
}
