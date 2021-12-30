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

	// __________________ Start addCar __________________
	public function addCar()
	{
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('car_upload')){
			echo $this->upload->display_errors();
		}else{
			$data = $this->upload->data();
			$filename = $data['file_name'];
			$arrayData = array(
				'car_registration' => $this->input->post('car_registration'),
				'car_brand' => $this->input->post('car_brand'),
				'car_model' => $this->input->post('car_model'),
				'car_feature' => $this->input->post('car_feature'),
				'car_description' => $this->input->post('car_description'),
				'car_price' => $this->input->post('car_price'),
				'car_upload' => $filename
			);
			$addedId = $this->ieModel->add('crs_car', $arrayData);
			$this->output->set_content_type('application/json')->set_output(json_encode($addedId));
		}

	}
	// ___________________ End addCar ____________________

	// __________________ Start editCar __________________
	public function editCar()
	{
		$config['upload_path'] = './img/car_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('car_upload')){
			echo $this->upload->display_errors();
		}else{

			$file_pointer = './img/car_img/' . $this->input->post('old_image');
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
				'car_registration' => $this->input->post('car_registration'),
				'car_brand' => $this->input->post('car_brand'),
				'car_model' => $this->input->post('car_model'),
				'car_feature' => $this->input->post('car_feature'),
				'car_description' => $this->input->post('car_description'),
				'car_price' => $this->input->post('car_price'),
				'car_upload' => $filename
			);
			$arrayWhere = array('car_id' => $this->input->post('car_id'));
			$editedId = $this->ieModel->update('crs_car',$arrayWhere, $arrayData);
			// $this->output->set_content_type('application/json')->set_output(json_encode($editedId));
		}
	}
	// ___________________ End editCar ____________________
	

	// __________________ Start editCarNoFile __________________
	public function editCarNoFile()
	{
		$arrayData = array(
			'car_registration' => $this->input->post('car_registration'),
			'car_brand' => $this->input->post('car_brand'),
			'car_model' => $this->input->post('car_model'),
			'car_feature' => $this->input->post('car_feature'),
			'car_description' => $this->input->post('car_description'),
			'car_price' => $this->input->post('car_price'),
		);
		$arrayWhere = array('car_id' => $this->input->post('car_id'));
		$editedId = $this->ieModel->update('crs_car',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editCarNoFile ____________________

	// __________________ Start getCarTable __________________
	public function getCarTable()
	{
		$arrayData = array(
			'tableName' => 'crs_car',
			'colName' => '',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => '',
			'pathView' => 'car/tableCar',
		);

		$data['table'] = $this->ieModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		if ($arrayData['pathView'] != "getData") {
			$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getCarTable ____________________


	// __________________ Start deleteCar __________________
	public function deleteCar()
	{

		$file_pointer = './img/car_img/' . $this->input->post('old_image');
		if (!unlink($file_pointer)) { 
			echo ("$file_pointer cannot be deleted due to an error"); 
		} 
		else { 
			echo ("$file_pointer has been deleted"); 
		}//delete file

		$arrayData = array(
			'tableName' => 'crs_car',
			'columnIdName' => 'car_id',
			'id' => $this->input->post('id')
		);
		$this->ieModel->delete($arrayData['tableName'], $arrayData['columnIdName'], $arrayData['id']);
		$arrayData['sql'] = $this->db->last_query(); //for dev
		// $this->output->set_content_type('application/json')->set_output(json_encode($arrayData));
	}
	// ___________________ End deleteCar ____________________



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
