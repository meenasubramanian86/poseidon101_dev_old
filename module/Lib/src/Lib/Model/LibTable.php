<?php
namespace Lib\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Debug\Debug;

class LibTable extends AbstractTableGateway
{
    
   protected $table ='users';
   public $id;
   //public $doctor_id;
	
	 public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }
   
public function areaSelectModel($data,$id)
{     

	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('areas_master');
	  $select->where(array('city_id' => $id));
	  // echo $select->getSqlString($this->adapter->getPlatform()); exit;
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();
	  try 
	  {	
	  if ($result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$response[] = array('City ID' => $value->id,'City Name' => $value->name,'status' => 'success');
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
public function stateSelectModel($data,$id)
{     
//print_r($data); exit;
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
	  if ($result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					
					$response[] = array('State ID' => $value->id,'State Name' => $value->name,'status' => 'success');
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
		//print_r($response); exit;
return $response;
}

public function citySelectModel($data,$id)
{     

	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('cities_master');
	  $select->where(array('state_id' => $id));
	  //echo $select->getSqlString($this->adapter->getPlatform()); exit;
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();
	  try 
	  {	
	  if ($result->count() >= 1 ) { 
				foreach($rows as $key=>$value)
				{
					$response[] = array('City ID' => $value->id,'City Name' => $value->name,'status' => 'success');
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

	public function addskillsAction($token,$data)
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
		/*$insert = $sql->insert('skills_master');
		$insert->values($setdata_skillsmaster);
		$selectString = $sql->getSqlStringForSqlObject($insert);
		$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$lastId = $this->adapter->getDriver()->getLastGeneratedValue();*/
		$date = date('Y-m-d H:i:s');
		//Skills
		$setdata_skills=array(
		'user_id' => $data->user_id,
		'skill_id' => '7',
		'skill_name' => $data->skill_name,
		'number_of_years' => $data->number_of_years,
		'year_last_used' => $data->year_last_used,
		'rate_yourself' => $data->rate_yourself,
		'created_at' => $date,
		'created_by' => $data->user_id,
 		'is_active' => '1'
		);
		
		
		$insert = $sql->insert('skills');
		$insert->values($setdata_skills);
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
	
	public function updatelanguageAction($token,$data,$id)
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
		
		
		/*$update = $sql->update();
		$update->table('skills_master');
		$update->set($setdata_skillsmaster);
		$update->where($id);
		$selectString = $sql->getSqlStringForSqlObject($update);
    	$result = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);*/
		
		$date = date('Y-m-d H:i:s');
		$sql = new Sql($this->adapter);
		$setdata=array(
		'user_id' => $data->user_id,
		'language_name' => $data->language_name,
		'language_id' => $data->language_id,
		'proficiency' => $data->proficiency,
		'language_read' => $data->language_read,
		'language_write' => $data->language_write,
		'language_speak' => $data->language_speak,
		'created_at' => $date,
		'created_by' => $data->user_id
		);
		
		$update = $sql->update();
		$update->table('language');
		$update->set($setdata);
		$update->where($id);
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

	public function deletelanguageAction($token,$data,$id)
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
		$delete->FROM('language');
		$delete->where($id);
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
	
	public function addfeedbackAction($token,$data)
	{
	  $sql = new Sql($this->adapter);
	  $select = $sql->select();
	  $select->from('feedback');
	  $select->where(array('token' => $token));
	  $select->getSqlString($this->adapter->getPlatform());
	  $result =$this->executeSelect($select);
	  $rows = array_values(iterator_to_array($result));
	  $response=array();

	  try {
		if($result->count()===1)
		{
		$sql = new Sql($this->adapter);
		$date = date('Y-m-d H:i:s');
		//feedback
		$setdata=array(
		'user_id' => $data->user_id,
		'message' => $data->message,
		'name' => $data->name,
		'phoneNo' => $data->phoneNo,
		'category' => $data->category,
		'tag' => $data->tag,
		'created_at' => $date,
		'created_by' => $data->user_id
		);
		
		
		$insert = $sql->insert('feedback');
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
	
	public function updateFeedbackAction($token,$data,$id)
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
		$date = date('Y-m-d H:i:s');
		$sql = new Sql($this->adapter);
		//feedback
		$setdata=array(
		'user_id' => $data->user_id,
		'message' => $data->message,
		'name' => $data->name,
		'phoneNo' => $data->phoneNo,
		'category' => $data->category,
		'tag' => $data->tag,
		'created_at' => $date,
		'created_by' => $data->user_id
		);
		
		$update = $sql->update();
		$update->table('feedback');
		$update->set($setdata);
		$update->where($id);
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

	public function deleteFeedbackAction($token,$data,$id)
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
		$delete->FROM('feedback');
		$delete->where($id);
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
    
}