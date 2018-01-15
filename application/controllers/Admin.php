<?php

class Admin extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('studentmod');
	}

	function backdoor()
	{
		if(! $this->session->userdata('backdoor_admin'))
		{
			redirect('home');
		}
	}

	function index()
	{
		if($this->input->post('submit'))
		{
			$u=$this->input->post('username');
			$p=$this->input->post('password');
			$obj=$this->adminmod->select_where_username($u);
			if($obj->num_rows()==1)
			{	
				$data=$obj->row_array();
				if($data['password']==$p)
				{
					$this->session->set_userdata('backdoor_admin', true);
					redirect('admin/dash');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Password Incorrect');
					redirect('admin');
				}
			}
			else
			{
				$this->session->set_flashdata('msg', 'Username Incorrect');
				redirect('admin');
			}


		}	
		else
		{

			$this->load->view('admin/login');
		}
	}

	function dash()
	{
		$this->backdoor();
		$obj=$this->studentmod->get_all();

		$data['user']=$obj;
		$this->load->view('admin/dash', $data);
	}

	function add_que()
	{
		$this->backdoor();
		$this->load->view('admin/add_que');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
	function change($id, $x)
	{
		if($x==1)
		{
			$data['status']=0;
		}
		else
		{
			$data['status']=1;
		}
		$this->load->model('usermod');
		$this->usermod->update($id, $data);
		redirect('admin/dash');
	}
}

?>