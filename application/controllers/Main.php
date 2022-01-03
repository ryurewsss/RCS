<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
        public function index()
        {
                if (!isset($_SESSION['id'])) { //if have seesion goto login page
                        redirect('../Login', 'refresh');
                } else {
                        $data = array(
                                'page_content' => $this->load->view('car/carMain', '', TRUE),
                                'title_name' => "CRS"
                        );
                        $this->load->view('main', $data);
                }
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

        public function getChart()
        {
                $getData = $this->input->post();
                $record = $this->ieModel->getAll($getData['tableName'], $getData['colName'], $getData['where'], $getData['order'], $getData['arrayJoinTable'], $getData['groupBy']);
                $json['table'] = $record;
                $data = [];

                foreach ($record as $row) {
                        $data['month'][] = $row->month;
                        $data['incomes'][] = $row->incomes;
                        $data['expends'][] = abs($row->expends);
                }
                $data['chart_data'] = json_encode($data);

                $json['html'] = $this->load->view($getData['pathView'], $data, TRUE);
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
                $addedId = $this->ieModel->add($tableData['tableName'], $arrayData);
                $this->output->set_content_type('application/json')->set_output(json_encode($addedId));
        }

        public function editData()
        {
                $getData = $this->input->post();

                $tableData = $getData['table'];

                $arrayData = $getData['arrayData'];

                $arrayWhere = $getData['arrayWhere'];

                $this->ieModel->update($tableData['tableName'], $arrayWhere, $arrayData);

                echo json_encode($this->db->last_query());
        }

        public function deleteRow()
        {
                $getData = $this->input->post();
                $this->ieModel->softDelete($getData['tableName'], $getData['columnIdName'], $getData['id'], $getData['columnDeleteStatus']);
                $getData['sql'] = $this->db->last_query(); //for dev
                $this->output->set_content_type('application/json')->set_output(json_encode($getData));
        }
}
