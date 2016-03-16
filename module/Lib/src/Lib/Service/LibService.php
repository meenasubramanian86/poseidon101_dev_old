<?php
namespace Lib\Service;
use Zend\View\Model\ViewModel;
use Lib\Model\LibTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;

use Zend\Validator\Db\RecordExists;

use Zend\Cache\StorageFactory;

class LibService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }
 
	public function areaSelectService($data,$id)
    {
		$libTable = new LibTable($this->adapter);
		$res = $libTable->areaSelectModel($data,$id);	
        return $res;
    }
	public function stateSelectService($data,$id)
    {
		$libTable = new LibTable($this->adapter);
		$res = $libTable->stateSelectModel($data,$id);	
        return $res;
    }
	public function citySelectService($data,$id)
    {
		$libTable = new LibTable($this->adapter);
		$res = $libTable->citySelectModel($data,$id);	
        return $res;
    }
	public function skillsService($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		
		//SkillsMaster
		/*$setdata_skillsmaster['skill_name'] = $data->skill_name;
		$setdata_skillsmaster['created_at'] = $date;
		$setdata_skillsmaster['created_by'] = $data->user_id;
		$setdata_skillsmaster['is_active'] = $data->is_active;*/
		$libTable = new libTable($this->adapter);
		$res = $libTable->addskillsAction($token,$data);
		 
        return $res;
    }
	
	public function LanguageService($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$libTable = new libTable($this->adapter);
		$res = $libTable->addlanguageAction($token,$data);
		return $res;
    }
	
	public function updateskillsService($data,$skill_id)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where = array();
		$where['id']  = $skill_id;
		//$where_skills = array();
		//$where_skills['skill_id']  = $skill_id;
		//SkillsMaster
		/*$setdata_skillsmaster['skill_name'] = $data->skill_name;
		$setdata_skillsmaster['created_at'] = $date;
		$setdata_skillsmaster['created_by'] = $data->user_id;
		$setdata_skillsmaster['is_active'] = $data->is_active;*/
		$libTable = new libTable($this->adapter);
		$res = $libTable->updateskillsAction($token,$data,$where,$skill_id);
		return $res;
    }
	
	public function deleteskillsService($data,$id)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where = array();
		$where['id']  = $id;
		//$where_skills = array();
		//$where_skills['skill_id']  = $skill_id;
		//SkillsMaster
		/*$setdata_skillsmaster['skill_name'] = $data->skill_name;
		$setdata_skillsmaster['created_at'] = $date;
		$setdata_skillsmaster['created_by'] = $data->user_id;
		$setdata_skillsmaster['is_active'] = $data->is_active;*/
		$libTable = new libTable($this->adapter);
		$res = $libTable->deleteskillsAction($token,$data,$where,$skill_id);
		return $res;
    }
	
	public function updatelanguageService($data,$language_id)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where = array();
		$where['id']  = $language_id;
		$libTable = new libTable($this->adapter);
		$res = $libTable->updatelanguageAction($token,$data,$where);
		return $res;
    }
	
	public function deletelanguageService($data,$id)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where = array();
		$where['id']  = $id;
		$libTable = new libTable($this->adapter);
		$res = $libTable->deletelanguageAction($token,$data,$where);
		return $res;
    }
	public function addFeedback($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$libTable = new libTable($this->adapter);
		$res = $libTable->addfeedbackAction($token,$data);
		return $res;
    }
	
	public function updateFeedback($data,$feedback_id)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where = array();
		$where['id']  = $feedback_id;
		$libTable = new libTable($this->adapter);
		$res = $libTable->updateFeedbackAction($token,$data,$where);
		return $res;
    }
	
	public function deleteFeedback($data,$id)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where = array();
		$where['id']  = $id;
		$libTable = new libTable($this->adapter);
		$res = $libTable->deleteFeedbackAction($token,$data,$where);
		return $res;
    }
	
}
