<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * CRS System
 *
 * @see       https://github.com/ryurewsss/RCS The Car Rental System project
 * 
 * @author    Sirapop Koonsinchai (ryurewsss) <rewsirapop@gmail.com>
 * @author    Tiwa Singhaphaisarn (Bryantz) <61160059@go.buu.ac.th>
 * 
 * @copyright 2022 Final Project
 * 
 * @license   SOFTWARE ENGINEERING FACULTY OF INFORMATICS, BURAPHA UNIVERSITY
 */
class Main extends CI_Controller
{
        public function index()
        {
                if (!isset($_SESSION['id'])) {
                        $_SESSION['type'] = 0;
                }
                $data = array(
                        'page_content' => $this->load->view('car/carMain', '', TRUE),
                        'title_name' => "CRS"
                );
                $this->load->view('main', $data);
        }

        public function getTable()
        {
                $getData = $this->input->post();
                $data['table'] = $this->crsModel->getAll($getData['tableName'], $getData['colName'], $getData['where'], $getData['order'], $getData['arrayJoinTable'], $getData['groupBy']);
                $json['table'] = $data['table'];
                $json['sql'] = $this->db->last_query(); //for dev
                if ($getData['pathView'] != "getData") {
                        $json['html'] = $this->load->view($getData['pathView'], $data, TRUE);
                }
                $this->output->set_content_type('application/json')->set_output(json_encode($json));
        }

        public function addData()
        {
                $getData = $this->input->post();

                $tableData = $getData['table'];
                $arrayData = $getData['arrayData'];
                if ($tableData['tableName'] == 'crs_car') {
                } else {
                        $arrayData[$getData['createColumn']] = $_SESSION['id'];

                        // $arrayData[$getData['createColumn']] = 1;
                }
                $addedId = $this->crsModel->add($tableData['tableName'], $arrayData);
                $this->output->set_content_type('application/json')->set_output(json_encode($addedId));
        }

        public function editData()
        {
                $getData = $this->input->post();

                $tableData = $getData['table'];

                $arrayData = $getData['arrayData'];

                $arrayWhere = $getData['arrayWhere'];

                $this->crsModel->update($tableData['tableName'], $arrayWhere, $arrayData);

                echo json_encode($this->db->last_query());
        }

        public function deleteRow()
        {
                $getData = $this->input->post();
                $this->crsModel->softDelete($getData['tableName'], $getData['columnIdName'], $getData['id'], $getData['columnDeleteStatus']);
                $getData['sql'] = $this->db->last_query(); //for dev
                $this->output->set_content_type('application/json')->set_output(json_encode($getData));
        }

        // public function validationForm()
        // {
        //         $getData = $this->input->post();

        //         $arrayErr = array(
        //                 'required' => 'กรุณากรอก{field}',
        //                 'is_unique' => 'ไม่สามารถใช้{field}ซ้ำได้'
        //         );

        //         if (isset($getData["ep_firstname"])) {
        //                 if (isset($getData["ep_username"])) {
        //                         $this->form_validation->set_rules('ep_username', 'ชื่อบัญชีผู้ใช้', 'required|is_unique[scs_employee.ep_username]', $arrayErr);
        //                 } //ถ้ามี username คือให้ทำ (Edit ไม่มี)
        //                 $this->form_validation->set_rules('ep_firstname', 'ชื่อ', 'required', $arrayErr);
        //                 $this->form_validation->set_rules('ep_lastname', 'นามสกุล', 'required', $arrayErr);
        //                 if ($this->form_validation->run()) {
        //                         $array = array(
        //                                 'success' => '<div class="alert alert-success">ใส่ข้อมูลถูกต้อง</div>'
        //                         );
        //                 } else {
        //                         $array = array(
        //                                 'error'   => true,
        //                                 'usernameError' => form_error('ep_username'),
        //                                 'fnameError' => form_error('ep_firstname'),
        //                                 'lnameError' => form_error('ep_lastname')
        //                         );
        //                 }
        //         } //setting Employee

        //         echo json_encode($array);
        // }

        // $.ajax({
        //     url: "validationForm",
        //     method: "POST",
        //     // data: $(this).serialize(),
        //     data: formData,
        //     dataType: "json",
        //     beforeSend: function() {
        //         $('#submitAdd').attr('disabled', 'disabled');
        //     },
        //     success: function(data) {
        //         if (data.error) {
        //             if (data.usernameError != '') {
        //                 $('#usernameAddError').html(data.usernameError);
        //             } else {
        //                 $('#usernameAddError').html('');
        //             }
        //             if (data.fnameError != '') {
        //                 $('#fnameAddError').html(data.fnameError);
        //             } else {
        //                 $('#fnameAddError').html('');
        //             }
        //             if (data.lnameError != '') {
        //                 $('#lnameAddError').html(data.lnameError);
        //             } else {
        //                 $('#lnameAddError').html('');
        //             }
        //         }
        //         if (data.success) {
        //             $('#success_message').html(data.success);
        //             $('#usernameAddError').html('');
        //             $('#fnameAddError').html('');
        //             $('#lnameAddError').html('');
        //             var tableData = {};
        //             tableData['tableName'] = 'scs_employee';
        //             //formData อยู่ข้างบน
        //             $.ajax({
        //                 method: "POST",
        //                 url: "addEmployee",
        //                 data: {
        //                     table: tableData,
        //                     arrayData: formData,
        //                 },
        //             }).done(function(returnData) {
        //                 getList();
        //                 $.toast({
        //                     heading: 'สำเร็จ',
        //                     text: 'เพิ่มข้อมูลสำเร็จ',
        //                     position: 'top-right',
        //                     loaderBg: '#ff6849',
        //                     icon: 'success',
        //                     hideAfter: 3500,
        //                     stack: 3
        //                 });
        //                 $('#addEmployee').modal('hide'); //ปิด modal
        //             });
        //             $('#addForm')[0].reset(); //ล้าง ฟอร์ม
        //         } else {
        //             $.toast({
        //                 heading: 'ไม่สำเร็จ',
        //                 text: 'กรุณากรอกข้อมูลให้ถูกต้อง',
        //                 position: 'top-right',
        //                 loaderBg: '#ff6849',
        //                 icon: 'error',
        //                 hideAfter: 3500,
        //                 stack: 3
        //             });
        //         } //validate ผ่าน?
        //         $('#submitAdd').attr('disabled', false);
        //     }
        // })
}
