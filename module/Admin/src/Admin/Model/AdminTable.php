<?php
namespace Admin\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Debug\Debug;

class AdminTable extends AbstractTableGateway
{
    
   protected $table ='users';
   
   public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
		$this->initialize();
    }
	
	public function coursesNameModel($data)
    {
		
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('courses');
		$select->where->like('name', '%'.$data->name.'%');
 	    $select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$select = $sql->select();
					$select->from('saved_job_searches');
					$select->where(array('user_id' => $rows[$key]['user_id']));
					$select->getSqlString($this->adapter->getPlatform());
					$result =$this->executeSelect($select);
					$rows_job_searches = array_values(iterator_to_array($result));
					foreach($rows_job_searches as $key=>$value)
					{
					$response[] = array('Relevant Keywords' =>$value->keywords,
					'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
	public function allCountModel()
    {
		
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('users');
		$select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		
		$select1 = $sql->select();
		$select1->from('employer');
		$select1->getSqlString($this->adapter->getPlatform());
		$result1 =$this->executeSelect($select1);
		
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
			echo "Candidates=".$result->count();	
			echo "   Employers=".$result1->count();exit;
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
	public function editcoursesNameModel($setdata,$where)
    {
		
        $sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('courses');
		$update->set($setdata);
		$update->where($where);
	    $selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function deletecoursesNameModel($setdata,$where)
    {
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('courses');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function specializationNameModel($data)
    {
		
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('specializations_master');
		$select->where->like('name', '%'.$data->name.'%');
 	    $select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$select = $sql->select();
					$select->from('saved_job_searches');
					$select->where(array('user_id' => $rows[$key]['user_id']));
					$select->getSqlString($this->adapter->getPlatform());
					$result =$this->executeSelect($select);
					$rows_job_searches = array_values(iterator_to_array($result));
					foreach($rows_job_searches as $key=>$value)
					{
					$response[] = array('Relevant Keywords' =>$value->keywords,
					'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
	public function editspecializationNameModel($setdata,$where)
    {
		
        $sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('specializations_master');
		$update->set($setdata);
		$update->where($where);
	    $selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function deletespecializationNameModel($setdata,$where)
    {
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('specializations_master');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function collegeNameModel($data)
    {
		
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('academic_institutions');
		$select->where->like('college_name', '%'.$data->college_name.'%');
 	    $select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$select = $sql->select();
					$select->from('saved_job_searches');
					$select->where(array('user_id' => $rows[$key]['user_id']));
					$select->getSqlString($this->adapter->getPlatform());
					$result =$this->executeSelect($select);
					$rows_job_searches = array_values(iterator_to_array($result));
					foreach($rows_job_searches as $key=>$value)
					{
					$response[] = array('Relevant Keywords' =>$value->keywords,
					'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
	public function editcollegeNameModel($setdata,$where)
    {
		
        $sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('academic_institutions');
		$update->set($setdata);
		$update->where($where);
	    $selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function deletecollegeNameModel($setdata,$where)
    {
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('academic_institutions');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
    public function universityNameModel($data)
    {
		
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('educational_graduation');
		$select->where(array('university_name' => $data->university_name));
 	    $select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$select = $sql->select();
					$select->from('saved_job_searches');
					$select->where(array('user_id' => $rows[$key]['user_id']));
					$select->getSqlString($this->adapter->getPlatform());
					$result =$this->executeSelect($select);
					$rows_job_searches = array_values(iterator_to_array($result));
					foreach($rows_job_searches as $key=>$value)
					{
					$response[] = array('Relevant Keywords' =>$value->keywords,
					'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
	public function editUniversityNameModel($setdata,$where)
    {
		
        $sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('educational_graduation');
		$update->set($setdata);
		$update->where($where);
	    $selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function deleteUniversityNameModel($setdata,$where)
    {
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('educational_graduation');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
	   return $response;
    }
	
	public function appliedJobsTable($data)
    {
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('applied_jobs');
		$select->where(array('job_id' => $data->jobID));
 	    $select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$select = $sql->select();
					$select->from('users');
					$select->where(array('id' => $rows[$key]['user_id']));
					$select->getSqlString($this->adapter->getPlatform());
					$result =$this->executeSelect($select);
					$rows_users = array_values(iterator_to_array($result));
					foreach($rows_users as $key=>$value)
					{
					$response[] = array('First Name' =>$value->first_name,
					'Last Name' => $value->last_name,
					'Email ID' => $value->email_id,
					'Address1' => $value->address1,
					'Address2' => $value->address2,'Country' => $value->Country,
					'State' => $value->state,
					'City' => $value->city,
					'Area' => $value->area,
					'Postal Code' => $value->postal_code,
					'Gender' => $value->gender,
					'Phone' => $value->phone,
					'Mobile' => $value->mobile,'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
public function statesMasterTable($data)
    {
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('states_master');
		$select->where(array('country_id' => $data->country_id));
		 $select->getSqlString($this->adapter->getPlatform()); 
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				
					foreach($rows as $key=>$value)
					{
						
					$response[] = array('stateId' =>$value->id,'name' =>$value->name,
					'status' => 'success');
					}
					
				
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
	
public function citiesMasterTable($data)
    {
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('cities_master');
		$select->where(array('state_id' => $data->state_id));
		$select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					foreach($rows as $key=>$value)
					{
					$response[] = array('cityId'=>$value->id,'name' =>$value->name,
					'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }
	
public function areasMasterTable($data)
    {
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('areas_master');
		$select->where(array('city_id' => $data->city_id));
		$select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					foreach($rows as $key=>$value)
					{
					$response[] = array('Area Name' =>$value->name,
					'status' => 'success');
					}
					
				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
    }

	public function countriesMasterTable($data)
    {
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('country_master');
		$select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				
					foreach($rows as $key=>$value)
					{
						
					$response[] = array('id' =>$value->id,'name' =>$value->name,
					'status' => 'success');
					}
					
				
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }
//print_r($response); exit;
        return $response;
    }
public function adminManageCandidateModel()
{
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  //$select->where(array('featured' => 1));
	  $select->order('created_at DESC');
	  $select->limit(10);
	  //echo $select->getSqlString($this->adapter->getPlatform()); exit;
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();
	  try 
	  {	
	  if ($result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$response[] = array('First Name' => $value->first_name,
					'Last Name' => $value->last_name,
					'Email ID' => $value->email_id,
					'Password' => $value->password,
					'User Type' => $value->user_type,
					'Token' => $value->token,
					'Address 1' => $value->address1,
					'Address 2' => $value->address2,
					'Country' => $value->country,
					'State' => $value->state,
					'City' => $value->city,
					'Area' => $value->area,
					'Postal Code' => $value->postal_code,
					'Latitude' => $value->latitude,
					'Longitude' => $value->longitude,
					'Gender' => $value->gender,
					'Birthdate' => $value->birthdate,
					'Phone' => $value->phone,
					'Phone 2' => $value->phone2,
					'Phone 3' => $value->phone3,
					'Mobile' => $value->mobile,
					'Mobile 2' => $value->mobile2,
					'Mobile 3' => $value->mobile3,
					'Profile Picture' => $value->profile_picture,
					'Blood Group ID' => $value->blood_group_id,
					'Blood Donation' => $value->blood_donation,
					'Verfication Code' => $value->verification_code,
					'Is verified' => $value->is_verified,
					'Last Login' => $value->last_login,
					'Role Default ID' => $value->role_default_id,
					'Secret Question' => $value->secret_question,
					'Secret Answer' => $value->secret_answer,
					'Is Profile Completed' => $value->is_profile_completed,
					'Is Profile MS Completed' => $value->is_profile_ms_completed,
					'Created By' => $value->created_by,
					'Created At' => $value->created_at,
					'IS Active' => $value->is_active,
					'Modified By' => $value->modified_by,
					'Modified At' => $value->modified_at,'status' => 'success');

				}
				
			}
			else
			{
				$response = array('errorCode' => 513);
			}
			

	  }
	  catch(\Exception $e) {
		  $msg = $e->getMessage();
			if(strpos($msg, "1062") !== false) {
				$response = array('errorCode' => 520,'status' => 'failure');
			}
		}
return $response;
}

public function manageEmployerSelectModel()
{     
//echo "fds"; exit;
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('employer');
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	 // print_r($result); exit;
	  $rows = array_values(iterator_to_array($result));
	  //print_r($rows); exit;
	  $response=array();
	  try
	  {	
				foreach($rows as $key=>$value)
				{
					//echo $value->company_id; exit;
					$response[] = array('Company Name' =>$value->company_name,'Name' => $value->company_short_name,
					'Email ID' => $value->email_id,
					'Password' => $value->password,
					'Token' => $value->token,
					'Position' => $value->position,
					'Company Type' => $value->company_type,
					'Website URL' => $value->website_url,
					'Industry' => $value->industry,
					'Company Description' => $value->company_discription,
					'Logo' => $value->logo,
					'Linked IN URL' => $value->linkedin_url,
					'Facebook URL' => $value->facebook_url,
					'Twitter URL' => $value->twitter_url,
					'Is Mail Send' => $value->is_mail_send,
					'Address 1' => $value->address1,
					'Address 2' => $value->address2,
					'Country' => $value->country,
					'State' => $value->state,
					'City' => $value->city,
					'Area' => $value->area,
					'Postal Code' => $value->postal_code,
					'Latitude' => $value->latitude,
					'Longitude' => $value->longitude,
					'Phone' => $value->phone,
					'Phone 2' => $value->phone2,
					'Phone 3' => $value->phone3,
					'Profile Picture' => $value->profile_picture,
					'Verfication Code' => $value->verification_code,
					'Is verified' => $value->is_verified,
					'Last Login' => $value->	last_login,
					'Secret Question' => $value->secret_question,
					'Secret Answer' => $value->secret_answer,
					'Is Profile Completed' => $value->is_profile_completed,
					'Created By' => $value->created_by,
					'Created At' => $value->	created_at,
					'IS Active' => $value->is_active,
					'Modified By' => $value->modified_by,
					'Modified At' => $value->modified_at,'status' => 'success');
				}
				

	  }
	  catch(\Exception $e) {
		  $msg = $e->getMessage();
			if(strpos($msg, "1062") !== false) {
				$response = array('errorCode' => 520,'status' => 'failure');
			}
		}
return $response;
}

public function adminBannersModel()
{     
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('banners');
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	 // print_r($result); exit;
	  $rows = array_values(iterator_to_array($result));
	  //print_r($rows); exit;
	  $response=array();
	  try
	  {	
				foreach($rows as $key=>$value)
				{
					//echo $value->company_id; exit;
					$response[] = array('title' =>$value->title,
					'Description' => $value->description,
					'Banner Group' => $value->banner_group,
					'Display Time' => $value->display_time,
					'Price' => $value->price,
					'Redirect Link' => $value->redirect_link,
					'Banner File Path' => $value->banner_file_path,
					'Activation Start Date' => $value->activation_start_date,
					'Contact Name' => $value->contact_name,
					'Contact Email ID' => $value->contact_email_id,
					'Contact Number' => $value->contact_number,
					'Created By' => $value->created_by,
					'Created At' => $value->created_at,
					'Modified By' => $value->modified_by,
					'Modified At' => $value->modified_at,'Is Active' => $value->is_active,'status' => 'success');
				}
				

	  }
	  catch(\Exception $e) {
		  $msg = $e->getMessage();
			if(strpos($msg, "1062") !== false) {
				$response = array('errorCode' => 520,'status' => 'failure');
			}
		}
return $response;
}

public function adminaddjobsModel($setdata,$setdata_settings)
    {
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('jobs_contact_info');
		$insert->values($setdata_projects);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('jobs_settings');
		$insert->values($setdata_details);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		 		 
		if($result){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}

     
}