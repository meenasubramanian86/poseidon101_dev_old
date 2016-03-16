<?php
namespace Users\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;

use Zend\View\Model\ViewModel;
use Employer\Form\EmployerForm;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\ResultSet\ResultSet;

use Zend\Debug\Debug;


class UsersTable extends AbstractTableGateway
{
    protected $table ='users';
   //public $id;
   //public $doctor_id;
	
	public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
		$this->initialize();
    }
public function latestJobsSelectModel()
{
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('jobs');
	 // $select->where(array('id' => $id),desc);
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
					$response[] = array('Company ID' => $value->company_id,'Company Name' => $value->name,'Interview Time' => $value->interview_time,'Created At' => $value->created_at,'status' => 'success');
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

public function featuredJobsSelectModel()
{
		  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('jobs');
	 $select->where(array('featured' => 1));
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
					$response[] = array('Company ID' => $value->company_id,'Company Name' => $value->name,'Interview Time' => $value->interview_time,'Created At' => $value->created_at,'status' => 'success');
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


public function featuredCompaniesSelectModel()
{
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('companies');
	 $select->where(array('featured' => 1));
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
					$response[] = array('Company ID' => $value->id,'Company Name' => $value->company_name,'Logo' => $value->logo,'Created At' => $value->created_at,'status' => 'success');
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

    public function addSavedJobsSearches($setdata)
    {
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('saved_job_searches');
		$insert->values($setdata);
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
	
	
	public function updateSavedJobsSearches($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('saved_job_searches');
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
	
	public function deleteSavedJobsSearches($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('saved_job_searches');
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
	public function addSavedJobs($setdata)
    {
		
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('saved_jobs');
		$insert->values($setdata);
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
	
	public function updateSavedJobs($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('saved_jobs');
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
	
	public function deleteSavedJobs($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('saved_jobs');
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
	
public function updateMyAccountAction($data,$id)
    {
		
		
       try {
		$tableName = "users";
		$selectsql="select * from `{$tableName}` where `token` = '".$data->token."' AND `user_id` = '".$id."'";
		$statement  = $this->adapter->query($selectsql);
        $result =  $statement->execute();
		if($result->count()===1)
		{
			
			$data = array(
			'profiletitle' => $data->profiletitle,
			'user_first_name' => $data->user_first_name,
			'user_last_name' => $data->user_last_name,
			'user_email_id' => $data->user_email_id,
			'user_mobile' => $data->user_mobile,
			'companyName' => $data->companyName,
			'Designation' => $data->Designation,
			'Salary' => $data->Salary,
			'Location' => $data->Location,
			'preferredlocations' => $data->preferredlocations,
			'expectedsalary' => $data->expectedsalary,
			'desiredPosition' => $data->desiredPosition,
			'skypeid' => $data->skypeid,
			'visaStatus' => $data->visaStatus,
			'certification' => $data->certification,
			'certificationDate' => $data->certificationDate,
			'skills' => $data->skills,
			'version' => $data->version,
			'yearLastUsed' => $data->yearLastUsed,
			'expertise' => $data->expertise,
			'client' => $data->client,
			'yourRole' => $data->yourRole,
			'duration' => $data->duration,
			'skillUsed' => $data->skillUsed
			);
            
		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('saved_jobs');
		$update->set($data);
		$where =$id;
		$update->where($where);
		$selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');
		return $response;
		}
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token Error');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
       return $response;
    }
public function deleteMyAccountAction($data,$id)
{
	try 
	{
		$tableName = "users";
		$selectsql="select * from `{$tableName}` where `token` = '".$data->token."' AND `user_id` = '".$id."'";
		$statement  = $this->adapter->query($selectsql);
		$result =  $statement->execute();
		if($result->count()===1)
		{
 		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('users');
		$where =$id;
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');
		return $response;
		}
		else
		{
				$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token Error');
				return $response; 
		}
	}catch(\Exception $e) {
		$msg = $e->getMessage();
		if(strpos($msg, "1062") !== false) {
			$response = array('errorCode' => 520,'status' => 'failure');
		}
	}
return $response;
}	
public function updateJobdescAction($setdata,$id,$token,$setdata_jobs)
    {
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('id' => $id,'token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();
	  try 
	  {	
	  if ($result->count() >= 1 ) { 
			$sql = new Sql($this->adapter);
			$update = $sql->update('personal_details');
			$update->set($setdata);
			$update->where($id);
			$selectString = $sql->getSqlStringForSqlObject($update);
			$update->getSqlString($this->adapter->getPlatform());
			$update = $sql->update('jobs');
			$update->set($setdata_jobs);
			$update->where($id);
			$selectString = $sql->getSqlStringForSqlObject($update);
			$update->getSqlString($this->adapter->getPlatform());
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
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
public function deleteJobdescAction($setdata,$id,$token,$setdata_jobs)
{
	
		$sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('id' => $id,'token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();
	  try 
	  {	
	  if ($result->count() >= 1 ) { 

			$sql = new Sql($this->adapter);
			$delete = $sql->delete();
			$delete->FROM('personal_details');
			$delete->where($id);
			$selectString = $sql->getSqlStringForSqlObject($delete);
			$delete->getSqlString($this->adapter->getPlatform());
			
			$delete = $sql->delete();
			$delete->FROM('jobs');
			$delete->where($id);
			$selectString = $sql->getSqlStringForSqlObject($delete);
			$delete->getSqlString($this->adapter->getPlatform());
			$response = array('Success' => 'Success');
			return $response;
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
		

public function changePasswordSelectModel($data,$id)
{
	
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('id' => $id,'token' => $data->token,'email_id'=>$data->email_id));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$password =  md5($data->password);	
			$data = array(
			'password' => $password,
			);
			$sql = new Sql($this->adapter);
			$update = $sql->update();
			$update->table('users');
			$update->set($data);
			$where = array();
			$where['id']  = $id;
			$update->where($where);
			$selectString = $sql->getSqlStringForSqlObject($update);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token/Email ID is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
}

	public function insertprofessionalDetailsAction($setdata_details,$setdata_projects,$token)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);

	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('professional_projects');
		$insert->values($setdata_projects);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('professional_details');
		$insert->values($setdata_details);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}


	
	public function updateprofessionalDetailsAction($setdata_details,$setdata_projects,$token,$where)
    {
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$update = $sql->update('professional_projects');
		$update->set($setdata_projects);
		$update->where($where);
		$selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		
		$sql = new Sql($this->adapter);
		$update = $sql->update('professional_details');
		$update->set($setdata_details);
		$update->where($where);
		$selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
    }
public function deleteprofessionalDetailsAction($setdata_details,$setdata_projects,$token,$where)
{
	$sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('professional_projects');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		
		
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('professional_details');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
}

public function skillsUsedAction($data)
{
	
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('professional_projects');
	  $select->where(array('skills_used' => $data['skills_used']));
      $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  	foreach($rows as $key=>$value)
				{
					$response[] = array('User ID' => $value->user_id,'status' => 'success');
				}

	  $response=array();

	  try {

		
		if($result->count()>1)
		{
			$sql = new Sql($this->adapter);
			$select = $sql->select();
			$select->FROM('users');
			$select->where(array('id' => $value->user_id));
		    $select->getSqlString($this->adapter->getPlatform());
		    $result =$this->executeSelect($select);
		    $rows = array_values(iterator_to_array($result));
	        foreach($rows as $key=>$value)
			{
				$response[] = array('Name' => $value->first_name.''.$value->last_name,'EmailID' => $value->email_id,'Address' => $value->address1.''.$value->address2,'Country' => $value->country,'State' => $value->state,'City' => $value->city,'Area' => $value->area,'PostalCode' => $value->postal_code,'Gender' => $value->gender,
				'BirthDate' => $value->birthdate,
				'Mobile' => $value->mobile,
				'status' => 'success');
			}
			return $response;
        }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
}

public function insertpersonalDetailsAction($setdata,$token)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('personal_details');
		$insert->values($setdata);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}

public function updatepersonalDetailsAction($setdata,$token,$where)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {
		if($result->count()===1)
		{
			$sql = new Sql($this->adapter);
			$update = $sql->update('personal_details');
			$update->set($setdata);
			$update->where($where);
			$selectString = $sql->getSqlStringForSqlObject($update);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
	public function deletepersonalDetailsAction($setdata,$token,$where)
    {
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('personal_details');
		$delete->where($where);
		$selectString = $sql->getSqlStringForSqlObject($delete);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
}

public function inserteducationalcertificationAction($setdata,$token)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('educational_certification');
		$insert->values($setdata);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
	public function updateeducationalcertificationAction($setdata,$token,$where)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {
		if($result->count()===1)
		{
			$sql = new Sql($this->adapter);
			$update = $sql->update('educational_certification');
			$update->set($setdata);
			$update->where($where);
			$selectString = $sql->getSqlStringForSqlObject($update);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
	public function deleteeducationalcertificationAction($setdata,$token,$where)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {
		if($result->count()===1)
		{
			$sql = new Sql($this->adapter);
			$delete = $sql->delete();
			$delete->FROM('educational_certification');
			$delete->where($where);
			$selectString = $sql->getSqlStringForSqlObject($delete);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}


public function inserteducationalgraduationAction($setdata,$token)
	{
	
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$insert = $sql->insert('educational_graduation');
		$insert->values($setdata);
		$selectString = $sql->getSqlStringForSqlObject($insert);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$response = array('Success' => 'Success');

		return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
	public function updateeducationalgraduationAction($setdata,$token,$where)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {
		if($result->count()===1)
		{
			$sql = new Sql($this->adapter);
			$update = $sql->update('educational_graduation');
			$update->set($setdata);
			$update->where($where);
			$selectString = $sql->getSqlStringForSqlObject($update);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
	public function deleteeducationalgraduationAction($setdata,$token,$where)
	{
	  
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {
		if($result->count()===1)
		{
			$sql = new Sql($this->adapter);
			$delete = $sql->delete();
			$delete->FROM('educational_graduation');
			$delete->where($where);
			$selectString = $sql->getSqlStringForSqlObject($delete);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
			$response = array('Success' => 'Success');
			return $response;
         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    return $response; 
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
	public function visibilitySettingsAction($setdata,$user_id)
	{
	 // print_r($setdata); exit;
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('users');
	  $select->where(array('token' => $setdata->token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  try {

		
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$select = $sql->select();
 	    $select->from('visibility_settings');
		$select->where(array('user_id' => $user_id));
		$select->getSqlString($this->adapter->getPlatform());
		$result =$this->executeSelect($select);
		$rows = array_values(iterator_to_array($result));
		$response=array();
		//print_r($rows); exit;
	        foreach($rows as $key=>$value)
			{
				//print_r($value); exit;
				$response[] = array('Company_id' => $value->company_id,'status' => $value->status,
				);
			}

         }
		 else
		 {
			$response = array('status' => 'failure', 'errorCode' => 524, 'errorMessage' => 'Token is not in DB');
		    
		 }
	  }catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 520,'status' => 'failure');
            }
        }
return $response;
	}
	
    
	
}