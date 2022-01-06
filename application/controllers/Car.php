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
		// $arrayData = array(
		// 	'tableName' => 'crs_car_model',
		// 	'colName' => 'crs_car_model.car_model_id, crs_car_model.car_model_name, crs_car_model.car_model_feature, crs_car_model.car_model_description, crs_car_model.car_brand_id, crs_car_brand.car_brand_name_en',
		// 	'where' => '',
		// 	'order' => '',
		// 	'arrayJoinTable' => array('crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'),
		// 	'groupBy' => ''
		// );

		$arrayData = array(
			'tableName' => 'crs_car_model',
			'colName' => '
				crs_car_model.car_model_id, 
				crs_car_model.car_model_name,
				crs_car_model.car_brand_id,
				crs_car_brand.car_brand_name_en',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => array('crs_car_brand' => 'crs_car_model.car_brand_id = crs_car_brand.car_brand_id',),
			'groupBy' => ''
		);

		$modelCar['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['page_content'] = $this->load->view('car/carTable', $modelCar, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Car ____________________

	// __________________ Start carBrand __________________
	public function carBrand()
	{
		$data['page_content'] = $this->load->view('car/carBrandTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End carBrand ____________________

	// __________________ Start carModel __________________
	public function carModel()
	{

		$arrayData = array(
			'tableName' => 'crs_car_brand',
			'colName' => 'car_brand_id, car_brand_name_th, car_brand_name_en',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$brand['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$data['page_content'] = $this->load->view('car/carModelTable', $brand, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End carModel ____________________



	// __________________ Start addCar __________________
	public function addCar()
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
			$data = $this->upload->data();
			$filename = $data['file_name'];
			$arrayData = array(
				'car_registration' => $this->input->post('car_registration'),
				'car_model_id' => $this->input->post('car_model_id'),
				'car_owner_id' => $_SESSION['id'],
				'car_price' => $this->input->post('car_price'),
				'car_promotion' => 0,
				'car_image' => $filename,
				'car_proof_image' => $filename,
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			print_r($arrayData);
			$addedId = $this->crsModel->add('crs_car', $arrayData);
			// $this->output->set_content_type('application/json')->set_output(json_encode($addedId));
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
				'car_model_id' => $this->input->post('car_model_id'),
				'car_owner_id' => $_SESSION['id'],
				'car_price' => $this->input->post('car_price'),
				'car_promotion' => 0,
				'car_image' => $filename,
				'car_proof_image' => $filename,
				'user_update_id' => $_SESSION['id']
			);
			$arrayWhere = array('car_id' => $this->input->post('car_id'));
			$editedId = $this->crsModel->update('crs_car',$arrayWhere, $arrayData);
			// $this->output->set_content_type('application/json')->set_output(json_encode($editedId));
		}
	}
	// ___________________ End editCar ____________________
	

	// __________________ Start editCarNoFile __________________
	public function editCarNoFile()
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
			'car_registration' => $this->input->post('car_registration'),
			'car_model_id' => $this->input->post('car_model_id'),
			'car_owner_id' => $_SESSION['id'],
			'car_price' => $this->input->post('car_price'),
			'car_promotion' => 0,
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('car_id' => $this->input->post('car_id'));
		$editedId = $this->crsModel->update('crs_car',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editCarNoFile ____________________

	// __________________ Start getCarTable __________________
	public function getCarTable()
	{
		
		$arrayData = array(
			'tableName' => 'crs_car',
			'colName' => '
				crs_car.car_id,
				crs_car.car_registration,
				crs_car.car_price,
				crs_car.car_image,
				crs_car_model.car_model_id, 
				crs_car_model.car_model_name, 
				crs_car_model.car_model_feature, 
				crs_car_model.car_model_description, 
				crs_car_model.car_brand_id, 
				crs_car_brand.car_brand_name_en',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => array(
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'
			),
			'groupBy' => ''
		);

		if($this->input->post('type') == 'manage'){
			$arrayData['pathView'] = 'car/tableCar';
		}
		if($this->input->post('type') == 'show'){
			$arrayData['pathView'] = 'car/tableCarMain';
		}

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
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
		$this->crsModel->delete($arrayData['tableName'], $arrayData['columnIdName'], $arrayData['id']);
		$arrayData['sql'] = $this->db->last_query(); //for dev
		// $this->output->set_content_type('application/json')->set_output(json_encode($arrayData));
	}
	// ___________________ End deleteCar ____________________

	// __________________ Start getCarBrandTable __________________
	public function getCarBrandTable()
	{
		$arrayData = array(
			'tableName' => 'crs_car_brand',
			'colName' => '',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => '',
			'pathView' => 'car/tableCarBrand'
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		if ($arrayData['pathView'] != "getData") {
			$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getCarBrandTable ____________________

	// __________________ Start addCarBrand __________________
	public function addCarBrand()
	{
		
		$getData = $this->input->post();
		$arrayData = array(
			'car_brand_name_th' => $getData['car_brand_name_th'],
			'car_brand_name_en' => $getData['car_brand_name_en'],
			'user_create_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		$addedId = $this->crsModel->add('crs_car_brand', $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($addedId));

	}
	// ___________________ End addCarBrand ____________________

	// __________________ Start editCarBrand __________________
	public function editCarBrand()
	{
		$getData = $this->input->post();

		$arrayData = array(
			'car_brand_name_th' => $getData['car_brand_name_th'],
			'car_brand_name_en' => $getData['car_brand_name_en'],
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('car_brand_id' => $getData['car_brand_id']);
		$editedId = $this->crsModel->update('crs_car_brand',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editCarBrand ____________________

	// __________________ Start deleteCarBrand __________________
	public function deleteCarBrand()
	{

		$arrayData = array(
			'tableName' => 'crs_car_brand',
			'columnIdName' => 'car_brand_id',
			'id' => $this->input->post('id')
		);
		$this->crsModel->delete($arrayData['tableName'], $arrayData['columnIdName'], $arrayData['id']);
		$arrayData['sql'] = $this->db->last_query(); //for dev
		// $this->output->set_content_type('application/json')->set_output(json_encode($arrayData));
	}
	// ___________________ End deleteCarBrand ____________________

	// __________________ Start getCarModelTable __________________
	public function getCarModelTable()
	{
		$arrayData = array(
			'tableName' => 'crs_car_model',
			'colName' => 'crs_car_model.car_model_id, crs_car_model.car_model_name, crs_car_model.car_model_feature, crs_car_model.car_model_description, crs_car_model.car_brand_id, crs_car_brand.car_brand_name_en',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => array('crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'),
			'groupBy' => '',
			'pathView' => 'car/tableCarModel'
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getCarModelTable ____________________

	// __________________ Start addCarModel __________________
	public function addCarModel()
	{
		
		$getData = $this->input->post();

		if($getData['car_brand_id'] == 0){
			
			$arrayBrandData = array(
				'car_brand_name_th' => $getData['car_brand_name_th'],
				'car_brand_name_en' => $getData['car_brand_name_en'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$getData['car_brand_id'] = $this->crsModel->add('crs_car_brand', $arrayBrandData);
		}

		$arrayData = array(
			'car_brand_id' => $getData['car_brand_id'],
			'car_model_name' => $getData['car_model_name'],
			'car_model_feature' => $getData['car_model_feature'],
			'car_model_description' => $getData['car_model_description'],
			'user_create_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		$addedId = $this->crsModel->add('crs_car_model', $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($addedId));

	}
	// ___________________ End addCarModel ____________________

	// __________________ Start editCarModel __________________
	public function editCarModel()
	{
		$getData = $this->input->post();

		if($getData['car_brand_id'] == 0){
			
			$arrayBrandData = array(
				'car_brand_name_th' => $getData['car_brand_name_th'],
				'car_brand_name_en' => $getData['car_brand_name_en'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$getData['car_brand_id'] = $this->crsModel->add('crs_car_brand', $arrayBrandData);
		}

		$arrayData = array(
			'car_brand_id' => $getData['car_brand_id'],
			'car_model_name' => $getData['car_model_name'],
			'car_model_feature' => $getData['car_model_feature'],
			'car_model_description' => $getData['car_model_description'],
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('car_model_id' => $getData['car_model_id']);
		$editedId = $this->crsModel->update('crs_car_model',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editCarModel ____________________

	// __________________ Start deleteCarModel __________________
	public function deleteCarModel()
	{

		$arrayData = array(
			'tableName' => 'crs_car_model',
			'columnIdName' => 'car_model_id',
			'id' => $this->input->post('id')
		);
		$this->crsModel->delete($arrayData['tableName'], $arrayData['columnIdName'], $arrayData['id']);
		$arrayData['sql'] = $this->db->last_query(); //for dev
		// $this->output->set_content_type('application/json')->set_output(json_encode($arrayData));
	}
	// ___________________ End deleteCarModel ____________________

	// __________________ Start getCarSelectModel __________________
	public function getCarSelectModel()
	{
		$arrayData = array(
			'tableName' => 'crs_car_model',
			'colName' => 'car_model_id, car_model_name, car_model_feature, car_model_description',
			'where' => 'car_model_id = '.$this->input->post('id'),
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getCarModelTable ____________________





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
		$yearData['select_box'] = $this->crsModel->getAll('ie_transaction', 'SUBSTRING(transaction_date, 1, 4) as year', 'transaction_delete_status = "active" and transaction_user_id = ' . $_SESSION['id'], '', '', 'year'); //select_box Year
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
}
