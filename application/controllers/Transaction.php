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
			'where' => '',
			'order' => '',
			'arrayJoinTable' => array('crs_car' => 'crs_car.car_id = crs_transaction.car_id',
								'crs_place' => 'crs_place.place_id = crs_transaction.place_id'),
			'groupBy' => '',
			'pathView' => 'transaction/tableTransaction'
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		if ($arrayData['pathView'] != "getData") {
			$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		}
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
				crs_car.car_registration,
				crs_car.car_price,
				crs_car_brand.car_brand_name_en,
				crs_car_model.car_model_name,
				crs_user_doc.user_doc_iden_image,
				crs_user_doc.user_doc_license_image,
				crs_user.user_email,
				crs_user.user_fname,
				crs_user.user_phone,
				crs_user.user_image',
			'where' => 'crs_transaction.transaction_id = '. $_GET['tranId'],
			'order' => '',
			'arrayJoinTable' => array(
				'crs_car' => 'crs_car.car_id = crs_transaction.car_id',
				'crs_car_model' => 'crs_car_model.car_model_id = crs_car.car_model_id',
				'crs_car_brand' => 'crs_car_brand.car_brand_id = crs_car_model.car_brand_id',
				'crs_user_doc' => 'crs_user_doc.user_doc_id = crs_transaction.user_doc_id',
				'crs_user' => 'crs_user.user_id = crs_transaction.user_rental_id'
			),
			'groupBy' => ''
		);
		$data['select'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);

		if ($_SESSION['type'] == '1') {
			$data['page_content'] = $this->load->view('transaction/transactionConfirm', $data, TRUE);
		}
		if ($_SESSION['type'] == '2') {
			// $data['page_content'] = $this->load->view('transaction/carRent', $data, TRUE);
		}

		$this->load->view('main', $data);
	}
	// ___________________ End transactionDetail ____________________
}
