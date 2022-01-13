<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

class Place extends Main
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	// __________________ Start Place __________________
	public function place()
	{
		$data['page_content'] = $this->load->view('place/placeTable', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End Place ____________________

	// __________________ Start getPlaceTable __________________
	public function getPlaceTable()
	{
		$arrayData = array(
			'tableName' => 'crs_place',
			'colName' => '',
			'where' => '',
			'order' => '',
			'arrayJoinTable' => '',
			'groupBy' => '',
			'pathView' => 'place/tablePlace'
		);

		$data['table'] = $this->crsModel->getAll($arrayData['tableName'], $arrayData['colName'], $arrayData['where'], $arrayData['order'], $arrayData['arrayJoinTable'], $arrayData['groupBy']);
		$json['table'] = $data['table'];
		$json['sql'] = $this->db->last_query(); //for dev
		if ($arrayData['pathView'] != "getData") {
			$json['html'] = $this->load->view($arrayData['pathView'], $data, TRUE);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	// ___________________ End getPlaceTable ____________________

	// __________________ Start addPlace __________________
	public function addPlace()
	{
		
		$getData = $this->input->post();
		$arrayData = array(
			'place_name' => $getData['place_name'],
			'place_address' => $getData['place_address'],
			'user_create_id' => $_SESSION['id'],
			'user_update_id' => $_SESSION['id']
		);
		$addedId = $this->crsModel->add('crs_place', $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($addedId));

	}
	// ___________________ End addPlace ____________________

	// __________________ Start editPlace __________________
	public function editPlace()
	{
		$getData = $this->input->post();

		$arrayData = array(
			'place_name' => $getData['place_name'],
			'place_address' => $getData['place_address'],
			'user_update_id' => $_SESSION['id']
		);
		$arrayWhere = array('place_id' => $getData['place_id']);
		$editedId = $this->crsModel->update('crs_place',$arrayWhere, $arrayData);
		$this->output->set_content_type('application/json')->set_output(json_encode($editedId));
	}
	// ___________________ End editPlace ____________________

	// __________________ Start deletePlace __________________
	public function deletePlace()
	{

		$arrayData = array(
			'tableName' => 'crs_place',
			'columnIdName' => 'place_id',
			'id' => $this->input->post('id')
		);
		$this->crsModel->delete($arrayData['tableName'], $arrayData['columnIdName'], $arrayData['id']);
		$arrayData['sql'] = $this->db->last_query(); //for dev
		// $this->output->set_content_type('application/json')->set_output(json_encode($arrayData));
	}
	// ___________________ End deletePlace ____________________

}
