<?php
class main {
	
	public function index() {
		$data['title'] = "This Title";
		load::view("header", $data);
		load::view("footer");
	}
	
}