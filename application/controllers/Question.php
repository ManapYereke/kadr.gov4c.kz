<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Question extends CI_Controller {
	var $data=[];
	var $CI;

	function __construct() {
		parent::__construct();

		$this->data["tb0101"]=$this->session->userdata("tb0101"); 
	}

	public function index()
	{ 
		$this->controller();
	}

	public function lst(){ $this->controller(); }

	public function add(){ $this->controller(); }

	public function edit(){ $this->controller(); }

	public function save(){ $this->controller(); }

	public function del(){ $this->controller(); }

	public function controller()
	{
		if(!$this->uri->segment(2))
		{
			redirect($this->uri->segment(1)."/lst");
			return;
		}

		try 
		{
			$res=$this->tablecontroller->processor(
				"tb0302_questions" // $table
				,false 		// $has_arch
				,true 		// $update_timestamp
				,[			// $columns
					"tb0302_id"=>[
						"iskey"=>1
						,"autoinc"=>1
						,"type"=>"number"
						,"template"=>"%tb0302_id%"
					]
					,"tb0302_tb0301_id"=>[
						"iskey"=>0
						,"type"=>"number"
						,"template"=>"%tb0301_subtests.tb0301_name_ru%"
					]
					,"tb0302_order"=>[
						"iskey"=>0
						,"type"=>"number"
						,"template"=>"%tb0302_order%"
					]
					,"tb0302_desc_ru"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>"%tb0302_desc_ru%"
					]
					,"tb0302_desc_kz"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>"%tb0302_desc_kz%"
					]

					,"tb0302_answer"=>[
						"iskey"=>0
						,"type"=>"number"
						,"template"=>""
					]

					,"tb0302_answer1_ru"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]
					,"tb0302_answer1_kz"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]

					,"tb0302_answer2_ru"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]
					,"tb0302_answer2_kz"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]

					,"tb0302_answer3_ru"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]
					,"tb0302_answer3_kz"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]

					,"tb0302_answer4_ru"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]
					,"tb0302_answer4_kz"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]

					,"tb0302_answer5_ru"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]
					,"tb0302_answer5_kz"=>[
						"iskey"=>0
						,"type"=>"string"
						,"template"=>""
					]

					,"tb0302_created"=>[
						"iskey"=>0
						,"type"=>"datetime"
						,"template"=>"%tb0302_created%"
					]
					,"tb0302_createdby"=>[
						"iskey"=>0
						,"type"=>"number"
						,"template"=>"%tb0101_users.tb0101_name2% %tb0101_users.tb0101_name1%"
					]
				]
				,2			// $cmdSegment
				,null 		// $onSaveSuccess
				,[			// $customWHERE
					//"tb0102_tb0101_id"=>$this->data["tb0101"]->tb0101_idn
				]
			);
			if($res) die(json_encode(array("result"=>"Операция завершена успешно.","id"=>$res)));
		}
		catch (Exception $e)
		{
			//die($e->getMessage());
			die(json_encode(array("error"=>$e->getMessage())));
		}

		$data=array();
		if($this->uri->segment(3))
		{
			$data=$this->db->get_where("tb0302_questions",array("tb0302_id"=>urldecode($this->uri->segment(3))))->row_array();
			if(!$data||!count($data)) throw new Exception("Запись не найдена");
		}

		$this->data=array_merge($this->data,$data);
		$this->load->view($this->uri->segment(1)."/".$this->uri->segment(2),$this->data);
	}
}
