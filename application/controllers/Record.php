<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Home.php');

class Record extends Home
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	// __________________ Start Record __________________
	public function record()
	{
		$data['page_content'] = $this->load->view('record/recordTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Record ____________________

}
