<?php

class Ibps_po extends CI_Controller{

	public function __construct() {
		parent::__construct();
	}


	public function index() {
		
		$data['name'] = "IBPS-PO/MT EXAM PREPARETION";
		$data['description'] = "
								<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
						<p>The Common Written Examination (CWE-PO/ MT) will be conducted by the Institute of Banking Personnel Selection (IBPS) as a pre-requisite for selection of personnel for Probationary Officer/ Management Trainee posts in the Public Sector Banks.</p>
						<p>This system of Common Written Examination for recruitment of Probationary Officers/ Management Trainees has been approved by the Government of India, has the consent of the Boards of each of the participating Banks and the Managing Committee of the Indian Banks Association (IBA).</p>
								";
		$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training";
		$data['article'] = $this->load->view('ibps_po/index_page','',true);

		$this->load->view('html/basic_html',$data);
	}


	// all function to show subject chapter wise
	public function reasoning() {
		if ($this->uri->segment(3) === FALSE){

			$data['name'] = "REASONING : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of reasoning for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, reasoning";
			$arr['set_info'] = $this->create_subject_set_list('Reasoning'); 
			$data['article'] = $this->load->view('ibps_po/reasoning',$arr,true);
			

			$this->load->view('html/basic_html',$data);

		} elseif ($this->uri->segment(4) === FALSE) {
			
			$subject_name = 'reasoning';
			$set_no = $this->uri->segment(3);
			$set_no = str_replace('set-', '', $set_no);
			$set_no = intval($set_no);
			$table_name = 'ibps_po_subject_set_info';
			$this->load->model('ibps_po_data_model/Ibps_po_database_model');


			$data['subject_name'] = $subject_name;
			$data['name'] = "SET NO : " .$set_no. " REASONING : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of reasoning for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, Reasoning ,set ". $set_no;
			$data['subject_name'] = 'reasoning';
			$data['set_no'] = $set_no;
			$data['time'] = $this->Ibps_po_database_model->get_set_total_times($subject_name,$table_name,$set_no);
			$data['no_of_questions'] = $this->Ibps_po_database_model->get_set_no_of_questions($subject_name,$table_name,$set_no);
			$data['spl_jscript'] = '<script type="text/javascript"></script>';
		
			if ($data['no_of_questions']) {
				$this->load->view('html/question_html',$data);
			} else {
				show_404();
			}

		} else {
			show_404();
		}
	}

	public function quantitative_aptitude() {
		if ($this->uri->segment(3) === FALSE){

			$data['name'] = "QUANTITATIVE APTITUDE : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of quantitative aptitude for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, quantitative_aptitude";
			$arr['set_info'] = $this->create_subject_set_list('Quantitative Aptitude'); 
			$data['article'] = $this->load->view('ibps_po/quantitative_aptitude',$arr,true);
			

			$this->load->view('html/basic_html',$data);

		} elseif ($this->uri->segment(4) === FALSE) {
			
			$subject_name = 'quantitative_aptitude';
			$set_no = $this->uri->segment(3);
			$set_no = str_replace('set-', '', $set_no);
			$set_no = intval($set_no);
			$table_name = 'ibps_po_subject_set_info';
			$this->load->model('ibps_po_data_model/Ibps_po_database_model');


			$data['subject_name'] = $subject_name;
			$data['name'] = "SET NO : " .$set_no. " QUANTITATIVE APTITUDE : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of quantitative aptitude for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, quantitative aptitude ,set ". $set_no;
			$data['subject_name'] = 'quantitative_aptitude';
			$data['set_no'] = $set_no;
			$data['time'] = $this->Ibps_po_database_model->get_set_total_times($subject_name,$table_name,$set_no);
			$data['no_of_questions'] = $this->Ibps_po_database_model->get_set_no_of_questions($subject_name,$table_name,$set_no);
			$data['spl_jscript'] = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';

			if ($data['no_of_questions']) {
				$this->load->view('html/question_html',$data);
			} else {
				show_404();
			}

		} else {
			show_404();
		}
	}

