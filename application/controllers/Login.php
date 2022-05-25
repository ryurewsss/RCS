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
		$arrayData = array(
			'tableName' => 'rmap_user',
			'colName' => '',
			'where' => 'user_username = "'.$this->input->post('user_username').'"',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$this->output->set_content_type('application/json')->set_output(json_encode($data['table']));
	}

	public function checkEmail()
	{
		$arrayData = array(
			'tableName' => 'rmap_user',
			'colName' => '',
			'where' => 'user_email = "'.$this->input->post('user_email').'"',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$this->output->set_content_type('application/json')->set_output(json_encode($data['table']));
	}

	public function addUser()
	{
		$arrayData = $this->input->post();
		// $arrayData['user_password'] = password_hash($arrayData['user_password'], PASSWORD_DEFAULT);
		$arrayData['user_password'] = md5($arrayData['user_password']);

		$result = "";
		$generator = "1526380947";
		for ($i = 1; $i <= 6; $i++) {
			$result .= substr($generator, (rand() % (strlen($generator))), 1);
		}//get verification code
		$arrayData['user_verification_code'] = $result;

		$this->output->set_content_type('application/json')->set_output(json_encode($this->crsModel->add('rmap_user', $arrayData)));
	}

	public function login()
	{
		$getData = $this->input->post();
		$json['username'] = $getData['user_username'];
		$json['password'] = $getData['user_password'];

		$result = $this->crsModel->getAll('rmap_user', '', array('user_username' => $json['username']));
		
		if ($result) {
			if ($result[0]->user_password) {
				if(md5($json['password']) == $result[0]->user_password){
					$_SESSION['id'] = $result[0]->user_id;
					$json['login'] = 'True';
				}else {
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
		session_destroy();
		redirect(base_url());
	}

	public function sendEmail()
	{
		$arrayData = array(
			'tableName' => 'rmap_user',
			'colName' => '
				user_email,
				user_username,
				user_verification_code',
			'where' => 'user_id = '. $this->input->post("tran_id"),
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['user_type'] = $this->input->post("user_type");
		$arrayData = array('pathView' => 'phpMailer/sendEmail');
		$this->load->view($arrayData['pathView'], $data, TRUE);
	}
}
