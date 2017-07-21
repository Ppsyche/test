<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			$this->load->helper('captcha');
			$this->load->library('pagination');
		}
		public function cap(){
			$vals = array(
			    'word'      => rand(1000,9999),
			    'img_path'  => './captcha/',
			    'img_url'   => base_url().'captcha/',
			    'img_width' => '150',
			    'img_height'    => 30,
			    'expiration'    => 7200,
			    'word_length'   => 8,
			    'font_size' => 16,
			    'img_id'    => 'Imageid',
			    'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			    // White background and border, black text and red grid
			    'colors'    => array(
			        'background' => array(255, 255, 255),
			        'border' => array(255, 255, 255),
			        'text' => array(0, 0, 0),
			        'grid' => array(255, 40, 40)
			    )
			);

			$cap = create_captcha($vals);
			$_SESSION['code']="";
			$_SESSION['code']=$cap['word'];
			return $cap;
		}
		public function reg()
		{
			$cap=$this->cap();		
			$arr['data']=$cap;
			$this->load->view('reg',$arr);
		}
		public function do_reg(){
			$email=$this->input->post('email');
			$name=$this->input->post('name');
			$pwd=$this->input->post('pwd');
			$pwd2=$this->input->post('pwd2');
			$gender=$this->input->post('gender');
			$province=$this->input->post('province');
			$result=$this->user_model->ref_get($name);
			if($result){	
				// echo "Ã“ÃƒÂ»Â§Ã’Ã‘Â´Ã¦Ã”Ãš";
				// sleep(1000);
				redirect('user/reg');
			}else{
				$result=$this->user_model->user_insert($email,$name,$pwd,$gender,$province);
				if($result){
					// echo "Ã—Â¢Â²Ã¡Â³Ã‰Â¹Â¦";
					redirect('user/login');
				}else{
					// echo "Ã—Â¢Â²Ã¡ÃŠÂ§Â°Ãœ";
					redirect('user/reg');
				}
			}	
		}
		public function ajaxcheck(){
			$cap=$this->cap();
			echo $cap['filename'];
		}
		public function checkcode(){
			$val=$this->input->post('val');
			if($val==$_SESSION['code']){
				echo "success";
			}else{
				echo "fail";
			}
			
		}
		public function login()
		{
			$this->load->view('login');
		}
		public function do_login(){
			$email=$this->input->post('email');
			$pwd=$this->input->post('pwd');
			$result=$this->user_model->sel_login($email,$pwd);
			if($result){
				// echo "ÂµÃ‡Ã‚Â¼Â³Ã‰Â¹Â¦µÇÂ¼";
				$this->input->set_cookie('name',$email,time()+300);
				$this->input->set_cookie('id',$result->USER_ID,time()+300);
				redirect('user/index_logined');
				// echo "<script>location='".site_url('user/index_logined')."'</script>";
				// $this->load->view('index_logined');
			}else{
				// echo "ÂµÃ‡Ã‚Â¼ÃŠÂ§Â°Ãœ";
				$this->input->set_cookie('name','');
				$this->input->set_cookie('id','');
				redirect('user/login');
			}	
		}
		public function index_logined()
		{
			$id=$this->input->get('id');
			$allnum=$this->user_model->countall($id);
			
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['base_url']=$id?site_url("user/index_logined?id=".$id):site_url("user/index_logined");
			
			$config['total_rows'] = $allnum;
			$config['per_page'] = 3;
			

			$this->pagination->initialize($config);
			
			$page=$this->uri->segment(3)==null ? 0 : $this->uri->segment(3);
			
			$q=$this->input->get('q');

			$result=$this->user_model->blog_all_fen($id,$config['per_page'],$page,$q);
			if($result){
				$arr['data']=$result;
			}else{
				$arr['data']="";
			}
			$result=$this->user_model->blog_cata_all();
			if($result){
				$arr['data2']=$result;
			}else{
				$arr['data2']="";
			}
			$this->load->view('index_logined',$arr);

		}
		public function do_delete(){
			$id=$this->input->get('id');
			$result=$this->user_model->delete_blog($id);
			redirect('user/index_logined');
		}
		public function viewPost(){
			$id=$this->input->get('id');
			$result=$this->user_model->blog_one($id);
			if($result){
				$arr['data']=$result;
			}else{
				$arr['data']="";
			}
			$this->load->view('viewPost',$arr);
		}
		public function newBlog(){
			$result=$this->user_model->blog_cata_all();
			if($result){
				$arr['data']=$result;
			}else{
				$arr['data']="";
			}
			$this->load->view('newBlog',$arr);
		}
		public function do_blog(){
			$title=$this->input->post('title');
			$catalog=$this->input->post('catalog');
			$content=$this->input->post('content');
			$type=$this->input->post('type');
			$privacy=$this->input->post('privacy');
			$deny_comment=$this->input->post('deny_comment');
			$result=$this->user_model->blog_in($title,$catalog,$content,$type,$privacy,$deny_comment);
			redirect('user/index_logined');
		}
		public function adminIndex(){
			$this->load->view('adminIndex');
		}
		public function inbox(){
			$id=$_COOKIE['id'];
			$result=$this->user_model->inbox_forme($id);
			if($result){
				$arr['data']=$result;
			}else{
				$arr['data']="";
			}
			$this->load->view('inbox',$arr);
		}
		public function outbox(){
			$id=$_COOKIE['id'];
			$result=$this->user_model->outbox_forme($id);
			if($result){
				$arr['data']=$result;
			}else{
				$arr['data']="";
			}
			$this->load->view('outbox',$arr);
		}
		public function profile(){
			$id=$_COOKIE['id'];
			$result=$this->user_model->user_one($id);
			if($result){
				$arr['data']=$result;
			}else{
				$arr['data']="";
			}
			$this->load->view('profile',$arr);
		}
		public function update_user(){
			$id=$_COOKIE['id'];
			$name=$this->input->post('name');
			$gender=$this->input->post('gender');
			$y=$this->input->post('y');
			$m=$this->input->post('m');
			$d=$this->input->post('d');
			$birthday=$y."-".$m."-".$d;
			$province=$this->input->post('province');
			$city=$this->input->post('city');
			$signature=$this->input->post('signature');
			$result=$this->user_model->update_users($id,$name,$gender,$birthday,$province,$city,$signature);
			$this->profile();
		}
	}
?>