	public function general_awareness() {
		if ($this->uri->segment(3) === FALSE){

			$data['name'] = "GENERAL AWARENESS : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of general awareness for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, general awareness";
			$arr['set_info'] = $this->create_subject_set_list('General Awareness'); 
			$data['article'] = $this->load->view('ibps_po/general_awareness',$arr,true);
			

			$this->load->view('html/basic_html',$data);

		} elseif ($this->uri->segment(4) === FALSE) {
			
			$subject_name = 'general_awareness';
			$set_no = $this->uri->segment(3);
			$set_no = str_replace('set-', '', $set_no);
			$set_no = intval($set_no);
			$table_name = 'ibps_po_subject_set_info';
			$this->load->model('ibps_po_data_model/Ibps_po_database_model');


			$data['subject_name'] = $subject_name;
			$data['name'] = "SET NO : " .$set_no. " GENERAL AWARENESS : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of general awareness for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, General Awareness ,set ". $set_no;
			$data['subject_name'] = 'general_awareness';
			$data['set_no'] = $set_no;
			$data['time'] = $this->Ibps_po_database_model->get_set_total_times($subject_name,$table_name,$set_no);
			$data['no_of_questions'] = $this->Ibps_po_database_model->get_set_no_of_questions($subject_name,$table_name,$set_no);
			$data['spl_jscript'] = '<script type="text/javascript"></script>';

			if ($data['no_of_questions']) {
				$this->load->view('html/question_html',$data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function computer_knowledge() {
		
		if ($this->uri->segment(3) === FALSE){

			$data['name'] = "COMPUTER KNOWLEDGE : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check computer knowledge for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, computer knowledge";
			$arr['set_info'] = $this->create_subject_set_list('Computer Knowledge'); 
			$data['article'] = $this->load->view('ibps_po/computer_knowledge',$arr,true);
			

			$this->load->view('html/basic_html',$data);

		} elseif ($this->uri->segment(4) === FALSE) {
			
			$subject_name = 'computer_knowledge';
			$set_no = $this->uri->segment(3);
			$set_no = str_replace('set-', '', $set_no);
			$set_no = intval($set_no);
			$table_name = 'ibps_po_subject_set_info';
			$this->load->model('ibps_po_data_model/Ibps_po_database_model');


			$data['subject_name'] = $subject_name;
			$data['name'] = "SET NO : " .$set_no. " COMPUTER KNOWLEDGE : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check computer knowledge for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, Computer Knowledge ,set ". $set_no;
			$data['subject_name'] = 'computer_knowledge';
			$data['set_no'] = $set_no;
			$data['time'] = $this->Ibps_po_database_model->get_set_total_times($subject_name,$table_name,$set_no);
			$data['no_of_questions'] = $this->Ibps_po_database_model->get_set_no_of_questions($subject_name,$table_name,$set_no);
			$data['spl_jscript'] = '<script type="text/javascript"></script>';

			if ($data['no_of_questions']) {
				$this->load->view('html/question_html',$data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
		
	}

	public function english_language() {
		if ($this->uri->segment(3) === FALSE){

			$data['name'] = "ENGLISH LANGUAGE : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of english for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, English Language";
			
			$arr['set_info'] = $this->create_subject_set_list('English Language'); 
			$data['article'] = $this->load->view('ibps_po/english_language',$arr,true);

			$this->load->view('html/basic_html',$data);

		} elseif ($this->uri->segment(4) === FALSE) {
			
			
			$subject_name = 'english_language';
			$set_no = $this->uri->segment(3);
			$set_no = str_replace('set-', '', $set_no);
			$set_no = intval($set_no);
			$table_name = 'ibps_po_subject_set_info';
			$this->load->model('ibps_po_data_model/Ibps_po_database_model');


			$data['subject_name'] = $subject_name;
			$data['name'] = "SET NO : " .$set_no. " ENGLISH LANGUAGE : IBPS-PO/MT EXAM PREPARETION";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of english for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training, English Language,set ". $set_no;
			$data['subject_name'] = 'english_language';
			$data['set_no'] = $set_no;
			$data['time'] = $this->Ibps_po_database_model->get_set_total_times($subject_name,$table_name,$set_no);
			$data['no_of_questions'] = $this->Ibps_po_database_model->get_set_no_of_questions($subject_name,$table_name,$set_no);
			$data['spl_jscript'] = '<script type="text/javascript"></script>';
			
			if ($data['no_of_questions']) {
				$this->load->view('html/question_html',$data);
			} else {
				show_404();
			}
		
		} else {
			show_404();
		}
		
	}



	// this function for show full set
	public function examination() {

		if ($this->uri->segment(3) === FALSE){

			$data['name'] = "IBPS-PO/MT EXAM PREPARETION : FULL SET";
			$data['description'] = "
									<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
									<p>This subject check knowledge of reasoning for ibps po Banking subject.</p>
									";
			$data['keywords'] = "IBPS-PO/MT EXAM PREPARETION, ibps, IBPS-PO, ibps_po, ibps ps, practice, exam, training";
			//$arr['set_info'] = $this->create_subject_set_list('Reasoning'); 
			//$data['article'] = $this->load->view('ibps_po/reasoning',$arr,true);
			$data['article'] = "<h1>IBPS-PO/MT EXAM PREPARETION : FULL SET</h1><p>comming soon</p>";
			

			$this->load->view('html/basic_html',$data);

		} elseif ($this->uri->segment(4) === FALSE) {
			
			
		
			if ($data['no_of_questions']) {
				$this->load->view('html/question_html',$data);
			} else {
				show_404();
			}

		} else {
			show_404();
		}
	}


	function get_subject_question_set() {

		$subject_name = $this->input->post('subject_name',TRUE);
		$set_no = $this->input->post('set_no',TRUE);
		#$subject_name = 'english_language';
		#$set_no = 'set-1';
		$set_no = str_replace('set-', '', $set_no);
		$set_no = intval($set_no);
		$table_name = 'ibps_po_subject_set_info';
		$this->load->model('ibps_po_data_model/Ibps_po_database_model');
		$set_information = $this->Ibps_po_database_model->get_set_information($table_name,$subject_name,$set_no);
		
		if($set_information) {
			$index = -1;
			$question_array_element = explode(',', $set_information);
			foreach ($question_array_element as $value) {
				if(strpos($value, '-')) {
					$all_element = explode(']', $value);
					$all_element = explode('[', $all_element[0]);
					$direction_id = $all_element[0];
					$all_element = explode('-', $all_element[1]);
					$start_id = $all_element[0];
					$end_id = NULL;
					$end_id = $all_element[1];
					for ($question_id = $start_id; $question_id <= $end_id; $question_id++) { 
						$index = $index + 1;
						$question_array[$index] = $this->Ibps_po_database_model->get_each_question($subject_name,$direction_id,$question_id);
					}

				} else {
					$all_element = explode(']', $value);
					$all_element = explode('[', $all_element[0]);
					$direction_id = $all_element[0];
					$question_id = $all_element[1];
					$index = $index + 1;
					$question_array[$index] = $this->Ibps_po_database_model->get_each_question($subject_name,$direction_id,$question_id);
				}
			}

			echo json_encode($question_array);
		}
		else
			echo 'Sorry, something is not good';
	}

	function create_subject_set_list($subject_name) {

		$string = '';

		$lower_subject_name = strtolower($subject_name);
		$lower_subject_name = str_replace(" ","_",$lower_subject_name);
		$table_name = 'ibps_po_subject_set_info';

		$this->load->model('ibps_po_data_model/Ibps_po_database_model');

		for ($index=1; $index < 16; $index++) { 
			
			$time = $this->Ibps_po_database_model->get_set_total_times($lower_subject_name,$table_name,$index);
			$no_of_questions = $this->Ibps_po_database_model->get_set_no_of_questions($lower_subject_name,$table_name,$index);

			$string = $string .'<span style="display:inline-block;width:100%;float:left;margin-top:20px;">
							<a href="'. base_url().'index.php/ibps_po/'.$lower_subject_name.'/set-0'.$index.'">
								<span style="display:inline-block;width:80%;float:left;background-color:#D0ECFB">
									&nbsp;&nbsp;&nbsp;IBPS-PO/MT '.$subject_name.' Set 0'.$index.'
								</span>
								<span style="display:inline-block;width:100%;float:left">
									&nbsp;&nbsp;&nbsp;No of Questions: '.$no_of_questions.'
									<br />
									&nbsp;&nbsp;&nbsp;Total Time: '.$time.' minutes
								</span>
							</a>
							</span>';


		}

		return $string;

		
	}


}







?>
