<?php


/**
	* 
	*/
	class Question_with_direction extends CI_model {
		
		public $direction;
		public $question;
		public $option_1;
		public $option_2;
		public $option_3;
		public $option_4;
		public $option_5;
		public $cr_option;

		public function __construct($direction = '', $question = '', $option_1 = '', $option_2 = '', $option_3 = '', $option_4 = '', $option_5 = '', $cr_option = 99) {
			parent::__construct();
			$this->direction = $direction;
			$this->question = $question;
			$this->option_1 = $option_1;
			$this->option_2 = $option_2;
			$this->option_3 = $option_3;
			$this->option_4 = $option_4;
			$this->option_5 = $option_5;
			$this->cr_option = $cr_option;
		}
	}











?>