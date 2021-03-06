<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

class User extends Main
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	// __________________ Start user __________________
	public function user()
	{
		$arrayData = array(
			'tableName' => 'crs_user_type',
			'colName' => '
				crs_user_type.user_type_id, 
				crs_user_type.user_type_name',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$user['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['page_content'] = $this->load->view('user/userTable', $user, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End user ____________________


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
		$data['table'] = $this->crsModel->getAll($getData['tableName'], $getData['colName'], $getData['where'], $getData['order'], $getData['arrayJoinTable'], $getData['groupBy']);
		$json['html'] = $this->load->view($getData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getDataProfile ____________________

	// __________________ Start checkPassword __________________
	public function checkPassword()
	{
		$getData = $this->input->post();
		$result = $this->crsModel->getAll($getData['tableName'], $getData['columnName'], array('user_id' => $_SESSION['id'])); //password user
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

		$this->crsModel->update($tableData['tableName'], $arrayWhere, $arrayData);
	}
	// __________________ End changePassword __________________

	// __________________ Start getUser __________________
	public function getUser()
	{
		$arrayData = array(
			'tableName' => 'crs_user',
			'colName' => 'crs_user.user_id, crs_user.user_email, crs_user.user_fname, crs_user.user_lname, crs_user.user_phone, crs_user.user_type_id, crs_user_type.user_type_name',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => array('crs_user_type' => 'crs_user_type.user_type_id = crs_user.user_type_id'),
			'groupBy' => '',
			'pathView' => 'user/tableUser'
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getUser ____________________

	// __________________ Start deleteUser __________________
	public function deleteUser()
	{

		$arrayData = array(
			'tableName' => 'crs_user',
			'columnIdName' => 'user_id',
			'id' => $this->input->post('id')
		);
		$this->crsModel->delete($arrayData['tableName'], $arrayData['columnIdName'], $arrayData['id']);
		$arrayData['sql'] = $this->db->last_query(); //for dev
		// $this->output->set_content_type('application/json')->set_output(json_encode($arrayData));
	}
	// ___________________ End deleteUser ____________________

	// __________________ Start addCarModel __________________
	public function addUser()
	{
		
		$getData = $this->input->post();

		$arrayData = array(
			'user_email' => $getData['user_email'],
			'user_password' => password_hash($getData['user_password'], PASSWORD_DEFAULT), 
			'user_fname' => $getData['user_fname'],
			'user_lname' => $getData['user_lname'],
			'user_phone' => $getData['user_phone'],
			'user_type_id' => $getData['user_type_id'],
			'user_create_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		$addedId = $this->crsModel->add('crs_user', $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($addedId));

	}
	// ___________________ End addCarModel ____________________

	public function editUser()
	{
		
		$getData = $this->input->post();

		$arrayData = array(
			'user_email' => $getData['user_email'],
			'user_fname' => $getData['user_fname'],
			'user_lname' => $getData['user_lname'],
			'user_phone' => $getData['user_phone'],
			'user_type_id' => $getData['user_type_id'],
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('user_id' => $getData['user_id']);
		$editedId = $this->crsModel->update('crs_user',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));

	}
	// ___________________ End addCarModel ____________________

	// __________________ Start editProfile __________________
	public function editProfile()
	{
		$config['upload_path'] = './img/user_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('user_upload')){
			echo $this->upload->display_errors();
		}else{

			$file_pointer = './img/user_img/' . $this->input->post('old_image');
			// print_r($file_pointer);
			if (!unlink($file_pointer)) { 
				echo ("$file_pointer cannot be deleted due to an error"); 
			} 
			else { 
				echo ("$file_pointer has been deleted"); 
			}//delete file

			$data = $this->upload->data();
			$filename = $data['file_name'];
			$arrayData = array(
				'user_id' => $_SESSION['id'],
				'user_fname' => $this->input->post('user_fname'),
				'user_lname' => $this->input->post('user_lname'),
				'user_phone' => $this->input->post('user_phone'),
				'user_image' => $filename,
				'user_update_id' => $_SESSION['id']
			);
			$arrayWhere = array('user_id' => $_SESSION['id']);
			$editedId = $this->crsModel->update('crs_user',$arrayWhere, $arrayData);
			// $this->output->set_content_type('application/json')->set_output(json_encode($editedId));
		}
	}
	// ___________________ End editProfile ____________________
	
	// __________________ Start editProfileNoFile __________________
	public function editProfileNoFile()
	{
		// $arrayData = array(
		// 	'car_registration' => $this->input->post('car_registration'),
		// 	'car_brand' => $this->input->post('car_brand'),
		// 	'car_model' => $this->input->post('car_model'),
		// 	'car_feature' => $this->input->post('car_feature'),
		// 	'car_description' => $this->input->post('car_description'),
		// 	'car_price' => $this->input->post('car_price'),
		// );
		$arrayData = array(
			'user_id' => $_SESSION['id'],
			'user_fname' => $this->input->post('user_fname'),
			'user_lname' => $this->input->post('user_lname'),
			'user_phone' => $this->input->post('user_phone'),
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('user_id' => $_SESSION['id']);
		$editedId = $this->crsModel->update('crs_user',$arrayWhere, $arrayData);
	}
	// ___________________ End editProfileNoFile ____________________
}
