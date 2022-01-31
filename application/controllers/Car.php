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

		$arrayData = array(
			'tableName' => 'crs_car_model',
			'colName' => '
				crs_car_model.car_model_id, 
				crs_car_model.car_model_name,
				crs_car_model.car_brand_id,
				crs_car_brand.car_brand_name_en',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => array('crs_car_brand' => 'crs_car_model.car_brand_id = crs_car_brand.car_brand_id'),
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
			'order' => 'crs_car.create_date DESC',
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
				crs_car.car_price,
				crs_car.car_image,
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
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id'
			),
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		
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
		

		if ($_GET['type'] == 'detail') {
			$data['page_content'] = $this->load->view('car/carDetail', $data, TRUE);
		}
		if ($_GET['type'] == 'rent') {
			$data['page_content'] = $this->load->view('car/carRent', $data, TRUE);
		}

		$this->load->view('main', $data);
	}
	// ___________________ End carDetail ____________________

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
	public function addCarRent()
	{
		$config['upload_path'] = './img/user_doc_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
	
		$pass = TRUE;

		// UPLOAD DOC
		$this->load->library('upload', $config, 'docUpload');
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
		$addedId = $this->crsModel->add('crs_user_doc', $arrayData);
		//END UPLOAD DOC

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
			$datetimes = $this->input->post('datetimes');
			$date['startDate'] = substr($datetimes,0,10); //substr
			$date['startTime'] = substr($datetimes,11,5);
			$date['endDate'] = substr($datetimes,19,10);
			$date['endTime'] = substr($datetimes,30,5);
			$date['startDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['startDate']))); // change 31/12/2000 to 2000-12-31
			$date['endDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['endDate'])));
			$arrayData = array(
				'car_id' => $this->input->post('car_id'),
				'user_rental_id' => $_SESSION['id'],
				'user_doc_id' => $addedId,
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
			$this->output->set_content_type('application/json')->set_output(json_encode($addedId));
		}
	}

	public function addCarRent2(){
		echo (int)str_replace(',', '', $this->input->post('rentTotal'));
	}// for test

}
