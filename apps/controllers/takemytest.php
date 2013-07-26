<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takemytest extends CI_Controller {

	public function index()	{

		$data['name'] = "Welcome to TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = $this->load->view('takemytest/home','',true);

		$this->load->view('html/basic_html',$data);
	}


	public function about_us() {

		$data['name'] = "About Us @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = $this->load->view('takemytest/about_us','',true);

		$this->load->view('html/basic_html',$data);
	}

	public function faq() {

		$data['name'] = "Frequently Asked Questions @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = $this->load->view('takemytest/faq','',true);

		$this->load->view('html/basic_html',$data);
	}

	public function suggestion_box() {

		$data['name'] = "Suggestion Box @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = $this->load->view('takemytest/suggestion_box','',true);

		$this->load->view('html/basic_html',$data);
	}

	public function terms() {

		$data['name'] = "Terms of Service @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = $this->load->view('takemytest/terms','',true);

		$this->load->view('html/basic_html',$data);
	}

	public function privacy_policy() {

		$data['name'] = "Privacy Policy @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = $this->load->view('takemytest/privacy_policy','',true);

		$this->load->view('html/basic_html',$data);
	}

	public function courses() {

		$data['name'] = "COURSES @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = "<div id='article_third_row' style='display: inline-block; width:100%;''>
						<span style='color:#16A2EB;'>
							<h2>Examinations</h2>
						</span>
						
						<a href='".base_url()."index.php/ibps_po'>
							<span style='display: inline-block; width:280px; margin-left: 8px; margin-right: 8px; float: left; background-color: #D0ECFB; height: 180px; margin-top: 15px; padding:10px;'>
								<span style='color:#4D4D4D;'>IBPS-PO/MT EXAM PREPARATION</span>
								<hr />
								<span style='color:#16A2EB;'><i> The Common Written Examination (CWE-PO/ MT) will be conducted by the IBPS as a pre-requisite for selection of personnel for Probationary Officer/ Management Trainee posts in the Public Sector Banks.</i></span>
							</span>
						</a>

						

					</div>";

		$this->load->view('html/basic_html',$data);
	}


	public function how_it_works() {

		$data['name'] = "HOW IT WORKS @ TakeMyTest : Online Aptitude Center";
		$data['description'] = "
								<h1>Prepare yourself for your next Examination</h1>
						<p>choose examination or subjects you want to learn, read the study materials, practice the practice set until you are confident enough for the examination or you think you learn that subject</p>
								";
		$data['keywords'] = "Aptitude, practice, exam, training";
		$data['article'] = "";

		$this->load->view('html/basic_html',$data);
	}
}