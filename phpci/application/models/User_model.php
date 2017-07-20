<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function user_insert($email,$name,$pwd,$gender,$province){
			// $now=time();
			$arr=array(
				'ACCOUNT'=>$email,
				'NAME'=>$name,
				'PASSWORD'=>$pwd,
				// 'pwd2'=>$pwd2,
				'GENDER'=>$gender,
				'PROVINCE'=>$province,
				// 'BIRTHDAY'=>now(),
			);
			
			$query=$this->db->insert('t_users',$arr);
			
			return $query;
		}	
		public function ref_get($email){
			$arr=array(
				'NAME'=>$email,
			);
			$query=$this->db->get_where('t_users',$arr);
			return $query->row();
		}
		public function sel_login($email,$pwd){
			$arr=array(
				'NAME'=>$email,
				'PASSWORD'=>$pwd,
			);
			$query=$this->db->get_where('t_users',$arr);
			return $query->row();
		}
		public function countall($id){
			if($id){
				$this->db->select('*');
				$this->db->from('t_blogs');
				$this->db->where('CATALOG_ID',$id);
				$query=$this->db->get();
				$allnum=$query->num_rows();
			}else{
				$allnum=$this->db->count_all_results('t_blogs');
			}
			
			return $allnum;
		}
		public function blog_all_fen($id,$per_page,$page){
			// $sql="select * from t_blogs";
			$this->db->select('*');
			$this->db->from('t_blogs');
			$this->db->join('t_blog_catalogs','t_blog_catalogs.CATALOG_ID=t_blogs.CATALOG_ID');
			$this->db->limit($per_page,$page);
			// $query=$this->db->query($sql);
			if($id){
				$this->db->where('t_blogs.CATALOG_ID',$id);
			}
			$query=$this->db->get();
			$result=$query->result();
			return $result;
		}

		public function blog_cata_all(){
			// $sql="select * from t_blogs";
			$this->db->select('*');
			$this->db->from('t_blog_catalogs');
			$query=$this->db->get();
			$result=$query->result();
			return $result;
		}
		public function blog_one($id){
			// $sql="select * from t_blogs";
			$this->db->select('*');
			$this->db->from('t_blogs');
			$this->db->where('BLOG_ID',$id);
			$query=$this->db->get();
			$result=$query->row();
			return $result;
		}
		public function blog_in($title,$catalog,$content,$type,$privacy,$deny_comment){
			// $now=time();
			$arr=array(
				'TITLE'=>$title,
				'WRITER'=>$_COOKIE['id'],
				'CATALOG_ID'=>$catalog,
				'CONTENT'=>$content,
				'ADD_TIME'=>date("Y-m-d h:i:s"),
				'CLICK_RATE'=>$privacy,
				'IS_YOURS'=>$type,
				'COMM_RATE'=>$deny_comment,
			);
			
			$query=$this->db->insert('t_blogs',$arr);
			
			return $query;
		}	
		
	}


?>