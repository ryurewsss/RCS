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
		// 	'colName' => '
		// 		crs_car_model.car_model_id, 
		// 		crs_car_model.car_model_name,
		// 		crs_car_model.car_brand_id,
		// 		crs_car_brand.car_brand_name_en',
		// 	'where' => '',
		// 	'order' => '',
		// 	'arrayJoinTable' => array('crs_car_brand' => 'crs_car_model.car_brand_id = crs_car_brand.car_brand_id'),
		// 	'groupBy' => ''
		// );

		$arrayData = array(
			'tableName' => 'crs_car_brand',
			'colName' => '
				car_brand_id,
				car_brand_name_en
				',
			'where' => '',
			'order' => 'car_brand_id ASC',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$modelCar['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['page_content'] = $this->load->view('car/carTable', $modelCar, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Car ____________________

	// __________________ Start carSearch __________________
	public function carSearch()
	{

		$arrayData = array(
			'tableName' => 'crs_car_brand',
			'colName' => 'car_brand_id, car_brand_name_en',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$select['car_brand'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['page_content'] = $this->load->view('car/carSearch', $select, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End carSearch ____________________

	// __________________ Start getCarSearchTable __________________
	public function getCarSearchTable()
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
			'order' => 'crs_car.create_date DESC',
			'arrayJoinTable' => array(
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'
			),
			'groupBy' => ''
		);

		$getData = $this->input->post();
		if($getData['car_brand_id'] != '*'){
			$arrayData['where'] = $arrayData['where']." AND crs_car_brand.car_brand_id = ".$getData['car_brand_id'];
		}
		if($getData['car_model_id'] != '*'){
			$arrayData['where'] = $arrayData['where']." AND crs_car_model.car_model_id = ".$getData['car_model_id'];
		}
		// if($getData['car_type']!='*'){
		// 	$arrayData['where'] = $arrayData['where']." AND  = ".$getData['car_type'];
		// }
		if($getData['price_range']!='*'){
			$price = explode("-",$getData['price_range']);
			$arrayData['where'] = $arrayData['where']." AND crs_car.car_price >= ".$price[0]." AND crs_car.car_price <= ".$price[1];
		}
		if($arrayData['where'] != ''){
			$arrayData['where'] = substr($arrayData['where'],5);
		}// delete first AND
		
		$arrayData['pathView'] = 'car/tableCarSearch';

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getCarSearchTable ____________________

	// __________________ Start getModel __________________
	public function getModel()
	{
		$arrayData = array(
			'tableName' => 'crs_car_model',
			'colName' => 'car_model_id, car_model_name',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		if($this->input->post('car_brand_id')!='*'){
			$arrayData['where'] = 'car_brand_id = ' . $this->input->post('car_brand_id');
		}
		$data['car_model'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$data['sql'] = $this->db->last_query(); //for dev
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	// ___________________ End getModel ____________________


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
				'car_status' => 1,
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
			'order' => 'crs_car.create_date DESC',
			'arrayJoinTable' => array(
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'
			),
			'groupBy' => '',
			'limit' => '',
		);

		if($this->input->post('type') == 'manage'){
			$arrayData['pathView'] = 'car/tableCar';
		}
		if($this->input->post('type') == 'show'){
			$arrayData['limit'] = 6;
			$arrayData['pathView'] = 'car/tableCarMain';
		}

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy'],$arrayData['limit']);
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
			'order' => 'crs_car_model.car_model_id DESC',
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
		if($getData['formData']['car_brand_id'] == 0){
			
			$arrayBrandData = array(
				'car_brand_name_th' => $getData['formData']['car_brand_name_th'],
				'car_brand_name_en' => $getData['formData']['car_brand_name_en'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$getData['formData']['car_brand_id'] = $this->crsModel->add('crs_car_brand', $arrayBrandData);
		}

		$arrayData = array(
			'car_brand_id' => $getData['formData']['car_brand_id'],
			'car_model_name' => $getData['formData']['car_model_name'],
			'car_model_feature' => json_encode($getData['featureData']),
			'car_model_description' => $getData['formData']['car_model_description'],
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

		if($getData['formData']['car_brand_id'] == 0){
			
			$arrayBrandData = array(
				'car_brand_name_th' => $getData['formData']['car_brand_name_th'],
				'car_brand_name_en' => $getData['formData']['car_brand_name_en'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$getData['formData']['car_brand_id'] = $this->crsModel->add('crs_car_brand', $arrayBrandData);
		}

		$arrayData = array(
			'car_brand_id' => $getData['formData']['car_brand_id'],
			'car_model_name' => $getData['formData']['car_model_name'],
			'car_model_feature' => json_encode($getData['featureData']),
			'car_model_description' => $getData['formData']['car_model_description'],
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('car_model_id' => $getData['formData']['car_model_id']);
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
	// ___________________ End getCarSelectModel ____________________

	// __________________ Start carDetail __________________
	public function carDetail()
	{

		$arrayData = array(
			'tableName' => 'crs_car',
			'colName' => '
				crs_car.car_id,
				crs_car.car_registration,
				crs_car.car_owner_id,
				crs_car.car_price,
				crs_car.car_image,
				crs_user.user_type_id,
				crs_car_model.car_model_id,
				crs_car_model.car_model_name, 
				crs_car_model.car_model_feature, 
				crs_car_model.car_model_description, 
				crs_car_model.car_brand_id, 
				crs_car_brand.car_brand_name_en',
			'where' => 'crs_car.car_id = '. $_GET['carId'],
			'order' => '',
			'arrayJoinTable' => array(
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_user' => 'crs_user.user_id = crs_car.car_owner_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'
			),
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		if ($_GET['type'] == 'detail') {
			$data['page_content'] = $this->load->view('car/carDetail', $data, TRUE);
		}
		if ($_GET['type'] == 'rent') {

			if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
				$url = "https://";   
			else  
				$url = "http://";   
			// Append the host(domain name, ip) to the URL.   
			$url.= $_SERVER['HTTP_HOST'];   
			
			// Append the requested resource location to the URL   
			$url.= $_SERVER['REQUEST_URI'];    
			$_SESSION['url'] = $url;
			
			if($_SESSION['type'] != 0){

			$arrayPlace = array(
				'tableName' => 'crs_place',
				'colName' => '
					crs_place.place_id,
					crs_place.place_name,
					crs_place.place_address',
				'where' => '',
				'order' => 'crs_place.place_id DESC',
				'arrayJoinTable' => '',
				'groupBy' => ''
			);
			$data['placeSelect'] = $this->crsModel->getAll($arrayPlace['tableName'], $arrayPlace['colName'], $arrayPlace['where'], $arrayPlace['order'], $arrayPlace['arrayJoinTable'], $arrayPlace['groupBy']);
			
			$arrayPlace = array(
				'tableName' => 'crs_user_doc',
				'colName' => '
					user_doc_id,
					user_doc_iden_image,
					user_doc_license_image',
				'where' => 'user_id = '. $_SESSION['id'],
				'order' => '',
				'arrayJoinTable' => '',
				'groupBy' => ''
			);
			$data['user'] = $this->crsModel->getAll($arrayPlace['tableName'], $arrayPlace['colName'], $arrayPlace['where'], $arrayPlace['order'], $arrayPlace['arrayJoinTable'], $arrayPlace['groupBy']);

			$data['page_content'] = $this->load->view('car/carRent', $data, TRUE);
			}else{
				redirect('../Login', 'refresh');
			}
		}

		$this->load->view('main', $data);
	}
	// ___________________ End carDetail ____________________

	// __________________ Start carDetail __________________
	public function check_date()
	{

		// $data['check_date'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_car_tran?car_id=".$this->input->get('car_id')));
		$arrayPlace = array(
			'tableName' => 'crs_transaction',
			'colName' => '
				transaction_receive_date,
				transaction_return_date',
			'where' => 'car_id = '. $this->input->get('car_id')." AND transaction_status != 5",
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$data['check_date'] = $this->crsModel->getAll($arrayPlace['tableName'], $arrayPlace['colName'], $arrayPlace['where'], $arrayPlace['order'], $arrayPlace['arrayJoinTable'], $arrayPlace['groupBy']);
		
		$date_array = [];
		if($data['check_date']){
			foreach ($data['check_date'] as $key => $val) {
				$startDate = date("m-d-Y", strtotime(substr($val->transaction_receive_date,0,10)));
				$endDate = date("m-d-Y", strtotime(substr($val->transaction_return_date,0,10)));
				array_push($date_array,array($startDate,$endDate));
			}
		}
		$date['date_array'] = $date_array;
		$this->output->set_content_type('application/json')->set_output(json_encode($date));
		
	}
	// ___________________ End getQRcode ____________________

	// __________________ Start getQRcode __________________
	public function getQRcode()
	{
		$getData = $this->input->post();
		// $getData['tel'] = '';
		// $getData['price'] = '';
		$json['html'] = $this->load->view('qrcode/QRPaymentAPI', $getData, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getQRcode ____________________

	// __________________ Start addCarRent __________________
	public function addCarRent2()
	{
		$config['upload_path'] = './img/user_doc_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
	
		$pass = TRUE;

		// UPLOAD DOC

		$getData = $this->input->post();
		$this->load->library('upload', $config, 'docUpload');
		var_dump($getData);
		echo $this->input->post('user_doc_id');
		if($this->input->post('user_doc_id') == 0){
			//add doc
			if(!$this->docUpload->do_upload('iden_upload') ){
				echo $this->docUpload->display_errors();
				$pass = FALSE;
			}else{
				$data = $this->docUpload->data();
				$filename['iden_upload'] = $data['file_name'];
			}
			if(!$this->docUpload->do_upload('license_upload') ){
				echo $this->docUpload->display_errors();
				$pass = FALSE;
			}else{
				$data = $this->docUpload->data();
				$filename['license_upload'] = $data['file_name'];
			}
	
			$arrayData = array(
				'user_id' => $_SESSION['id'],
				'user_doc_iden_image' => $filename['iden_upload'],
				'user_doc_license_image' => $filename['license_upload'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$docId = $this->crsModel->add('crs_user_doc', $arrayData);
		}else{
			var_dump($this->input->post('iden_upload'));
			var_dump($this->input->post('license_upload'));
			// update doc
			if(!$this->docUpload->do_upload('iden_upload') ){
				echo $this->docUpload->display_errors();
				$filename['iden_upload'] = $getData['old_iden_upload'];
			}else{
				$data = $this->docUpload->data();
				$filename['iden_upload'] = $data['file_name'];
				$file_pointer = './img/user_doc_img/' . $getData['old_iden_upload'];
				if (!unlink($file_pointer)) { 
					echo ("$file_pointer cannot be deleted due to an error"); 
				} 
				else { 
					echo ("$file_pointer has been deleted"); 
				}//delete file
			}
			if(!$this->docUpload->do_upload('license_upload') ){
				echo $this->docUpload->display_errors();
				$filename['license_upload'] = $getData['old_license_upload'];
			}else{
				$data = $this->docUpload->data();
				$filename['license_upload'] = $data['file_name'];
				$file_pointer = './img/user_doc_img/' . $getData['old_license_upload'];
				if (!unlink($file_pointer)) { 
					echo ("$file_pointer cannot be deleted due to an error"); 
				} 
				else { 
					echo ("$file_pointer has been deleted"); 
				}//delete file
			}
			$arrayData = array(
				'user_doc_iden_image' => $filename['iden_upload'],
				'user_doc_license_image' => $filename['license_upload'],
				'user_update_id' => $_SESSION['id']
			);
			$arrayWhere = array('user_doc_id' => $getData['user_doc_id']);
			$docId = $getData['user_doc_id'];
			$this->crsModel->update('crs_user_doc',$arrayWhere, $arrayData);
		}

		$config['upload_path'] = './img/transaction_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
		$this->load->library('upload', $config, 'transactionUpload');
		if(!$this->transactionUpload->do_upload('transaction_upload')){
			echo $this->transactionUpload->display_errors();
			$pass = FALSE;
		}else{
			$data = $this->transactionUpload->data();
			$filename['transaction_upload'] = $data['file_name'];
		}
		if($pass){
			// $datetimes = $this->input->post('datetimes');
			// datepicker
			// datetimepicker
			// $date['startDate'] = substr($datetimes,0,10); //substr
			// $date['startTime'] = substr($datetimes,11,5);
			// $date['endDate'] = substr($datetimes,19,10);
			// $date['endTime'] = substr($datetimes,30,5);
			$date['startDate'] = $this->input->post('datepicker'); //substr
			$date['startTime'] = $this->input->post('datetimepicker');
			$date['endDate'] = $this->input->post('datepicker2');
			$date['endTime'] = $this->input->post('datetimepicker2');
			$date['startDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['startDate']))); // change 31/12/2000 to 2000-12-31
			$date['endDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['endDate'])));
			$arrayData = array(
				'car_id' => $this->input->post('car_id'),
				'user_rental_id' => $_SESSION['id'],
				'user_doc_id' => $docId,
				'place_id' => $this->input->post('place_id'),
				'transaction_receive_date' => $date['startDate'].' '.$date['startTime'],
				'transaction_return_date' => $date['endDate'].' '.$date['endTime'],
				'transaction_status' => '1',
				'transaction_price' => (int)str_replace(',', '', $this->input->post('rentTotal')),
				'transaction_rental_approve' => '1',
				'transaction_image' => $filename['transaction_upload'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$addedId = $this->crsModel->add('crs_transaction', $arrayData);
				//start blockchain
			$link = "http://127.0.0.1:5000/mining?"
				.'car_id='.$this->input->post('car_id')
				.'&car_registration='.urlencode($this->input->post('car_registration'))
				.'&transaction_id='.$addedId
				.'&user_rental_id='.$_SESSION['id']
				.'&user_doc_id='.$docId
				.'&place_id='.$this->input->post('place_id')
				.'&place_name='.urlencode($this->input->post('place_name'))
				.'&transaction_receive_date='.$date['startDate'].'_'.$date['startTime']
				.'&transaction_return_date='.$date['endDate'].'_'.$date['endTime']
				.'&transaction_status='.'1'
				.'&transaction_price='.(int)str_replace(',', '', $this->input->post('rentTotal'))
				.'&transaction_rental_approve='.'1'
				.'&transaction_image='.$filename['transaction_upload']
				.'&user_create_id='.$_SESSION['id']
				.'&user_update_id='.$_SESSION['id']
			;
			$data = file_get_contents($link);
				//end blockchain
			// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}
	// __________________ End addCarRent __________________

	// __________________ Start addCarRent __________________
	public function addCarRent()
	{
		$config['upload_path'] = './img/user_doc_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
	
		$pass = TRUE;

		// UPLOAD DOC

		$getData = $this->input->post();
		$this->load->library('upload', $config, 'docUpload');
		if($this->input->post('user_doc_id') == 0){
			//add doc
			if(!$this->docUpload->do_upload('iden_upload') ){
				$pass = FALSE;
			}else{
				$data = $this->docUpload->data();
				$filename['iden_upload'] = $data['file_name'];
			}
			if(!$this->docUpload->do_upload('license_upload') ){
				$pass = FALSE;
			}else{
				$data = $this->docUpload->data();
				$filename['license_upload'] = $data['file_name'];
			}
			$arrayData = array(
				'user_id' => $_SESSION['id'],
				'user_doc_iden_image' => $filename['iden_upload'],
				'user_doc_license_image' => $filename['license_upload'],
				'user_create_id' => $_SESSION['id'],
				'user_update_id' => $_SESSION['id']
			);
			$docId = $this->crsModel->add('crs_user_doc', $arrayData);
		}else{
			// update doc
			if(!$this->docUpload->do_upload('iden_upload') ){
				$filename['iden_upload'] = $getData['old_iden_upload'];
			}else{
				$data = $this->docUpload->data();
				$filename['iden_upload'] = $data['file_name'];
				$file_pointer = './img/user_doc_img/' . $getData['old_iden_upload'];
				unlink($file_pointer);
			}
			if(!$this->docUpload->do_upload('license_upload') ){
				$filename['license_upload'] = $getData['old_license_upload'];
			}else{
				$data = $this->docUpload->data();
				$filename['license_upload'] = $data['file_name'];
				$file_pointer = './img/user_doc_img/' . $getData['old_license_upload'];
				unlink($file_pointer);
			}
			$arrayData = array(
				'user_doc_iden_image' => $filename['iden_upload'],
				'user_doc_license_image' => $filename['license_upload'],
				'user_update_id' => $_SESSION['id']
			);
			$arrayWhere = array('user_doc_id' => $getData['user_doc_id']);
			$docId = $getData['user_doc_id'];
			$this->crsModel->update('crs_user_doc',$arrayWhere, $arrayData);
		}

		$config['upload_path'] = './img/transaction_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
		$this->load->library('upload', $config, 'transactionUpload');
		if(!$this->transactionUpload->do_upload('transaction_upload')){
			$pass = FALSE;
		}else{
			$data = $this->transactionUpload->data();
			$filename['transaction_upload'] = $data['file_name'];
		}
		if($pass){
			$date['startDate'] = $this->input->post('datepicker'); //substr
			$date['startTime'] = $this->input->post('datetimepicker');
			$date['endDate'] = $this->input->post('datepicker2');
			$date['endTime'] = $this->input->post('datetimepicker2');
			$date['startDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['startDate']))); // change 31/12/2000 to 2000-12-31
			$date['endDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['endDate'])));
			$arrayData = array(
				'transaction_lessor_token' => uniqid(),
				'transaction_rental_token' => uniqid(),
				'transaction_depositor_token' => uniqid(),
				'transaction_lessor_approve' => 0,
				'transaction_rental_approve' => 0,
				'car_id' => $this->input->post('car_id'),
				'user_rental_id' => $_SESSION['id'],
				'user_doc_id' => $docId,
				'place_id' => $this->input->post('place_id'),
				'transaction_receive_date' => $date['startDate'].' '.$date['startTime'],
				'transaction_return_date' => $date['endDate'].' '.$date['endTime'],
				'transaction_status' => '1',
				'transaction_price' => (int)str_replace(',', '', $this->input->post('rentTotal')),
				'transaction_image' => $filename['transaction_upload']
			);
			if($this->input->post('user_type_id') == 3){
				$arrayData['transaction_depositor_approve'] = 0;
			}//ถ้าเป็นรถฝากเช่า

			$returnData['transaction_temp_id'] = $this->crsModel->add('crs_transaction_temp', $arrayData);
				//start blockchain
			// $link = "http://127.0.0.1:5000/mining?"
			// 	.'car_id='.$this->input->post('car_id')
			// 	.'&car_registration='.urlencode($this->input->post('car_registration'))
			// 	.'&transaction_id='.$returnData['addedId']
			// 	.'&user_rental_id='.$_SESSION['id']
			// 	.'&user_doc_id='.$docId
			// 	.'&place_id='.$this->input->post('place_id')
			// 	.'&place_name='.urlencode($this->input->post('place_name'))
				// .'&transaction_receive_date='.$date['startDate'].'_'.$date['startTime']
			// 	.'&transaction_return_date='.$date['endDate'].'_'.$date['endTime']
			// 	.'&transaction_status='.'1'
			// 	.'&transaction_price='.(int)str_replace(',', '', $this->input->post('rentTotal'))
			// 	.'&transaction_rental_approve='.'1'
			// 	.'&transaction_image='.$filename['transaction_upload']
			// 	.'&user_create_id='.$_SESSION['id']
			// 	.'&user_update_id='.$_SESSION['id']
			// ;
			// $data = file_get_contents($link);
				//end blockchain
			$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
		}
	}
	// __________________ End addCarRent __________________

	// __________________ Start sendEmail __________________
	public function sendEmail()
	{
		$arrayData = array(
			'tableName' => 'crs_transaction_temp',
			'colName' => '
				crs_transaction_temp.transaction_temp_id,
				crs_transaction_temp.transaction_lessor_token,
				crs_transaction_temp.transaction_rental_token,
				crs_transaction_temp.transaction_depositor_token,
				crs_transaction_temp.transaction_receive_date,
				crs_transaction_temp.transaction_return_date,
				crs_transaction_temp.transaction_price,
				crs_transaction_temp.transaction_image,
				crs_transaction_temp.transaction_status,
				crs_car.car_registration,
				crs_car.car_price,
				crs_car.car_image,
				crs_car_brand.car_brand_name_en,
				crs_car_model.car_model_name,
				crs_user_doc.user_doc_id,
				crs_user_doc.user_doc_iden_image,
				crs_user_doc.user_doc_license_image,
				crs_user.user_email,
				crs_user.user_fname,
				crs_user.user_lname,
				crs_user.user_phone,
				crs_place.place_name',
			'where' => 'crs_transaction_temp.transaction_temp_id = '. $this->input->post("tran_id"),
			'order' => '',
			'arrayJoinTable' => array(
				'crs_car' => 'crs_car.car_id = crs_transaction_temp.car_id',
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id',
				'crs_user_doc' => 'crs_user_doc.user_doc_id = crs_transaction_temp.user_doc_id',
				'crs_user' => 'crs_user.user_id = crs_transaction_temp.user_rental_id',
				'crs_place' => 'crs_place.place_id = crs_transaction_temp.place_id'
			),
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$data['user_type'] = $this->input->post("user_type");
		$arrayData = array('pathView' => 'phpMailer/sendEmail');
		$this->load->view($arrayData['pathView'], $data, TRUE);
	}
	// ___________________ End sendEmail ____________________

	// __________________ Start carDeposit __________________
	public function carDeposit()
	{
		$arrayData = array(
			'tableName' => 'crs_car_brand',
			'colName' => '
				car_brand_id,
				car_brand_name_en
				',
			'where' => '',
			'order' => 'car_brand_id ASC',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['page_content'] = $this->load->view('car/carDeposit', $data, TRUE);

		$this->load->view('main', $data);
	}
	// ___________________ End carDeposit ____________________

	// __________________ Start addCarDeposit __________________
	public function addCarDeposit(){

		$config['upload_path'] = './img/car_deposit_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
	
		$this->load->library('upload', $config, 'depositImg');

		if(!$this->depositImg->do_upload('license_upload')){
			echo $this->depositImg->display_errors();
		}else{
			$data = $this->depositImg->data();
			$filenamelicense = $data['file_name'];
		}

		$config['upload_path'] = './img/car_img/';
		$this->load->library('upload', $config, 'carImg');

		if(!$this->carImg->do_upload('car_deposit_upload')){
			echo $this->carImg->display_errors();
		}else{
			$data = $this->carImg->data();
			$filenameCar = $data['file_name'];
		}
		$arrayData = array(
			'car_registration' => $this->input->post('car_registration'),
			'car_model_id' => $this->input->post('car_model_id'),
			'car_owner_id' => $_SESSION['id'],
			'car_price' => $this->input->post('car_price'),
			'car_status' => 7,
			'car_image' => $filenameCar,
			'car_proof_image' => $filenamelicense,
			'user_create_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		print_r($arrayData);
		$addedId = $this->crsModel->add('crs_car', $arrayData);
	}
	// ___________________ End addCarDeposit ____________________

	// __________________ Start carDepositReport __________________
	public function carDepositReport()
	{
		$data['page_content'] = $this->load->view('car/carDepositReport', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End carDepositReport ____________________

	// __________________ Start getCarDepositRecordTable __________________
	public function getCarDepositRecordTable()
	{
		$arrayData = array(
			'tableName' => 'crs_car',
			'colName' => '
							crs_car.car_id,
							crs_car.car_registration,
							crs_car_brand.car_brand_name_en AS car_brand_name_en,
							crs_car.car_price,
							crs_car.car_status',
			'where' => 'crs_car.car_owner_id = '. $_SESSION['id'],
			'order' => '',
			'arrayJoinTable' => array(
									'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
									'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'),
			'groupBy' => '',
			'pathView' => 'car/tableCarDeposit'
		);
		
		// if ($_SESSION['type'] == '2') {
		// 	$arrayData['where'] = "crs_transaction.user_rental_id = ".$_SESSION['id'];
		// 	// $data['table'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_user_tran?user_rental_id=".$_SESSION['id']));
		// }else{
		// 	// $data['table'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_chain_lessor"));
		// }

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getCarDepositRecordTable ____________________

	// __________________ Start carDetail2 __________________
	public function carDetail2()
	{
		$arrayData = array(
			'tableName' => 'crs_car',
			'colName' => '
							crs_car.car_id,
							crs_car.car_registration,
							crs_car_brand.car_brand_name_en AS car_brand_name_en,
							crs_car.car_price,
							crs_car.car_status,
							crs_car.car_image,
							crs_car.car_proof_image,
							crs_user.user_id,
							crs_user.user_email,
							crs_user.user_fname,
							crs_user.user_lname,
							crs_user.user_phone,
							crs_user.user_image,
							crs_car_model.car_model_name AS car_model_name',
			'where' => 'crs_car.car_id = '. $_GET['carId'],
			'order' => '',
			'arrayJoinTable' => array(
									'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
									'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id',
									'crs_user' => 'crs_user.user_id = crs_car.car_owner_id'),
			'groupBy' => '',
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		if ($_SESSION['type'] == '1') {
			$data['page_content'] = $this->load->view('car/carDepositConfirm', $data, TRUE);
		}
		if ($_SESSION['type'] == '2') {
			$data['page_content'] = $this->load->view('car/carDepositEdit', $data, TRUE);
		}
		

		$this->load->view('main', $data);
	}
	// ___________________ End carDetail2 ____________________
}
