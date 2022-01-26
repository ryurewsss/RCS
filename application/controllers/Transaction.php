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
			crs_car.car_registration',
			'where' => 'crs_transaction.transaction_status != 5',
			'order' => '',
			'arrayJoinTable' => array('crs_car' => 'crs_car.car_id = crs_transaction.car_id',
								'crs_place' => 'crs_place.place_id = crs_transaction.place_id'),
			'groupBy' => '',
			'pathView' => 'transaction/tableTransaction'
		);

		// if ($_SESSION['type'] == '1') {
		// 	$arrayData['where'] = 'crs_transaction.user_lessor_id = '.$_SESSION['id'];
		// }
		if ($_SESSION['type'] == '2') {
			$arrayData['where'] = 'crs_transaction.user_rental_id = '.$_SESSION['id'];
		}
		
		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getTransactionTable ____________________

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
				crs_car.car_registration,
				crs_car.car_price,
				crs_car.car_image,
				crs_car_brand.car_brand_name_en,
				crs_car_model.car_model_name,
				crs_user_doc.user_doc_iden_image,
				crs_user_doc.user_doc_license_image,
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

		if ($_SESSION['type'] == '1') {
			$data['page_content'] = $this->load->view('transaction/transactionConfirm', $data, TRUE);
		}
		if ($_SESSION['type'] == '2') {
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
			'transaction_reject_iden' => $getData['transaction_reject_iden'],
			'transaction_iden_approve' => $getData['reject_iden'],
			'transaction_reject_transfer' => $getData['transaction_reject_transfer'],
			'transaction_transfer_approve' => $getData['reject_tran'],
			'user_lessor_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		if($getData['reject_iden'] == 1 && $getData['reject_tran'] == 1 ){
			$arrayData['transaction_status'] = 3;//รอรับรถเช่า
		}else{
			$arrayData['transaction_status'] = 2;//เอกสารถูกปฏิเสธ
		}
		$arrayWhere = array('transaction_id' => $getData['transaction_id']);
		$editedId = $this->crsModel->update('crs_transaction',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editTransactionDetail ____________________

	// __________________ Start editTransactionApprove __________________
	public function editTransactionApprove()
	{
		$config['upload_path'] = './img/car_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';

		$this->load->library('upload', $config);

		$getData = $this->input->post();




		
		$arrayData = array(
			'transaction_reject_iden' => $getData['transaction_reject_iden'],
			'transaction_iden_approve' => $getData['reject_iden'],
			'transaction_reject_transfer' => $getData['transaction_reject_transfer'],
			'transaction_transfer_approve' => $getData['reject_tran'],
			'user_lessor_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		if($getData['reject_iden'] == 1 && $getData['reject_tran'] == 1 ){
			$arrayData['transaction_status'] = 3;//รอรับรถเช่า
		}else{
			$arrayData['transaction_status'] = 2;//เอกสารถูกปฏิเสธ
		}
		$arrayWhere = array('transaction_id' => $getData['transaction_id']);
		$editedId = $this->crsModel->update('crs_transaction',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editTransactionApprove ____________________

	
}
