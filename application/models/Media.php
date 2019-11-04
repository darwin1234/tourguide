<?php

class Media extends CI_Model{
	
	public function records($userID){
		$query = $this->db->query("SELECT * FROM media  WHERE id_no='".$userID."' ORDER BY image_id asc");
		return $query->result();	
	}
	
	public function useraccount($userID){
		
		
		$this->db->select('*');
		$this->db->from('records');
		$this->db->where('id_no', $userID);
		$query = $this->db->get();
		return $query->result();
		
	}
	


		
	public function fetchRecords($username){
		/*
		$this->db->select('*');
		$this->db->from('ccc_desciples_list');	
		$this->db->where('id', $username);
		$query = $this->db->get();
		return $query->result();*/
	}
	
	public function insertRecords($username,$password,$retypepassword,$accountID,$userRole){

		$this->db->select("*");
		$this->db->from("records");
		$this->db->where("username",$username);
		$query = $this->db->get();
		
		if($password!=$retypepassword){
			
			echo "Password Not Match";
			
		}else{
			
			if($query->num_rows() == 1){
				echo "Username Already Exist";
				return false;
			}else{
				$this->db->where('id_no',$accountID);
				$this->db->update('records',
					array(
						'added_as_close_cell' => 1,
						'username'   		  => $username,
						'password'			  => $password,
						'role'				  => $userRole
					)
				);
			
			}
			
			
			
		}
		
		
		
		
		
							
	}
	
	
	
	public function updatepersonal($userID){
		

		$filename 					= @$_FILES['image']['name'];
		$base_url					= $this->input->post('base_url');
		$birthdate					= $this->input->post('birthdate');
		$config['upload_path'] 		= './images';
		$config['allowed_types']	= 'jpg|jpeg|gif|png';
		$new_name = time().'_' . $userID . '_' .@$_FILES['image']['name'];
		$config['file_name'] = $new_name; 
		$this->load->library('upload', $config);
		
			if(!empty($filename)){
					if($this->upload->do_upload('image')){
					
						$userID				= $this->input->post('userID');

						
						$records = array(
							'first_name'		=>	$this->input->post('first_name'),
							'maiden_name'		=>	$this->input->post('maiden_name'),
							'last_name'			=>  $this->input->post('last_name'),
							'birthmonth'		=>	$this->input->post('birthday_month'),
							'birthdate'			=>	$this->input->post('birthday_day'),
							'birthyear'			=>	$this->input->post('birthday_year'),
							'address'			=>	$this->input->post('Address'),
							'contact'			=>	$this->input->post('CellNumber'),
							'email'				=>	$this->input->post('EmailAddress'),
							'civil_status'		=>  $this->input->post('civil_status'),
							'work'				=>  $this->input->post('ProfesionalSkills'),
							'wedding_month'		=>  $this->input->post('wedding_month'),
							'wedding_date'		=>	$this->input->post('wedding_date'),
							'wedding_year'		=>  $this->input->post('wedding_year'),
							'spouse_name'		=>  $this->input->post('SpouseName'),
							'profile_pic'		=>  $config['file_name'],
						);
						$this->db->where('id_no', $userID);
						$this->db->update('records',$records);
						
					}
			}else{
				
					
						$userID				= $this->input->post('userID');
						$records = array(
								'first_name'		=>	$this->input->post('first_name'),
								'maiden_name'		=>	$this->input->post('maiden_name'),
								'last_name'			=>  $this->input->post('last_name'),
								'birthmonth'		=>	$this->input->post('birthday_month'),
								'birthdate'			=>	$this->input->post('birthday_day'),
								'birthyear'			=>	$this->input->post('birthday_year'),
								'address'			=>	$this->input->post('Address'),
								'contact'			=>	$this->input->post('CellNumber'),
								'email'				=>	$this->input->post('EmailAddress'),
								'civil_status'		=>  $this->input->post('civil_status'),
								'work'				=>  $this->input->post('ProfesionalSkills'),
								'wedding_month'		=>  $this->input->post('wedding_month'),
								'wedding_date'		=>	$this->input->post('wedding_date'),
								'wedding_year'		=>  $this->input->post('wedding_year'),
								'spouse_name'		=>  $this->input->post('SpouseName')
						);
						$this->db->where('id_no', $userID);
						$this->db->update('records',$records);
				
				
				
				
			}		
			
			
				
	}
	
