<?php

class Student extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('studentmod');
		$this->backdoor();
	}

	function backdoor()
	{
		if(! $this->session->userdata('backdoor'))
			redirect('home');
	}

	function index()
	{
		$this->load->view('dash');
	}
	function profile()
	{
		$id=$this->session->userdata('id');
		
		$obj=$this->usermod->select_where_id($id);

		$pagedata['data']=$obj;
		$pagedata['page']='user/profile';
		$pagedata['title']='PROFILE PAGE';
		$this->load->view('layout', $pagedata);
	}

	function changepass()
	{
		$id=$this->session->userdata('id');
		if($this->input->post('submit'))
		{
			$a=$this->input->post('old_pass');
			$b=$this->input->post('new_pass');
			$c=$this->input->post('re_pass');
			$obj=$this->usermod->select_where_id($id);
			$arr=$obj->row_array();
			if($arr['password']==$a)
			{
				if($b == $c)
				{
					$data['password']=$b;
					$this->usermod->update($id, $data);
					$this->session->set_flashdata('msg', 'Your Password has been change succfully');
					redirect('user/profile');
					
				}
				else
				{
					$this->session->set_flashdata('msg', 'Re-Password is not Matched');
					redirect('user/changepass');
				}
			}
			else
			{
				$this->session->set_flashdata('msg', 'Current Password is Incorrect');
				redirect('user/changepass');
			}
		}
		else
		{
			$pagedata['page']='user/changepass';
			$pagedata['title']='CHANGE PASS PAGE';
			$this->load->view('layout', $pagedata);
			
		}
	}


	function profile_pic()
	{
		
		if($this->input->post('submit'))
		{
			$config['max_size']=2048; // KB
			$config['allowed_types']="jpg|png|jpeg|gif";
			$config['upload_path'] = "user_profile/";

			$config['encrypt_name'] = true;
			// we should define 3 details
			$this->load->library('upload', $config);
			if($this->upload->do_upload()==false)
			{
				$a= $this->upload->display_errors();
				$this->session->set_flashdata('msg', $a);
				redirect('user/profile_pic');
			}
			else
			{
				// print_r($this->upload->data());
				$name = $this->upload->data('file_name');


				$id=$this->session->userdata('id');
				$data['image']=$name;
				$this->load->model('usermod');
				$this->usermod->update($id, $data);
				redirect('user/profile');
			}


		}
		else
		{
			$pagedata['page']='user/profile_pic';
			$pagedata['title']='PROFILE PICTURE PAGE';
			$this->load->view('layout', $pagedata);
			
		}
	}

	function edit_profile()
	{

		$id=$this->session->userdata('id');
		$obj=$this->usermod->select_where_id($id);

		if($this->input->post("submit"))
		{
			// $arr['full_name']=$this->input->post('full_name');
			// $arr['address']=$this->input->post('address');
			// $arr['city']=$this->input->post('city');
			// $arr['contact']=$this->input->post('contact');
			// $arr['gender']=$this->input->post('gender');
			$arr=$this->input->post();
			unset($arr['submit']);
			$this->usermod->update($id, $arr);
			// $this->profile();
			redirect('user/profile');
		}

		$pagedata['data']=$obj;
		$pagedata['page']='user/edit_profile';
		$pagedata['title']='PROFILE PAGE';
		$this->load->view('layout', $pagedata);
	}


	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}

?>