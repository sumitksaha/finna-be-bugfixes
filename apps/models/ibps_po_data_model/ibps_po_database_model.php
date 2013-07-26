<?php

class Ibps_po_database_model extends CI_model {


	function __construct() {
		parent::__construct();
	}


	function get_set_information($table_name,$subject_name,$set_no) {
		try {
		
			$set_information = FALSE;
			$data = array('set_no' => $set_no);
			$query = $this->db->get_where($table_name, $data);
			foreach ($query->result() as $row) {
			    $set_information = $row->$subject_name;
			}
			return $set_information;

		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}


	function get_set_no_of_questions($subject_name,$table_name,$set_no) {
		try {
		
			$set_information = FALSE;
			$data = array('set_no' => $set_no);
			$query = $this->db->get_where($table_name, $data);
			foreach ($query->result() as $row) {
				$no_of_question = $subject_name.'_no_of_question';
			    $set_information = $row->$no_of_question;
			}
			return $set_information;

		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}


	function get_set_total_times($subject_name,$table_name,$set_no) {
		try {
		
			$set_information = FALSE;
			$data = array('set_no' => $set_no);
			$query = $this->db->get_where($table_name, $data);
			foreach ($query->result() as $row) {
				$time = $subject_name.'_time';
			    $set_information = $row->$time;
			}
			return $set_information;

		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}


	function get_each_question($subject_name,$direction_id,$question_id) {
		
		try {
			
			$table_name_1 = 'ibps_po_directions';
			$table_name_2 = 'ibps_po_questions_answers';

			$data = array('subject' => $subject_name, 'group_id' => $direction_id);
			$query = $this->db->get_where($table_name_1,$data);
			foreach ($query->result() as $row) {
				$direction = $row->direction;
				$direction = str_replace('<base_url()>', base_url().'extra/', $direction);
			}

			$data = array('subject' => $subject_name, 'group_id' => $direction_id, 'question_no' => $question_id);
			$query = $this->db->get_where($table_name_2,$data);
			foreach ($query->result() as $row) {
				$question = $row->question;
				$question = str_replace('<base_url()>', base_url().'extra/', $question);
				$option_1 = $row->option_1;
				$option_1 = str_replace('<base_url()>', base_url().'extra/', $option_1);
				$option_2 = $row->option_2;
				$option_2 = str_replace('<base_url()>', base_url().'extra/', $option_2);
				$option_3 = $row->option_3;
				$option_3 = str_replace('<base_url()>', base_url().'extra/', $option_3);
				$option_4 = $row->option_4;
				$option_4 = str_replace('<base_url()>', base_url().'extra/', $option_4);
				$option_5 = $row->option_5;
				$option_5 = str_replace('<base_url()>', base_url().'extra/', $option_5);
				$cr_option = $row->cr_option;
			}
			$this->load->model('question_class/Question_with_direction');
			$ques = new $this->Question_with_direction($direction,$question,$option_1,$option_2,$option_3,$option_4,$option_5,$cr_option);
			return $ques;

		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}
}



?>