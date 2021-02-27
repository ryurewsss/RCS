<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
        public function __construct()
        {
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
}
