<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

class Transaction extends Main
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	// __________________ Start Transaction __________________
	public function transaction()
	{
		$data['page_content'] = $this->load->view('transaction/transactionTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Transaction ____________________

	// __________________ Start transactionRecord __________________
	public function transactionRecord()
	{
		$data['page_content'] = $this->load->view('transaction/transactionRecord', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End transactionRecord ____________________

	// __________________ Start transactionUser __________________
	public function transactionUser()
	{

		$arrayData = array(
			'tableName' => 'crs_user',
			'colName' => '
				user_id,
				user_fname,
				user_lname',
			'where' => 'user_id = '.$_GET['userId'],
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$user['user'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$data['page_content'] = $this->load->view('transaction/transactionUser', $user, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End transactionUser ____________________

	// __________________ Start getTransactionTable __________________
	public function getTransactionTable()
	{
		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
			crs_transaction.transaction_id,
			crs_transaction.transaction_receive_date,
			crs_transaction.transaction_return_date,
			crs_transaction.transaction_status,
			crs_place.place_name,
			crs_car.car_registration,
			crs_user.user_type_id',
			'where' => 'crs_transaction.transaction_status < 5 OR crs_transaction.transaction_status = 6',
			'order' => 'crs_transaction.update_date DESC',
			'arrayJoinTable' => array('crs_car' => 'crs_car.car_id = crs_transaction.car_id',
								'crs_place' => 'crs_place.place_id = crs_transaction.place_id',
								'crs_user' => 'crs_user.user_id = crs_car.car_owner_id'),
			'groupBy' => '',
			'pathView' => 'transaction/tableTransaction'
		);

		// if ($_SESSION['type'] == '1') {
		// 	$arrayData['where'] = 'crs_transaction.user_lessor_id = '.$_SESSION['id'];
		// }
		if ($_SESSION['type'] == '2' || $_SESSION['type'] == '3') {
			$arrayData['where'] = 'crs_transaction.user_rental_id = '.$_SESSION['id'];
		}
		
		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		// $data['table'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_chain_lessor"));
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getTransactionTable ____________________

	// __________________ Start getTransactionRecordTable __________________
	public function getTransactionRecordTable()
	{
		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
			crs_transaction.transaction_id,
			crs_transaction.transaction_receive_date,
			crs_transaction.transaction_return_date,
			crs_transaction.transaction_status,
			crs_place.place_name,
			crs_car.car_registration,
			crs_user.user_type_id',
			'where' => 'crs_transaction.transaction_status <= 5',
			'order' => 'crs_transaction.update_date DESC',
			'arrayJoinTable' => array('crs_car' => 'crs_car.car_id = crs_transaction.car_id',
								'crs_place' => 'crs_place.place_id = crs_transaction.place_id',
								'crs_user' => 'crs_user.user_id = crs_car.car_owner_id'),
			'groupBy' => '',
			'pathView' => 'transaction/tableTransaction'
		);
		
		if ($_SESSION['type'] == '2' || $_SESSION['type'] == '3') {
			$arrayData['where'] = "crs_transaction.user_rental_id = ".$_SESSION['id'];
			// $data['table'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_user_tran?user_rental_id=".$_SESSION['id']));
		}else{
			// $data['table'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_chain_lessor"));
		}

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getTransactionRecordTable ____________________

	// __________________ Start getTransactionUserTable __________________
	public function getTransactionUserTable()
	{
		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
			crs_transaction.transaction_id,
			crs_transaction.transaction_receive_date,
			crs_transaction.transaction_return_date,
			crs_transaction.transaction_status,
			crs_place.place_name,
			crs_car.car_registration,
			crs_user.user_type_id',
			'where' => 'crs_transaction.transaction_status <= 5 AND crs_transaction.user_rental_id = '.$this->input->post('user_id'),
			'order' => 'crs_transaction.update_date DESC',
			'arrayJoinTable' => array('crs_car' => 'crs_car.car_id = crs_transaction.car_id',
								'crs_place' => 'crs_place.place_id = crs_transaction.place_id',
								'crs_user' => 'crs_user.user_id = crs_car.car_owner_id'),
			'groupBy' => '',
			'pathView' => 'transaction/tableTransaction'
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		
		// $data['table'] = json_decode(file_get_contents("http://127.0.0.1:5000/get_user_tran?user_rental_id=".$_SESSION['id']));

		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getTransactionUserTable ____________________
	
	// __________________ Start transactionDetail __________________
	public function transactionDetail()
	{
		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
				crs_transaction.transaction_id ,
				crs_transaction.transaction_receive_date,
				crs_transaction.transaction_return_date,
				crs_transaction.transaction_price,
				crs_transaction.transaction_image,
				crs_transaction.transaction_iden_approve,
				crs_transaction.transaction_transfer_approve,
				crs_transaction.transaction_reject_iden,
				crs_transaction.transaction_reject_transfer,
				crs_transaction.transaction_status,
				crs_car.car_id,
				crs_car.car_registration,
				crs_car.car_price,
				crs_car.car_image,
				crs_car_brand.car_brand_name_en,
				crs_car_model.car_model_name,
				crs_user_doc.user_doc_id,
				crs_user_doc.user_doc_iden_image,
				crs_user_doc.user_doc_license_image,
				crs_user.user_id,
				crs_user.user_email,
				crs_user.user_fname,
				crs_user.user_lname,
				crs_user.user_phone,
				crs_user.user_image,
				crs_place.place_id,
				crs_place.place_name',
			'where' => 'crs_transaction.transaction_id = '. $_GET['tranId'],
			'order' => '',
			'arrayJoinTable' => array(
				'crs_car' => 'crs_car.car_id = crs_transaction.car_id',
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id',
				'crs_user_doc' => 'crs_user_doc.user_doc_id = crs_transaction.user_doc_id',
				'crs_user' => 'crs_user.user_id = crs_transaction.user_rental_id',
				'crs_place' => 'crs_place.place_id = crs_transaction.place_id'
			),
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		$arrayData = array(
			'tableName' => 'crs_car',
			'colName' => '
				crs_car.car_id,
				crs_user.user_type_id',
			'where' => 'crs_car.car_id = '. $data['select'][0]->car_id,
			'order' => '',
			'arrayJoinTable' => array(
				'crs_user' => 'crs_user.user_id = crs_car.car_owner_id'
			),
			'groupBy' => ''
		);
		$data['user_type'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		if ($_SESSION['type'] == '1') {
			$data['page_content'] = $this->load->view('transaction/transactionConfirm', $data, TRUE);
		}
		if ($_SESSION['type'] == '2' || $_SESSION['type'] == '3') {
			$data['page_content'] = $this->load->view('transaction/transactionEdit', $data, TRUE);
		}

		$this->load->view('main', $data);
	}
	// ___________________ End transactionDetail ____________________

	// __________________ Start editTransactionDetail __________________
	public function editTransactionDetail()
	{
		$getData = $this->input->post();

		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
				car_id,
				user_doc_id,
				user_rental_id,
				place_id,
				transaction_id,
				transaction_receive_date,
				transaction_return_date,
				transaction_price,
				transaction_image',
			'where' => 
				array(
					'transaction_id' => $getData['transaction_id']
				),
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$result = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		
		$arrayData = array(
			'transaction_lessor_token' => uniqid(),
			'transaction_rental_token' => uniqid(),
			'transaction_depositor_token' => uniqid(),
			'transaction_reject_iden' => $getData['transaction_reject_iden'],
			'transaction_iden_approve' => $getData['reject_iden'],
			'transaction_reject_transfer' => $getData['transaction_reject_transfer'],
			'transaction_transfer_approve' => $getData['reject_tran'],
			'user_lessor_id' => $_SESSION['id'],
			'transaction_lessor_approve' => 0,
			'transaction_rental_approve' => 0,
			'transaction_id' => $result[0]->transaction_id,
			'car_id' => $result[0]->car_id,
			'user_doc_id' => $result[0]->user_doc_id,
			'user_rental_id' => $result[0]->user_rental_id,
			'place_id' => $result[0]->place_id,
			'transaction_receive_date' => $result[0]->transaction_return_date,
			'transaction_return_date' => $result[0]->transaction_return_date,
			'transaction_price' => $result[0]->transaction_price,
			'transaction_image' => $result[0]->transaction_image
		);
		if($getData['user_type_id'] == 3){
			$arrayData['transaction_depositor_approve'] = 0;
		}//ถ้าเป็นรถฝากเช่า

		if($getData['reject_iden'] == 1 && $getData['reject_tran'] == 1 ){
			$arrayData['transaction_status'] = 3;//รอรับรถเช่า
		}else{
			$arrayData['transaction_status'] = 2;//เอกสารถูกปฏิเสธ
		}

		$returnData['transaction_temp_id'] = $this->crsModel->add('crs_transaction_temp', $arrayData);
		
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
	}
	// ___________________ End editTransactionDetail ____________________

	// __________________ Start editTransactionApprove __________________
	public function editTransactionApprove()
	{
		$config['upload_path'] = './img/user_doc_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';

		$pass = TRUE;

		$getData = $this->input->post();
		
		$this->load->library('upload', $config, 'docUpload');
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
		$this->crsModel->update('crs_user_doc',$arrayWhere, $arrayData);


		$config['upload_path'] = './img/transaction_img/';
		$this->load->library('upload', $config, 'transactionUpload');
		if(!$this->transactionUpload->do_upload('transaction_upload')){
			$filename['transaction_upload'] = $getData['old_tran_upload'];
		}else{
			$data = $this->transactionUpload->data();
			$filename['transaction_upload'] = $data['file_name'];
			$file_pointer = './img/transaction_img/' . $getData['old_tran_upload'];
			unlink($file_pointer);
		}

		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
				car_id,
				user_doc_id,
				user_rental_id,
				user_lessor_id,
				place_id,
				transaction_id,
				transaction_receive_date,
				transaction_return_date,
				transaction_price,
				transaction_reject_iden,
				transaction_iden_approve,
				transaction_reject_transfer,
				transaction_transfer_approve',
			'where' => 
				array(
					'transaction_id' => $getData['transaction_id']
				),
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$result = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$arrayData = array(
			'transaction_id' => $result[0]->transaction_id,
			'transaction_lessor_token' => uniqid(),
			'transaction_rental_token' => uniqid(),
			'transaction_depositor_token' => uniqid(),
			'transaction_lessor_approve' => 0,
			'transaction_rental_approve' => 0,
			'car_id' => $result[0]->car_id,
			'user_rental_id' => $result[0]->user_rental_id,
			'user_lessor_id' => $result[0]->user_lessor_id,
			'user_doc_id' => $result[0]->user_doc_id,
			'place_id' => $result[0]->place_id,
			'transaction_reject_iden' => $result[0]->transaction_reject_iden,
			'transaction_iden_approve' => $result[0]->transaction_iden_approve,
			'transaction_reject_transfer' => $result[0]->transaction_reject_transfer,
			'transaction_transfer_approve' => $result[0]->transaction_transfer_approve,
			'transaction_receive_date' => $result[0]->transaction_receive_date,
			'transaction_return_date' => $result[0]->transaction_return_date,
			'transaction_status' => 6,
			'transaction_price' => $result[0]->transaction_price,
			'transaction_image' => $filename['transaction_upload']
		);
		if($getData['user_type_id'] == 3){
			$arrayData['transaction_depositor_approve'] = 0;
		}//ถ้าเป็นรถฝากเช่า

		$returnData['transaction_temp_id'] = $this->crsModel->add('crs_transaction_temp', $arrayData);

		$arrayData = array(
			'transaction_image' => $filename['transaction_upload']
		);
		$arrayWhere = array('transaction_id' => $result[0]->transaction_id);
		$this->crsModel->update('crs_transaction',$arrayWhere, $arrayData);
		
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));

	}
	// ___________________ End editTransactionApprove ____________________

	// __________________ Start changeTransactionStatus __________________
	public function changeTransactionStatus()
	{
		$getData = $this->input->post();

		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
				car_id,
				user_doc_id,
				user_rental_id,
				user_lessor_id,
				place_id,
				transaction_id,
				transaction_receive_date,
				transaction_return_date,
				transaction_price,
				transaction_reject_iden,
				transaction_iden_approve,
				transaction_reject_transfer,
				transaction_transfer_approve,
				transaction_image',
			'where' => 
				array(
					'transaction_id' => $getData['transaction_id']
				),
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		$result = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$arrayData = array(
			'transaction_id' => $result[0]->transaction_id,
			'transaction_lessor_token' => uniqid(),
			'transaction_rental_token' => uniqid(),
			'transaction_depositor_token' => uniqid(),
			'transaction_lessor_approve' => 0,
			'transaction_rental_approve' => 0,
			'car_id' => $result[0]->car_id,
			'user_rental_id' => $result[0]->user_rental_id,
			'user_lessor_id' => $result[0]->user_lessor_id,
			'user_doc_id' => $result[0]->user_doc_id,
			'place_id' => $result[0]->place_id,
			'transaction_reject_iden' => $result[0]->transaction_reject_iden,
			'transaction_iden_approve' => $result[0]->transaction_iden_approve,
			'transaction_reject_transfer' => $result[0]->transaction_reject_transfer,
			'transaction_transfer_approve' => $result[0]->transaction_transfer_approve,
			'transaction_receive_date' => $result[0]->transaction_receive_date,
			'transaction_return_date' => $result[0]->transaction_return_date,
			'transaction_status' => $getData['transaction_status'],
			'transaction_price' => $result[0]->transaction_price,
			'transaction_image' => $result[0]->transaction_image
		);
		if($getData['user_type_id'] == 3){
			$arrayData['transaction_depositor_approve'] = 0;
		}//ถ้าเป็นรถฝากเช่า

		$returnData['transaction_temp_id'] = $this->crsModel->add('crs_transaction_temp', $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
	}
	// ___________________ End changeTransactionStatus ____________________

	// __________________ Start checkTransactionDate __________________
	public function checkTransactionDate()
	{
		$getData = $this->input->post();

		$arrayData = array(
			'tableName' => 'crs_transaction',
			'colName' => '
			transaction_id,
			transaction_receive_date,
			transaction_return_date,
			transaction_status,
			car_id',
			'where' => "transaction_status < 5 AND car_id = ".$getData['car_id'],
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);

		$result = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$date['startDate'] = substr($getData['dateRange'],0,10); //substr
		$date['startTime'] = substr($getData['dateRange'],11,5);
		$date['endDate'] = substr($getData['dateRange'],19,10);
		$date['endTime'] = substr($getData['dateRange'],30,5);
		$date['startDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['startDate']))); // change 31/12/2000 to 2000-12-31
		$date['endDate'] = date("Y-m-d", strtotime(str_replace('/', '-', $date['endDate'])));
		$pass = true;
		if($result){
			foreach($result as $key => $val){
				$startDate = substr($val->transaction_receive_date,0,10);
				$endDate = substr($val->transaction_return_date,0,10);
				if ((
						($date['startDate'] >= $startDate) && ($date['startDate'] <= $endDate)) //if start between 
					|| (($date['endDate'] >= $startDate) && ($date['endDate'] <= $endDate)) //if start between 
					|| (($date['startDate'] <= $startDate) && ($date['endDate'] >= $endDate))){ //if range between 
					// echo "is between";
					$pass = false;
					break;
				}
			}
			//if have 
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($pass));
	}
	// ___________________ End checkTransactionDate ____________________

	// __________________ Start emailConfirm __________________
	public function emailConfirm()
	{
		
		$this->crsModel->deleteOldEmail();
		$arrayData = array(
			'tableName' => 'crs_transaction_temp',
			'colName' => '',
			'where' => 
				array(
					'transaction_temp_id' => $_GET['temp']
				),
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => ''
		);
		if($_GET['usertype']==1){
			$arrayData['where']['transaction_lessor_token'] = $_GET['token'];
			$updateData["transaction_lessor_approve"] = 1;
		}else if($_GET['usertype']==2){
			$arrayData['where']['transaction_rental_token'] = $_GET['token'];
			$updateData["transaction_rental_approve"] = 1;
		}else if($_GET['usertype']==3){
			$arrayData['where']['transaction_depositor_token'] = $_GET['token'];
			$updateData["transaction_depositor_approve"] = 1;
		}
		
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		if($data['select']){

			$arrayWhere = array('transaction_temp_id' => $_GET['temp']);
			$this->crsModel->update('crs_transaction_temp',$arrayWhere, $updateData);
			
			$arrayData = array(
				'tableName' => 'crs_transaction_temp',
				'colName' => '',
				'where' => 
					array(
						'transaction_temp_id' => $_GET['temp']
					),
				'order' => '',
				'arrayJoinTable' => '',
				'groupBy' => ''
			);
			$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
			if($data['select']){
				$val = $data['select'][0];
			}

			if($val->transaction_lessor_approve == 1 && $val->transaction_rental_approve == 1 && ($val->transaction_depositor_approve == 1 || $val->transaction_depositor_approve == NULL )){
				
				$arrayDelete = array(
					'tableName' => 'crs_transaction_temp',
					'columnIdName' => 'transaction_temp_id',
					'id' => $_GET['temp']
				);
				
				if($_GET['type'] == 'rent' && $val->transaction_status == 1){//ยืนยันการจอง

						$this->crsModel->delete($arrayDelete['tableName'], $arrayDelete['columnIdName'], $arrayDelete['id']);
		
						$arrayData = array(
							'tableName' => 'crs_transaction',
							'colName' => 'MAX(transaction_id) AS transaction_id',
							'where' =>'',
							'order' => '',
							'arrayJoinTable' => '',
							'groupBy' => ''
						);
						$data['max_tran'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
	
						$link = "http://127.0.0.1:5000/mining?"
							.'car_id='.$val->car_id
							.'&transaction_id='.$data['max_tran'][0]->transaction_id+1
							.'&user_rental_id='.$val->user_rental_id
							.'&user_doc_id='.$val->user_doc_id
							.'&place_id='.$val->place_id
							.'&transaction_receive_date='.substr($val->transaction_receive_date,0,10).'_'.substr($val->transaction_receive_date,11,5)
							.'&transaction_return_date='.substr($val->transaction_return_date,0,10).'_'.substr($val->transaction_return_date,11,5)
							.'&transaction_status='.$val->transaction_status
							.'&transaction_price='.$val->transaction_price
							.'&transaction_image='.$val->transaction_image
						;
						file_get_contents($link);
			
						$arrayData = array(
							'car_id' => $val->car_id,
							'user_rental_id' => $val->user_rental_id,
							'user_doc_id' => $val->user_doc_id,
							'place_id' => $val->place_id,
							'transaction_receive_date' => $val->transaction_receive_date,
							'transaction_return_date' => $val->transaction_return_date,
							'transaction_status' => $val->transaction_status,
							'transaction_price' => $val->transaction_price,
							'transaction_rental_approve' => $val->transaction_rental_approve,
							'transaction_image' => $val->transaction_image,
							'user_create_id' => $val->user_rental_id,
							'user_update_id' => $val->user_rental_id
						);
						$this->crsModel->add('crs_transaction', $arrayData);
				}else if(($_GET['type'] == 'reject' && $val->transaction_status == 2)||($_GET['type'] == 'confirm' && $val->transaction_status == 3)){
					
					$this->crsModel->delete($arrayDelete['tableName'], $arrayDelete['columnIdName'], $arrayDelete['id']);

					// start blockchain
					$link = "http://127.0.0.1:5000/mining_transaction?"
					."transaction_id=".$val->transaction_id
					.'&transaction_iden_approve='.$val->transaction_iden_approve
					.'&transaction_transfer_approve='.$val->transaction_transfer_approve
					.'&transaction_status='.$val->transaction_status
					.'&transaction_lessor_approve='.$val->transaction_lessor_approve
					.'&user_lessor_id='.$val->user_lessor_id
					;
					file_get_contents($link);
					// end blockchain
		
					$arrayData = array(
						'transaction_iden_approve' => $val->transaction_iden_approve,
						'transaction_transfer_approve' => $val->transaction_transfer_approve,
						'transaction_reject_iden' => $val->transaction_reject_iden,
						'transaction_reject_transfer' => $val->transaction_reject_transfer,
						'transaction_status' => $val->transaction_status,
						'transaction_lessor_approve' => $val->transaction_lessor_approve,
						'user_lessor_id' => $val->user_lessor_id
					);
					$arrayWhere = array('transaction_id' => $val->transaction_id);
					$this->crsModel->update('crs_transaction',$arrayWhere, $arrayData);
				}else if($_GET['type'] == 'edit' && $val->transaction_status == 6){
					$this->crsModel->delete($arrayDelete['tableName'], $arrayDelete['columnIdName'], $arrayDelete['id']);

					// start blockchain
					$link = "http://127.0.0.1:5000/mining_transaction?"
					."transaction_id=".$val->transaction_id
					.'&transaction_status='.$val->transaction_status
					.'&transaction_image='.$val->transaction_image
					;
					file_get_contents($link);
					// end blockchain
		
					$arrayData = array(
						'transaction_status' => $val->transaction_status,
						'transaction_image' => $val->transaction_image
					);
					$arrayWhere = array('transaction_id' => $val->transaction_id);
					$this->crsModel->update('crs_transaction',$arrayWhere, $arrayData);
				}else if(($_GET['type'] == 'receive' && $val->transaction_status == 4) || ($_GET['type'] == 'return' && $val->transaction_status == 5)){
					$this->crsModel->delete($arrayDelete['tableName'], $arrayDelete['columnIdName'], $arrayDelete['id']);

					// start blockchain
					$link = "http://127.0.0.1:5000/mining_transaction?"
					."transaction_id=".$val->transaction_id
					.'&transaction_status='.$val->transaction_status
					;
					file_get_contents($link);
					// end blockchain
		
					$arrayData = array(
						'transaction_status' => $val->transaction_status
					);
					$arrayWhere = array('transaction_id' => $val->transaction_id);
					$this->crsModel->update('crs_transaction',$arrayWhere, $arrayData);
				}
			}
		}

		$data['page_content'] = $this->load->view('phpMailer/emailConfirm', $data, TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End emailConfirm ____________________

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
				crs_transaction_temp.transaction_iden_approve,
				crs_transaction_temp.transaction_transfer_approve,
				crs_transaction_temp.transaction_reject_iden,
				crs_transaction_temp.transaction_reject_transfer,
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
		

}
