<?php

class Ibps_po_database_conf extends CI_model {

	function __construct() {
		parent::__construct();
	}


	function create_database() {

		try {

			// loading database helper
			$this->load->dbforge();


			// about table (controller_about)
			$table1 = "ibps_po_about";
			
			$fld_table1 = array(
	                'id' => array(
	                    'type' => 'INT',
	                    'constraint' => 5,
	                    'auto_increment' => TRUE
	                    ),
	                'name' => array(
	                    'type' => 'TEXT'
	                    ),
	                'description' => array(
	                    'type' => 'TEXT'
	                    ),
	                'navigator' => array(
	                    'type' => 'TEXT'
	                    ),
	                'extra_description' => array(
	                    'type' => 'TEXT',
	                    ),
	                );

			$this->dbforge->add_field($fld_table1,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($table1);



			// user subscription table (controller_subscription)
			$table2 = "ibps_po_subscription";
			
			$fld_table2 = array(
	                'id' => array(
	                    'type' => 'INT',
	                    'constraint' => 11,
	                    'auto_increment' => TRUE
	                    ),
	                'user_id' => array(
	                    'type' => 'INT',
	                    'constraint' => 11
	                    ),
	                'subscription_date' => array(
	                    'type' => 'DATETIME',
	                    ),
	                'last_login' => array(
	                    'type' => 'DATETIME',
	                    ),
	                );

			$this->dbforge->add_field($fld_table2,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('user_id', TRUE);
            $this->dbforge->create_table($table2);



			// group information for storing of question declaration (controller_subject_declaration)
			$table3 = "ibps_po_reasoning_declaration";
			$table4 = "ibps_po_quantitative_aptitude_declaration";
			$table5 = "ibps_po_general_awareness_declaration";
			$table6 = "ibps_po_computer_knowledge_declaration";
			$table7 = "ibps_po_english_language_declaration";

			$fld_table3 = array(
	                'id' => array(
	                    'type' => 'INT',
	                    'constraint' => 11,
	                    'auto_increment' => TRUE
	                    ),
	                'declaration' => array(
	                    'type' => 'TEXT',
	                    ),
	                'group_id' => array(
	                    'type' => 'INT',
	                    'constraint' => 11,
	                    ),
	                'no_of_question' => array(
	                    'type' => 'INT',
	                    'constraint' => 3,
	                    ),
	                'remark' => array(
	                    'type' => 'TEXT',
	                    'null' => TRUE,
	                    ),
	                );

			$this->dbforge->add_field($fld_table3,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($table3);

            $this->dbforge->add_field($fld_table3,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($table4);

            // see the documents

            // $this->dbforge->add_field($fld_table3,TRUE);
            // $this->dbforge->add_key('id', TRUE);
            // $this->dbforge->create_table($table5);

            // $this->dbforge->add_field($fld_table3,TRUE);
            // $this->dbforge->add_key('id', TRUE);
            // $this->dbforge->create_table($table6);

            $this->dbforge->add_field($fld_table3,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($table7);



			// questions and answers of each subjects (controller_subject_questions)
			$table8 = "ibps_po_reasoning_questions";
			$table9 = "ibps_po_quantitative_aptitude_questions";
			$table10 = "ibps_po_general_awareness_questions";
			$table11 = "ibps_po_computer_knowledge_questions";
			$table12 = "ibps_po_english_language_questions";

			$fld_table4 = array(
	                'id' => array(
	                    'type' => 'INT',
	                    'constraint' => 11,
	                    'auto_increment' => TRUE
	                    ),
	                'sl_no' => array(
	                    'type' => 'INT',
	                    'constraint' => 11,
	                    ),
	                'declaration_id' => array(
	                    'type' => 'INT',
	                    'constraint' => 3,
	                    ),
	                'declaration_sl_no' => array(
	                    'type' => 'INT',
	                    'constraint' => 3,
	                    ),
	                'question' => array(
	                    'type' => 'TEXT',
	                    ),
	                'option_1' => array(
	                    'type' => 'TEXT',
	                    ),
	                'option_2' => array(
	                    'type' => 'TEXT',
	                    ),
	                'option_3' => array(
	                    'type' => 'TEXT',
	                    ),
	                'option_4' => array(
	                    'type' => 'TEXT',
	                    ),
	                'option_5' => array(
	                    'type' => 'TEXT',
	                    'null' => TRUE,
	                    ),
	                'c_option' => array(
	                    'type' => 'INT',
	                    'constraint' => 1,
	                    ),
	                );

			$this->dbforge->add_field($fld_table4,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('sl_no', TRUE);
            $this->dbforge->create_table($table8);

            $this->dbforge->add_field($fld_table4,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('sl_no', TRUE);
            $this->dbforge->create_table($table9);

            $this->dbforge->add_field($fld_table4,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('sl_no', TRUE);
            $this->dbforge->create_table($table10);

            $this->dbforge->add_field($fld_table4,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('sl_no', TRUE);
            $this->dbforge->create_table($table11);

            $this->dbforge->add_field($fld_table4,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('sl_no', TRUE);
            $this->dbforge->create_table($table12);



			// question set information for subject wise (controller_subject_set_info)
			$table13 = "ibps_po_subject_set_info";

			$fld_table5 = array(
	                'id' => array(
	                    'type' => 'INT',
	                    'constraint' => 5,
	                    'auto_increment' => TRUE
	                    ),
	                'set_no' => array(
	                    'type' => 'INT',
	                    'constraint' => 5
	                    ),
	                'reasoning' => array(
	                    'type' => 'TEXT'
	                    ),
	                'quantitative_aptitude' => array(
	                    'type' => 'TEXT',
	                    ),
	                'general_awareness' => array(
	                    'type' => 'TEXT',
	                    ),
	                'computer_knowledge' => array(
	                    'type' => 'TEXT',
	                    ),
	                'english_language' => array(
	                    'type' => 'TEXT',
	                    ),
	                'remark' => array(
	                    'type' => 'TEXT',
	                    ),
	                );

			$this->dbforge->add_field($fld_table5,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('set_no', TRUE);
            $this->dbforge->create_table($table13);



			// question set information for full set (controller_full_set_info)
			$table14 = "ibps_po_full_set_info";

			$fld_table6 = array(
	                'id' => array(
	                    'type' => 'INT',
	                    'constraint' => 5,
	                    'auto_increment' => TRUE
	                    ),
	                'set_no' => array(
	                    'type' => 'INT',
	                    'constraint' => 5,
	                    ),
	                'reasoning' => array(
	                    'type' => 'TEXT'
	                    ),
	                'quantitative_aptitude' => array(
	                    'type' => 'TEXT',
	                    ),
	                'general_awareness' => array(
	                    'type' => 'TEXT',
	                    ),
	                'computer_knowledge' => array(
	                    'type' => 'TEXT',
	                    ),
	                'english_language' => array(
	                    'type' => 'TEXT',
	                    ),
	                'remark' => array(
	                    'type' => 'TEXT',
	                    ),
	                );

			$this->dbforge->add_field($fld_table6,TRUE);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('set_no', TRUE);
            $this->dbforge->create_table($table14);

            return TRUE;


		} catch (Exception $ex) {
            echo $ex->getMessage;       
        }  

	}


	function delete_database() {

		try{

			// loading database helper
			$this->load->dbforge();

		
			$table1 = "ibps_po_about";
			$table2 = "ibps_po_subscription";
			$table3 = "ibps_po_reasoning_declaration";
			$table4 = "ibps_po_quantitative_aptitude_declaration";
			$table5 = "ibps_po_general_awareness_declaration";
			$table6 = "ibps_po_computer_knowledge_declaration";
			$table7 = "ibps_po_english_language_declaration";
			$table8 = "ibps_po_reasoning_questions";
			$table9 = "ibps_po_quantitative_aptitude_questions";
			$table10 = "ibps_po_general_awareness_questions";
			$table11 = "ibps_po_computer_knowledge_questions";
			$table12 = "ibps_po_english_language_questions";
			$table13 = "ibps_po_subject_set_info";
			$table14 = "ibps_po_full_set_info";

			
			// dropping all table
			$this->dbforge->drop_table($table1);
			$this->dbforge->drop_table($table2);
			$this->dbforge->drop_table($table3);
			$this->dbforge->drop_table($table4);
			$this->dbforge->drop_table($table5);
			$this->dbforge->drop_table($table6);
			$this->dbforge->drop_table($table7);
			$this->dbforge->drop_table($table8);
			$this->dbforge->drop_table($table9);
			$this->dbforge->drop_table($table10);
			$this->dbforge->drop_table($table11);
			$this->dbforge->drop_table($table12);
			$this->dbforge->drop_table($table13);
			$this->dbforge->drop_table($table14);
		

			return TRUE;

		} catch (Exception $ex) {
            echo $ex->getMessage;       
        }  
		
	}



	function upload(){
		try {
			
			$table = "ibps_po_about";
			$name = "computer_knowledge";
			$description = '<h1>COMMON WRITTEN EXAMINATION [CWE] FOR RECRUITMENT OF PROBATIONARY OFFICERS/ MANAGEMENT TRAINEES IN PUBLIC SECTOR BANKS </h1>
						<h1>SUBJECT : ENGLISH LANGUAGE</h1>
						
						<h3>Syllabus of English Language for IBPS-PO/MT<br />(multiple choise questions)</h3>
						<ol>
							<li>Reading Comprehension</li>
							<li>Spotting Error</li>
							<li>Synonyms & Antonyms</li>
							<li>Sentence complete, correction & improvement</li>
						</ol>

						<h3>Syllabus of English Language for IBPS-PO/MT<br />(descriptive questions)</h3>
						<ol>
							<li>Reading Comprehension</li>
							<li>Essay Writing</li>
							<li>Precis Writing</li>
							<li>Letter Writing</li>
						</ol>';

			$navigator = '<h3>Start Practice For IBPS-PO/MT<br />(click here to start)</h3>
						<h4>I. Back to IBPS-PO/MT Home Page</h4>
						<ol>
							<li><a rel="nofollow" href="<?php echo base_url(); ?>index.php/ibps_po">Home</a></li>
						</ol>
						<h4>II. Practice Subject wise</h4>
						<ol>
							<li><a rel="nofollow" href="<?php echo base_url(); ?>index.php/ibps_po/reasoning">Reasoning</a></li>
							<li><abbr title="Already here" style="cursor:pointer">English Language</abbr></li>
							<li><a rel="nofollow" href="<?php echo base_url(); ?>index.php/ibps_po/general_awareness">General Awareness</a></li>
							<li><a rel="nofollow" href="<?php echo base_url(); ?>index.php/ibps_po/quantitative_aptitude">Quantitative Aptitude</a></li>
							<li><a rel="nofollow" href="<?php echo base_url(); ?>index.php/ibps_po/computer_knowledge">Computer Knowledge</abbr></li>
						</ol>
						<h4>III. Practice Full Set</h4>
						<ol>
							<li><a rel="nofollow" href="<?php echo base_url(); ?>index.php/ibps_po/examination">Full Set</a></li>
						</ol>';

			$extra_description = '<h3>Practice the following sets</h3>

						<div id="all_available_sets" style="display:inline-block;width:100%;float:left">

							<span style="display:inline-block;width:100%;float:left;margin-top:20px;">
							<a href="<?php echo base_url(); ?>index.php/ibps_po/english_language/set-01">
								<span style="display:inline-block;width:80%;float:left;background-color:#D0ECFB">
									&nbsp;&nbsp;&nbsp;IBPS-PO/MT English Language Set 01
								</span>
								<span style="display:inline-block;width:100%;float:left">
									&nbsp;&nbsp;&nbsp;No of Questions: 50
									<br />
									&nbsp;&nbsp;&nbsp;Total Time: 30 minutes
								</span>
							</a>
							</span>

							<span style="display:inline-block;width:100%;float:left;margin-top:20px;">
							<a href="<?php echo base_url(); ?>index.php/ibps_po/english_language/set-02">
								<span style="display:inline-block;width:80%;float:left;background-color:#D0ECFB">
									&nbsp;&nbsp;&nbsp;IBPS-PO/MT English Language Set 02
								</span>
								<span style="display:inline-block;width:100%;float:left">
									&nbsp;&nbsp;&nbsp;No of Questions: 50
									<br />
									&nbsp;&nbsp;&nbsp;Total Time: 30 minutes
								</span>
							</a>
							</span>

							<span style="display:inline-block;width:100%;float:left;margin-top:20px;">
							<a href="<?php echo base_url(); ?>index.php/ibps_po/english_language/set-03">
								<span style="display:inline-block;width:80%;float:left;background-color:#D0ECFB">
									&nbsp;&nbsp;&nbsp;IBPS-PO/MT English Language Set 03
								</span>
								<span style="display:inline-block;width:100%;float:left">
									&nbsp;&nbsp;&nbsp;No of Questions: 50
									<br />
									&nbsp;&nbsp;&nbsp;Total Time: 30 minutes
								</span>
							</a>
							</span>

							<span style="display:inline-block;width:100%;float:left;margin-top:20px;">
							<a href="<?php echo base_url(); ?>index.php/ibps_po/english_language/set-04">
								<span style="display:inline-block;width:80%;float:left;background-color:#D0ECFB">
									&nbsp;&nbsp;&nbsp;IBPS-PO/MT English Language Set 04
								</span>
								<span style="display:inline-block;width:100%;float:left">
									&nbsp;&nbsp;&nbsp;No of Questions: 50
									<br />
									&nbsp;&nbsp;&nbsp;Total Time: 30 minutes
								</span>
							</a>
							</span>

							<span style="display:inline-block;width:100%;float:left;margin-top:20px;">
							<a href="<?php echo base_url(); ?>index.php/ibps_po/english_language/set-05">
								<span style="display:inline-block;width:80%;float:left;background-color:#D0ECFB">
									&nbsp;&nbsp;&nbsp;IBPS-PO/MT English Language Set 05
								</span>
								<span style="display:inline-block;width:100%;float:left">
									&nbsp;&nbsp;&nbsp;No of Questions: 50
									<br />
									&nbsp;&nbsp;&nbsp;Total Time: 30 minutes
								</span>
							</a>
							</span>
						</div>
						';


			$data = array(
			   'name' => $name ,
			   'description' => $description ,
			   'navigator' => $navigator,
			   'extra_description' => $extra_description
			);

			$this->db->insert($table, $data); 

			return TRUE;

		} catch (Exception $e) {
			echo $e->getMessage;
		}
	}


}







?>
