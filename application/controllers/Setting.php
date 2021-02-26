<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('Main.php');

/*
 * Setting
 * Setting เป็น controller หลักของจัดการตั้งค่า
 * @author Kittichai Anansinchai
 * @Create Date 21-08-2563
 
 * Setting
 * Setting เป็น controller หลักของจัดการตั้งค่า
 * @author Sirapop Koonsinchai
 * @Update Date 22-09-2563
 */
class Setting extends Main
{

	/*
	 * __construct
       * check login
       * @input -
       * @output result of check session
       * @author Sirapop Koonsinchai
       * @Create Date 03-09-2563
       
	 * __construct
       * check login
       * @input -
       * @output result of check session
       * @author Sirapop Koonsinchai
       * @Update Date 22-09-2563
       */
	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * index
       * index
       * @input -
       * @output index
       * @author Kittichai Anansinchai
       * @Create Date 25-08-2563
       */
	public function index()
	{
	}

	// __________________ Start myProfile __________________
	/*
	 * settingProfile
       * load view myProfile
       * @input -
       * @output view myProfile
       * @author Kittichai Anansinchai
       * @Create Date 08-10-2563
       */
	public function settingProfile()
	{
		$data['page_content'] = $this->load->view('setting/settingProfile', '', TRUE);
		$this->load->view('main', $data);
	}
	// ___________________ End myProfile ____________________


	// ____________ Start settingCategoryProduct ____________

	/*
	 * settingCategoryProduct
       * load view settingCategoryProduct
       * @input -
       * @output view settingCategoryProduct
       * @author Kittichai Anansinchai
       * @Create Date 25-08-2563
       */
	public function settingCategoryProduct()
	{
		$data['btn_id'] = '#modalCategory'; //modal name
		$data['btn_title'] = 'เพิ่มข้อมูล';
		$data['page_content'] = $this->load->view('setting/settingCategoryProduct', '', TRUE);
		$this->load->view('main', $data);
	}

	/*
	 * checkCategoryProduct
       * check categoryProduct on db
       * @input name form #category_product_name
       * @output return category id
       * @author Thitipong Phuttacharoenpong
       * @Create Date 07-10-2563
       */
	public function checkCategoryProduct()
	{
		$getData = $this->input->post();
		$returnData = $this->scsModel->getAll('scs_base_category_product', '*', array('category_product_name' => $getData['name']));
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
	}

	/*
	 * deleteCategoryProduct
     * soft delete category that id from del_btn
     * @input id from del_btn
     * @output delete that category on db
     * @author Thitipong Phuttacharoenpong
     * @Create Date 07-10-2563
     */
	public function deleteCategoryProduct()
	{
		$getData = $this->input->post();
		$this->scsModel->softDelete('scs_base_category_product', 'category_Product', $getData['id']);
		$getData['update'] = 'True';
		$this->output->set_content_type('application/json')->set_output(json_encode($getData));
	}

	/*
	 * editCategory
     * edit that categoryProduct on db
     * @input form editmodal
     * @output update categoryProduct on db
     * @author Thitipong Phuttacharoenpong
     * @Update Date 08-10-2563
     */
	public function editCategoryProduct()
	{
		$getData = $this->input->post();
		//  print_r($getData);
		$getData['employee_update_id'] = $_SESSION['id'];
		$this->scsModel->upDate('scs_base_category_product', 'category_product', $getData, $getData['category_product_id']);
	}

	// /*
	//  * editSupplier
	//  * edit that supplier on db
	//  * @input form editmodal
	//  * @output update supplier on db
	//  * @author Tappakon panyang
	//  * @Create Date 07-10-2563
	//  */
	// public function changeStatusCategory()
	// {
	// 	$getData = $this->input->post();
	// 	$this->scsModel->switchStatus('scs_base_category_product', 'category_product', $getData, $getData['category_product_id']);
	// }

	// ____________ End settingCategoryProduct ____________


	// ____________ Start settingSupplierName _____________
	/*
	 * settingSupplierName
       * load view settingSupplierName
       * @input -
       * @output view settingSupplierName
       * @author Kittichai Anansinchai
       * @Create Date 25-08-2563
       
	 * settingSupplierName
       * button addSupplier
       * @input -
       * @output view settingSupplierName
       * @author Tappakon panyang
       * @Create Date 07-10-2563
       */
	public function settingSupplierName()
	{
		$data['btn_id'] = '#addSupplier'; //modal name
		$data['btn_title'] = 'เพิ่มข้อมูล';
		$data['page_content'] = $this->load->view('setting/settingSupplierName', '', TRUE);
		$this->load->view('main', $data);
	}
	// _____________ End settingSupplierName ______________


	// ________________ Start settingNote _________________
	/*
	 * settingNote
      * load view settingNote
      * @input -
      * @output view settingNote
      * @author Kittichai Anansinchai
      * @Create Date 25-08-2563
      */
	public function settingNote()
	{
		$data['btn_id'] = '#addNote'; //modal note id 
		$data['btn_title'] = 'เพิ่มข้อมูล';
		$data['page_content'] = $this->load->view('setting/settingNote', '', TRUE);
		$this->load->view('main', $data);
	}
	// _________________ End settingNote _________________


	// ______________ Start settingEmployee ______________
	/*
	 * settingEmployee
      * load view settingEmployee
      * @input -
      * @output view settingEmployee
      * @author Sirapop Koonsinchai
      * @Update Date 03-09-2563
      */
	public function settingEmployee()
	{
		$data['btn_id'] = '#addEmployee'; //modal employee id 
		$data['btn_title'] = 'เพิ่มข้อมูล';
		$data['page_content'] = $this->load->view('setting/settingEmployee', '', TRUE);
		$this->load->view('main', $data);
	}
	/*
	 * addEmployee
      * add employee to db with input form
      * @input input form
      * @output result of add
      * @author Sirapop Koonsinchai
      * @Update Date 03-09-2563
      */
	public function addEmployee()
	{
		$getData = $this->input->post();
		$tableData = $getData['table'];
		$arryData = $getData['arryData'];

		$arryData['employee_create_id'] = $_SESSION['id'];
		$arryData['employee_update_id'] = $_SESSION['id'];
		$arryData['employee_passwordcode'] = password_hash($arryData['employee_username'], PASSWORD_DEFAULT);



		$this->scsModel->add($tableData['tableName'], $arryData);
	}

	/*
	 * checkEmployee
      * check that employee on db
      * @input id form edit_btn
      * @output return employee that id
      * @author Sirapop Koonsinchai
      * @Update Date 15-09-2563
      *
	 * checkEmployee
      * check that employee on db
      * @input username form #employee_username
      * @output return employee that id
      * @author Sirapop Koonsinchai
      * @Update Date 23-09-2563
      */
	public function checkEmployee()
	{
		$getData = $this->input->post();
		$returnData = $this->scsModel->getAll('scs_employee', '*', array('employee_username' => $getData['username']));
		$this->output->set_content_type('application/json')->set_output(json_encode($returnData));
	}
	// ______________ End settingEmployee ______________

}
