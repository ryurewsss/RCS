<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

class Login extends Main
{

	public function __construct()
	{
		parent::__construct();
	}



	public function index()
	{
		// if ($this->genlib->checkLogin()) { //if have seesion goto login page
		// 	redirect('Home', 'refresh');
		// } else {
		// 	$this->load->view('login');
		// }
		$this->load->view('login');
	}

	public function checkUsername()
	{
		$getData = $this->input->post();
		$returnData = $this->ieModel->getAll($getData['tableName'], '', array($getData['columnName'] => $getData['user_username']));
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
	}

	public function addUser()
	{
		$getData = $this->input->post();
		$arrayData = $getData['arrayData'];

		$arrayData['user_password'] = password_hash($arrayData['user_password'], PASSWORD_DEFAULT);

		$this->ieModel->add('ie_user', $arrayData);
	}

	public function login()
	{
		$getData = $this->input->post();
		$json['username'] = $getData['user_username'];
		$json['password'] = $getData['user_password'];

		$result = $this->ieModel->getAll('ie_user', '*', array('user_username' => $json['username']));
		// echo $result;
		// die();
		if ($result) {
			if ($result[0]->user_password) {
				if (password_verify($json['password'], $result[0]->user_password)) {
					$_SESSION['name'] = $result[0]->user_name;
					$_SESSION['id'] = $result[0]->user_id;
					// $_SESSION['username'] = $result->row()->username;
					$json['login'] = 'True';
				} else {
					$json['login'] = 'False';
				} //wrong password
			}
		} else {
			redirect('Main/index');
		} // when already login

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}

	public function logout()
	{
		// unset($_SESSION['role']);
		session_destroy();
		redirect(base_url('Login'));
	}
}
