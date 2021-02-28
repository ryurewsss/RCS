<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

class Record extends Main
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

	// __________________ Start Record __________________
	public function search()
	{
		$data['page_content'] = $this->load->view('record/searchTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Record ____________________

	// __________________ Start Record __________________
	public function report()
	{
		$data['page_content'] = $this->load->view('record/reportTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Record ____________________

}
