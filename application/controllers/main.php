<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function add_user($access) {
		$this->load->library("form_validation");
		$config = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|xxs_clean'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'last_name',
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|matches[confirm]|valid_email'
                  ),
               array(
                     'field'   => 'confirm',
                     'label'   => 'Email Confirmation',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|required|md5'
                  ),
               array(
					 'field'   => 'sex',
					 'label'   => 'Sex',
					 'rules'   => 'trim|required'
               		)
            );

		// var_dump($config);
		// die();

		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('reg_errors', "There Were Problems With Your Registration");
			if($access == 'register') {
				redirect('/');
			} else if($access == 'add') {
				redirect('/add/user');
			} else {
				die("You're Not Supposed To Be Here");
			}
		} else {
			$this->load->model('dashboard');
			$data = $this->input->post();
			$birthday = $data['month']."/".$data['day']."/".$data['year'];
			$data['birthday'] = $birthday;
			// var_dump($data);
			// die();
			$this->dashboard->create_user($data);
			if($access == 'register') {
				redirect('/');
			} else if($access == 'add') {
				redirect('/dashboard/admin');
			} else {
				die("You're Not Supposed To Be Here");
			}
		}
	}

	public function login_user() {
		$this->load->library("form_validation");
		$config = array(
           array(
                 'field'   => 'email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email'
              ),
           array(
                 'field'   => 'password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|md5'
              )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('login_errors', "There Were Problems With Your Login");
			redirect('/login');
        } else {
        	$this->load->model('dashboard');
        	$result = $this->dashboard->get_user_by_email($this->input->post('email'));
        	$user = $result[0];
        	if(!empty($user) && $user['password'] == $this->input->post('password')){
	    		$this->session->set_userdata('user', $user);
	    		redirect('/messageBoard');
        	} else {
        		$this->session->set_flashdata('login_errors', "Incorret Email Or Passsword");
				redirect('/');
        	}
   		}
	}

	public function edit($id) {
		$this->load->model('dashboard');
		$user = $this->dashboard->get_user_by_id($id);
		$this->load->view('profile', array('user' => $user));
	}

	public function edit_user($id) {
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email'
              ),
           array(
                 'field'   => 'first_name',
                 'label'   => 'First Name',
                 'rules'   => 'trim|required|xxs_clean'
              ),
           array(
                 'field'   => 'last_name',
                 'label'   => 'last_name',
                 'rules'   => 'trim|required|xss_clean'
              ),
          array(
                 'field'   => 'description',
                 'label'   => 'Description',
                 'rules'   => 'trim|required|xss_clean'
              )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('edit_errors', "There Were Problems With Your Edit");
			redirect("/profile");
        } else {
        	$this->load->model('dashboard');
	    	$current_user = $this->session->userdata('user');
        	$data = $this->input->post();
        	$data['id'] = $current_user['id'];
        	$changed = $this->dashboard->edit_user($data);
        	if($changed) {
				redirect('/profile');
        	} else {
        		die("<a href='/edit/user/$id'>GO BACK</a><br>There was an error with your edit");
        	}
        }
	}

	public function edit_user_password($id) {
		$this->load->library('form_validation');
		$config = array(
           array(
                 'field'   => 'password',
                 'label'   => 'Passsword',
                 'rules'   => 'trim|required|matches[confirm]|md5'
              ),
           array(
                 'field'   => 'confirm',
                 'label'   => 'Confirm',
                 'rules'   => 'trim|required|md5'
              )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('pass_errors', "Password Error");
        	redirect('profile');
        } else {
        	$this->load->model('dashboard');
        	$changed = $this->dashboard->edit_user_password($this->input->post());
        	if($changed) {
        		redirect('profile');
        	} else {
        		die("<a href='/edit/user/$id'>GO BACK</a><br>There was an error with your edit");
        	}
        }

	}
	public function messageBoard() {
		$current_user = $this->session->userdata('user');
		$id = $current_user['id'];
		$this->load->model('dashboard');
		$data = array(
			'current' => $current_user,
			'messages' => $this->dashboard->get_messages(),
			'comments' => $this->dashboard->get_comments(),
			'not_friends' => $this->dashboard->get_not_friends($id),
			'birthdays' => $this->dashboard->get_birthdays(),
			'images' => $this->dashboard->get_all_images()
		);
		$this->load->view('messageBoard', array('data' => $data));
	}
	public function post_message($id) {
		$this->load->model('dashboard');
		$current_user = $this->session->userdata('user');
		$data =  array(
			'current' => $current_user,
			'message' => $this->input->post("message"),
			'user_id' => $id,
			'likes' => 0
		);
		$this->dashboard->create_message($data);
		redirect("/messageBoard");
	}
	public function post_private_message($id) {
		$this->load->model('dashboard');
		$current_user = $this->session->userdata('user');
		$data =  array(
			'current' => $current_user,
			'message' => $this->input->post("message"),
			'user_id' => $id
		);
		$this->dashboard->create_private_message($data);
		redirect("/main/show/$id");
	}
	public function post_comment($id) {
		$this->load->model('dashboard');
		$current_user = $this->session->userdata('user');
		$data =  array(
			'current' => $current_user,
			'comment' => $this->input->post("comment"),
			'user_id' => $id,
			'messages_id' => $this->input->post("message_id")
		);
		$this->dashboard->create_comment($data);
		redirect("/messageBoard");
	}
    public function add_friend($id) {
		$this->load->model('dashboard');
        $current_user = $this->session->userdata('user');
        $this->dashboard->add_friend($id,$current_user['id']);
        redirect('/messageBoard');
    }
    public function delete_friend($id) {
		$this->load->model('dashboard');
        $user = $this->session->userdata('user');
        $this->dashboard->delete_friend($id,$user['id']);
        redirect('/profile');
    }
	public function destroy($id) {
		$this->load->view('destroy', array('id' => $id));
	}
	public function profile() {
		$current_user = $this->session->userdata('user');
		$id = $current_user['id'];
		$this->load->model('dashboard');
		$user = array(
			'current' => $current_user,
			'user' => $this->dashboard->get_user_by_id($id),
			'messages' => $this->dashboard->get_private_messages(),
            'friends' => $this->dashboard->get_friends($id),
            'image' => $this->dashboard->get_image_by_id($id),
            'cover_image' => $this->dashboard->get_cover_image_by_id($id)
		);
		if(empty($user['description'])) {
			$user['description'] = "This user didn't set a description!";
		}
		$this->load->view('profile', array('user' => $user));
	}
	public function show($id) {
		$current_user = $this->session->userdata('user');
		$this->load->model('dashboard');
		$user = array(
			'current' => $current_user,
			'user' => $this->dashboard->get_user_by_id($id),
			'messages' => $this->dashboard->get_private_messages(),
            'friends' => $this->dashboard->get_friends($id),
            'image' => $this->dashboard->get_image_by_id($id),
            'cover_image' => $this->dashboard->get_cover_image_by_id($id)
		);

		if(empty($user['user']['description'])) {
			$user['user']['description'] = "This user didn't set a description!";
		}
		$this->load->view('show', array('user' => $user));
	}
	public function edit_profile() {
		$current_user = $this->session->userdata('user');
		$id = $current_user['id'];
		$this->load->model('dashboard');
		$user = array(
			'current' => $current_user,
			'user' => $this->dashboard->get_user_by_id($id),
			'messages' => $this->dashboard->get_private_messages(),
            'friends' => $this->dashboard->get_friends($id),
            'image' => $this->dashboard->get_image_by_id($id),
            'cover_image' => $this->dashboard->get_cover_image_by_id($id)
		);
		if(empty($user['user']['description'])) {
			$user['user']['description'] = "This user didn't set a description!";
		}
		$this->load->view('edit_profile', array('user' => $user));

	}
	public function upload(){
		$current_user = $this->session->userdata('user');
		$id = $current_user['id'];
		/*** check if a file was uploaded ***/
		if(is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false)
		    {
		    /***  get the image info. ***/
		    $size = getimagesize($_FILES['userfile']['tmp_name']);
		    /*** assign our variables ***/
		    $type = $size['mime'];
		    $imgfp = fopen($_FILES['userfile']['tmp_name'], 'rb');
		    $size = $size[3];
		    $name = $_FILES['userfile']['name'];
		    $maxsize = 99999999;

		    /***  check the file is less than the maximum file size ***/
		    if($_FILES['userfile']['size'] < $maxsize )
		        {
			        /*** connect to db ***/
			        $dbh = new PDO("mysql:host=localhost;dbname=facebook", 'root', 'root');
	                /*** set the error mode ***/
	                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		            /*** our sql query ***/
			        $stmt = $dbh->prepare("INSERT INTO user_images (image_type ,image, image_size, image_name, user_id) VALUES (? ,?, ?, ?, $id)");
			        /*** bind the params ***/
			        $stmt->bindParam(1, $type);
			        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
			        $stmt->bindParam(3, $size);
			        $stmt->bindParam(4, $name);
			        /*** execute the query ***/
			        $stmt->execute();
			        redirect('edit_profile');
		        }
		    else
		        {
		        /*** throw an exception is image is not of type ***/
		        throw new Exception("File Size Error");
		        }
		    }
		else
		    {
		    // if the file is not less than the maximum allowed, print an error
		    throw new Exception("Unsupported Image Format!");
		    }
		}
		public function upload_cover(){
			$current_user = $this->session->userdata('user');
			$id = $current_user['id'];
			/*** check if a file was uploaded ***/
			if(is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false)
			    {
			    /***  get the image info. ***/
			    $size = getimagesize($_FILES['userfile']['tmp_name']);
			    /*** assign our variables ***/
			    $type = $size['mime'];
			    $imgfp = fopen($_FILES['userfile']['tmp_name'], 'rb');
			    $size = $size[3];
			    $name = $_FILES['userfile']['name'];
			    $maxsize = 99999999;

			    /***  check the file is less than the maximum file size ***/
			    if($_FILES['userfile']['size'] < $maxsize )
			        {
				        /*** connect to db ***/
				        $dbh = new PDO("mysql:host=localhost;dbname=facebook", 'root', 'root');
		                /*** set the error mode ***/
		                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			            /*** our sql query ***/
				        $stmt = $dbh->prepare("INSERT INTO cover_images (image_type ,image, image_size, image_name, user_id) VALUES (? ,?, ?, ?, $id)");
				        /*** bind the params ***/
				        $stmt->bindParam(1, $type);
				        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
				        $stmt->bindParam(3, $size);
				        $stmt->bindParam(4, $name);
				        /*** execute the query ***/
				        $stmt->execute();
				        redirect('edit_profile');
			        }
			    else
			        {
			        /*** throw an exception is image is not of type ***/
			        throw new Exception("File Size Error");
			        }
			    }
			else
			    {
			    // if the file is not less than the maximum allowed, print an error
			    throw new Exception("Unsupported Image Format!");
			    }
		}
	public function search() {
		$current_user = $this->session->userdata('user');
		$id = $current_user['id'];
		$this->load->model('dashboard');
		$search = $this->input->post("search");
		$data = array(
			'current' => $current_user,
			'messages' => $this->dashboard->get_messages(),
			'comments' => $this->dashboard->get_comments(),
			'not_friends' => $this->dashboard->get_not_friends($id),
			'birthdays' => $this->dashboard->get_birthdays(),
			'results' => $this->dashboard->search_query($search)
		);
		$this->load->view('serach_results', array('data' => $data));
	}
	public function like_button() {
		$this->load->model('dashboard');
		$data = $this->input->post('message_id');
		$this->dashboard->update_likes($data);
		redirect('messageBoard');
	}
	public function logoff() {
		$this->session->unset_userdata('user');
		redirect('/');
	}

}

//end of main controller