<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

class Car extends Main
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	// __________________ Start Car __________________
	public function car()
	{
		$data['page_content'] = $this->load->view('car/carTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Car ____________________

	// __________________ Start search __________________
	public function search()
	{
		$data['page_content'] = $this->load->view('car/searchTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End search ____________________

	// __________________ Start report __________________
	public function report()
	{
		$yearData['select_box'] = $this->ieModel->getAll('ie_transaction', 'SUBSTRING(transaction_date, 1, 4) as year', 'transaction_delete_status = "active" and transaction_user_id = ' . $_SESSION['id'], '', '', 'year'); //select_box Year
		$data['page_content'] = $this->load->view('car/reportTable', $yearData, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End report ____________________

	// __________________ Start profile __________________
	public function profile()
	{
		$data['page_content'] = $this->load->view('profile/Profile', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End profile ____________________

	// __________________ Start getDataProfile __________________
	public function getDataProfile()
	{
		$getData = $this->input->post();
		$getData['where'] = array('user_id' => $_SESSION['id']);
		$data['table'] = $this->ieModel->getAll($getData['tableName'], $getData['colName'], $getData['where'], $getData['order'], $getData['arrayJoinTable'], $getData['groupBy']);
		$json['html'] = $this->load->view($getData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getDataProfile ____________________

	// __________________ Start checkPassword __________________
	public function checkPassword()
	{
		$getData = $this->input->post();
		$result = $this->ieModel->getAll($getData['tableName'], $getData['columnName'], array('user_id' => $_SESSION['id'])); //password user
		$passwordcodedb = $result[0]->user_password;
		$returnData = password_verify($getData['password'], $passwordcodedb);
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
	}
	// ___________________ End checkPassword ____________________

	// __________________ Start changePassword __________________
	public function changePassword()
	{
		$getData = $this->input->post();
		$tableData = $getData['table'];
		$arrayData = $getData['arrayData'];
		$arrayData['user_password'] = password_hash($arrayData['user_password'], PASSWORD_DEFAULT);
		$arrayWhere['user_id'] = $_SESSION['id'];

		$this->ieModel->update($tableData['tableName'], $arrayWhere, $arrayData);
	}
	// __________________ End changePassword __________________
}