	public function ConsolidateTo(){
		
		$leaderID = $this->input->post('leaderID');
		$ID 	  = $this->input->post('ID');
		
		$data = array(
			'mentor_id'	=> $leaderID	
			
		);
		
		$this->db->where('id_no', $ID);
		$this->db->update('records',$data);
				
	
	}
	
	public function getRecordsDisplay($primary_search){
		
			if(!empty($primary_search)){
			
				$query = $this->db->query("SELECT * FROM records WHERE CONCAT(`first_name`, ' ', `last_name`) LIKE '%{$primary_search}%' ORDER BY first_name ASC");
			}else{
				
				$query = $this->db->query("SELECT * FROM records ORDER BY first_name ASC");
			}
			
	
		
		
		return $query->result();
		
	}
	
	public function Consolidate($openCellCompletion,$visitorID){
		
		
		$formNumber = $this->input->post('formNumber');
		if($formNumber == 1){
				$data = array(
					'ConDone1' => json_encode($openCellCompletion)
				);
		}
		if($formNumber == 2){
				$data = array(
					'ConDone2' => json_encode($openCellCompletion)
				);
		}
		if($formNumber == 3){
				$data = array(
					'ConDone3' => json_encode($openCellCompletion)
				);
		}
		
		if($formNumber == 4){
				$data = array(
					'ConDone4' => json_encode($openCellCompletion)
				);
		}
		$this->db->where('id_no', $visitorID);
		$this->db->update('records', $data);
		//echo var_dump($data); 
		
		
	}
	
	public function chart(){
		
		
		$this->db->select('*');
		$this->db->from('records');
		$query = $this->db->get();
		return $query->result();	
		
	}
	
	
	public function searchForm(){
		$searchdisciples	= $this->input->post('searchdisciples');
		$level				= $this->input->get('level');
		$level_in_post		= $this->input->post('level_in_post');
		$query = $this->db->query("SELECT * FROM records WHERE CONCAT(`first_name`, ' ', `last_name`) LIKE '%{$searchdisciples}%'");
		//return $query;
		$list_of_records = $query->result();
		echo "<table style='width:100%;'>";
		 foreach(@$list_of_records as $records){
		 			?>
					<tr>
					<td class="title"><a href="<?php echo base_url();?>Welcome/desciples/<?php echo $records->id_no; ?>"><?php echo $records->first_name. ' '. $records->maiden_name. ' '. $records->last_name;?></a></td>
					<td class="date"><a href="#" data-toggle="modal" data-target="#myModal_<?php echo $records->id_no; ?>"  > 1</a></td>
					<td><a href="#">Edit</a></td>
					</tr>
					<?php 
		 }	
		echo "</table>"; 
	}
	
	public function enroll(){
		
		$id_no 			= $this->input->post('id_no');
		//$enroll_val		= $this->input->post('level');
		$visited = $this->input->post('level');
		
		if($visited == 4){$en = 1;}
		if($visited == 5){$en = 3;}
		if($visited == 6){$en = 5;}
		if($visited == 7){$en = 7;}
		if($visited == 8){$en = 9;}
		if($visited == 9){$en = 11;}
		if($visited == 10){$en = 13;}
		
		
		
		$data = array(
			'enrolled'	=> $en	 
			
		);
		
		$this->db->where('id_no', $id_no);
		$this->db->update('records',$data);
		
				
	}
	
	public function unenroll(){
		
		$id_no 			= $this->input->post('id_no');
		$enroll_val		= $this->input->post('enroll_val');
		
		$data = array(
			'enrolled'	=> $enroll_val
			
		);
		
		$this->db->where('id_no', $id_no);
		$this->db->update('records',$data);
		echo "Success";
				  
	} 
	
	
	public function active_action($userID,$activestatuschance){
		$data = array(
			"active" =>$activestatuschance
			 
		);
		$this->db->where("id_no" , $userID );
		$this->db->update('records',$data);
		
		
	}
	
