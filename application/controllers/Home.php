<?php

class Home extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('studentmod');
	}



	function index()
	{
		
		$this->load->view('home');
	}
	function login()
	{
		
		if($this->input->post("submit"))
		{
			$u=$this->input->post('username');
			$p=$this->input->post('password');
			$obj=$this->studentmod->get_all_by_username($u);
			if($obj->num_rows()==1)
			{
				$data=$obj->row_array();
				// print_r($data);
				if($data['password']==$p)
				{
					
						$this->session->set_userdata('id', $data['id']);
						$this->session->set_userdata('name', $data['full_name']);
						$this->session->set_userdata('backdoor', true);
						redirect('student');
						
					
				}
				else
				{
					$this->session->set_flashdata("msg", "Invalid Password");
					redirect('home/login');		
				}
			}
			else
			{
				$this->session->set_flashdata("msg", "This Username and Password is incorrect !");
				redirect('home/login');
			}
		}
		else
		{
			$this->load->view('login');
		}
		
	}
	function signup()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('re_pass', 'Re-Password', 'required|matches[password]');
		
		
		if($this->form_validation->run()==false)
		{
			$this->load->view('signup');
			
		}
		else
		{
			$data=$this->input->post();
			unset($data['submit']);
			unset($data['re_pass']);
			$this->studentmod->insert($data);
			redirect('home/login');
		}
	}
	
}

?>