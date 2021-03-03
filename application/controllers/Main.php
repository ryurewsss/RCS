<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
        public function index()
        {
                $data = array(
                        'page_content' => $this->load->view('dashboard', '', TRUE),
                        'title_name' => "Team4"
                );
                $this->load->view('main', $data);
        }

        public function getTable()
        {
                $getData = $this->input->post();
                $data['table'] = $this->ieModel->getAll($getData['tableName'], $getData['colName'], $getData['where'], $getData['order'], $getData['arrayJoinTable'], $getData['groupBy']);
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
                if ($tableData['tableName'] == 'scs_stock_transaction_detail' || $tableData['tableName'] == 'scs_bill_detail' || $tableData['tableName'] == 'scs_product_loss_detail') {
                } else {
                        // $arrayData[$getData['createColumn']] = $_SESSION['id'];

                        $arrayData[$getData['createColumn']] = 1;
                }
                $addedId = $this->ieModel->add($tableData['tableName'], $arrayData);
                $this->output->set_content_type('application/json')->set_output(json_encode($addedId));
        }

        public function editData()
        {
                $getData = $this->input->post();

                $tableData = $getData['table'];

                $arrayData = $getData['arrayData'];
 

                $arrayWhere = $getData['arrayWhere'];

                if (isset($getData["updateOnTable"])) {
                        $this->ieModel->updateOnTable($tableData['tableName'], $arrayWhere, $arrayData); //ไว้แก้ข้อมูลแบบ amount = amount - 1
                } else {
                        $this->ieModel->update($tableData['tableName'], $arrayWhere, $arrayData);
                }
                echo json_encode($this->db->last_query());
        }

        public function deleteRow()
        {
                $getData = $this->input->post();
                $this->ieModel->softDelete($getData['tableName'], $getData['columnIdName'], $getData['id'], $getData['columnDeleteStatus'], $getData['updateColumn']);
                $this->output->set_content_type('application/json')->set_output(json_encode($getData));
        }
}