	public function transfer_to(){
		 
		
		$admin_transer_to	= $this->input->post('admin_transer_to');
		$id_no				= $this->input->post('id_no');
		$Gender				= $this->input->post('Gender');
		$level_in_post		= $this->input->post('level_in_post');
		$query = $this->db->query("SELECT * FROM records WHERE CONCAT(`first_name`, ' ', `last_name`) LIKE '%{$admin_transer_to}%' LIMIT 30");
		$val = $query->result();
		

		echo "<ul id='listofData'>";
		foreach($val as $valfields){
			
			if($valfields->added_as_close_cell == 1 && $valfields->Gender == $Gender && $valfields->id_no !== $id_no ){
				//if($valfields->Gender == $Gender){
					?>
						<li style="text-align:left;" ><a href="javascript:void();" onclick="CCCSystem.PrimaryLeader('<?php echo $valfields->first_name . ' ' . $valfields->maiden_name . ' ' . $valfields->last_name; ?>','<?php echo $valfields->id_no; ?>','<?php echo $valfields->role?>');" FullnameAttr="<?php echo $valfields->first_name . ' ' . $valfields->maiden_name . ' ' . $valfields->last_name; ?>" usernameAttr="<?php echo $valfields->id_no; ?>"><?php echo $valfields->first_name . ' ' . $valfields->maiden_name . ' ' . $valfields->last_name; ?></a><span style="float:right;"><?php echo  $valfields->role; ?></span></li>
					<?php 
				//}
			
			}
			
		}
		echo "</ul>";
		
		
	}
	
	
	public function display_record_for_attendance($userID){
		$this->db->select('*');
		$this->db->from('records');
		$this->db->where('mentor_id', $userID);
		$query = $this->db->get();
		return $query->result();
		
		
	}
	
	
	public function attend(){
		$dateAttended		= $this->input->post("dateAttended");
		$userID				= $this->input->post("userID");
		$servicesAttended	= $this->input->post('servicesAttended');
		
		$query 		= $this->db->query("SELECT * FROM attendance WHERE date_t = '".$dateAttended."' AND user_id='".$userID."' AND services_attended='".$servicesAttended."'");
		$attended   = $query->result();
		//Saturday ReMYX 	= 1
		//Sunday Services 	= 2
		//Remyx: 5pm		= 3
		//Sunday			= 4
		
		
		if(count($attended) == 1){
			
				$attendedTrueorfalse = 1;
			
		}else{
			
			$attendanceInput = array(
				"date_t"				=>	$dateAttended,	
				"services_attended"		=>  $servicesAttended,
				"user_id"				=> 	$userID,	
			);
		
			$this->db->insert('attendance',$attendanceInput); 
			$attendedTrueorfalse = 0;
			
		}
		
		return $attendedTrueorfalse;
		
	}
	
	public function tickattendance(){
		
			$this->db->select('*');
			$this->db->from('attendance');
			$query = $this->db->get();
			return $query->result();	
		
	}
	
	public function transferto($iduser,$his_id,$userrole){

		
		return $iduser;
		//echo $iduser . " -" . $his_id . "- " . $userrole;
		/*if($userrole == "Primary Leader"){$yourRole = '144';}
		if($userrole == "144"){$yourRole =  "1728";}
		if($userrole == "1728"){$yourRole = "20736";}
		
		
		  
		
		
		$data = array(
			"mentor_id" =>$iduser,
			"role"  =>  $yourRole
		);
		$this->db->where("id_no" , $his_id );
		$this->db->update('records',$data);
		*/
		
	}
	public function changeprofilepic($userID,$image){
		$records = array(
							"image_pic" =>$image
					);
		$this->db->where('id_no', $userID);
		$this->db->update('records',$records);
				
		return $userID;
		
	}
	
	public function image_x($uid){
		$query = $this->db->query("SELECT * FROM records WHERE id_no='".$uid."'");
		return $query->result();	
		
	}
	
	public function EditAccountInformation($userID,$first_name,$maiden_name,$last_name,$EmailAddress,$CellNumber,$ProfesionalSkills,$Address){
		
		/*
		$records = array(
			'id_no' 		=> $userID,
			'first_name'	=> $first_name,
			'maiden_name'	=> $maiden_name,
			'last_name'		=> $last_name,
			'email'			=> $EmailAddress,
			'contact'		=> $CellNumber,
			'work'			=> $ProfesionalSkills,
			'address'		=> $Address
			
		);
		*/
		
		$records = array(
			'first_name'		=>	$this->input->post('first_name'),
			'maiden_name'		=>	$this->input->post('maiden_name'),
			'last_name'			=>  $this->input->post('last_name'),
			'birthmonth'		=>	$this->input->post('birthday_month'),
			'birthdate'			=>	$this->input->post('birthday_day'),
			'birthyear'			=>	$this->input->post('birthday_year'),
			'address'			=>	$this->input->post('Address'),
			'contact'			=>	$this->input->post('CellNumber'),
			'email'				=>	$this->input->post('EmailAddress'),
			'civil_status'		=>  $this->input->post('civil_status'),
			'work'				=>  $this->input->post('ProfesionalSkills')
		);
		
		$this->db->where('id_no', $userID);
		$this->db->update('records',$records);
		
	}
		
	
}