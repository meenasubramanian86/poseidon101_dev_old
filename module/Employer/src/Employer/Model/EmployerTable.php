<?php
namespace Employer\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Debug\Debug;

class EmployerTable extends AbstractTableGateway
{
    
   protected $table ='users';
   public $id;
   //public $doctor_id;
	
	 public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
		$this->initialize();
    }
		
	//login
	public function saveLogin($data)
    {
        $password =  md5($data->password);
		$sql = "SELECT * FROM `employer` WHERE email_id = '".$data->email_id."' AND password ='".$password."'";	  // Check its already there or not  //  echo $sql; exit;
        $statement  = $this->adapter->query($sql);
        $result =  $statement->execute();
        $rows = array_values(iterator_to_array($result));
		$response=array();
        try
        {
			if ( $result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$response = array('Company Name' => $rows[$key]['company_name'],'Company Short Name' => $rows[$key]['company_short_name'],'status' => 'success');
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
	
 	public function deleteEmployerRegistration($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('employer');
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

public function addEmployerRegistration($setdata)
    {
 		$password =  md5($setdata['password']);
        $sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from('employer');
		$select->where(array('email_id' => $setdata['email_id']));
		  $select->getSqlString($this->adapter->getPlatform());
		  $result =$this->executeSelect($select);
		  $rows = array_values(iterator_to_array($result));
		  $response=array();
        if ( $result->count() >= 1 ) {
            $response = array('errorCode' => 513); 
             return $response;
        }
        else
        {
        
        try
        {
			$sql = new Sql($this->adapter);
			$insert = $sql->insert('employer');
			$insert->values($setdata);
			$selectString = $sql->getSqlStringForSqlObject($insert);
			$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
            $lastId = $this->adapter->getDriver()->getLastGeneratedValue();  //  getting last inserted id
            $response = array('id'=> $lastId, 'CompanyName' => $setdata['company_name'],'CompanyShortName' => $setdata['company_short_name'] , 'token' => $setdata['token'],'status' => 'success');
        }
         catch(\Exception $e) {
            $msg = $e->getMessage();
            if(strpos($msg, "1062") !== false) {
              $response = array('errorCode' => 511);
            }
        }

        return $response;
        }
        
	}
	
	public function updateEmployerRegistration($setdata,$where)
    {
 		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('employer');
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
		
public function addemailTemplate($setdata)
    {
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('email_template');
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

public function updateemailTemplate($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('email_template');
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
public function deleteemailTemplate($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('email_template');
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
	
	public function addSMSTemplate($setdata)
    {
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('sms_template');
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

public function updateSMSTemplate($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('sms_template');
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
public function deleteSMSTemplate($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('sms_template');
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
	
	
	public function addSavedResumes($setdata)
    {
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('saved_resumes');
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

public function updateSavedResumes($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('saved_resumes');
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
public function deleteSavedResumes($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('saved_resumes');
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
	
public function addSavedResumesSearches($setdata)
    {
		//echo "dddd"; exit;
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('saved_resume_searches');
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

public function updateSavedResumesSearches($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('saved_resume_searches');
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
public function deleteSavedResumesSearches($setdata,$where)
    {
 		
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('saved_resume_searches');
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
	
    public function changePasswordSelectModel($data,$id)
   {
		$sql = "SELECT * FROM `employer` WHERE token ='".$data->token."' AND email_id = '".$data->email_id."' AND id = '".$id."' AND password ='".$data->password."'"; // Check its already there or not  //  echo $sql; exit;
        $statement  = $this->adapter->query($sql);
        $result =  $statement->execute();
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
			$update->table('employer');
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

public function addemployerAccountsAction($setdata)
    {
		
 		$sql = new Sql($this->adapter);
		$insert = $sql->insert('employer_accounts');
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

	public function updateemployerAccountsAction($setdata,$where)
    {
		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('employer_accounts');
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
	
	public function deleteemployerAccountsAction($setdata,$where)
    {
		$sql = new Sql($this->adapter);
		$delete = $sql->delete();
		$delete->FROM('employer_accounts');
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
	
public function manageJobsSelectModel()
{     
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('jobs');
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();
	  try
	  {	
				foreach($rows as $key=>$value)
				{
					//echo $value->company_id; exit;
					$response[] = array('company_id' =>$value->company_id,'Name' => $value->name,'Description' => $value->description,'DetailDescription' => $value->detail_description,'Interview Area' => $value->interview_area,'Interview City' => $value->interview_city,
					'Interview Latitude' => $value->interview_lat,
					'Interview Longtitude' => $value->interview_long,
					'Comments' => $value->comments,
					'Contact Person' => $value->contact_person,
					'Contact Number' => $value->contact_number,
					'Contact Address' => $value->contact_address,
					'Interview Time' => $value->interview_time,
					'Interview Type' => $value->interview_type,
					'Experience From' => $value->experience_from,
					'Experience To' => $value->experience_to,
					'Functional Area' => $value->fuctional_area,
					'Skills' => $value->skills,
					'Profile Name' => $value->profile_name,
					'Created By' => $value->created_by,
					'Created At' => $value->created_at,
					'Modified By' => $value->modified_by,
					'Modified At' => $value->modified_at,'Featured' => $value->featured,'status' => 'success');
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



}
