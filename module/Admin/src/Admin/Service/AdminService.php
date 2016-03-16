<?php
namespace Admin\Service;
use Zend\View\Model\ViewModel;
use Admin\Model\AdminTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;
use Zend\Validator\Db\RecordExists;


class AdminService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }

	public function allCountService()
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->allCountModel();
        return $res;
    }
	
	public function coursesNameService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->coursesNameModel($data);
        return $res;
    }
	
	public function updatecoursesNameService($data,$courses_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['name'] = $data->name;
		$setdata['modified_by'] = $courses_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $courses_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->editcoursesNameModel($setdata,$where);
        return $res;
    }
	
	public function deletecoursesNameService($data,$courses_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['name'] = $data->name;
		$setdata['modified_by'] = $courses_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $courses_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->deletecoursesNameModel($setdata,$where);
        return $res;
    }
	
	public function specializationNameService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->specializationNameModel($data);
        return $res;
    }
	
	public function updatespecializationNameService($data,$specialization_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['name'] = $data->name;
		$setdata['modified_by'] = $specialization_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $specialization_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->editspecializationNameModel($setdata,$where);
        return $res;
    }
	
	public function deletespecializationNameService($data,$specialization_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['name'] = $data->name;
		$setdata['modified_by'] = $specialization_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $specialization_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->deletespecializationNameModel($setdata,$where);
        return $res;
    }
	
	public function collegeNameService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->collegeNameModel($data);
        return $res;
    }
    
	public function updatecollegeNameService($data,$college_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['college_name'] = $data->college_name;
		$setdata['modified_by'] = $college_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $college_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->editCollegeNameModel($setdata,$where);
        return $res;
    }
	
	public function deletecollegeNameService($data,$college_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['college_name'] = $data->college_name;
		$setdata['modified_by'] = $college_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $college_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->deletecollegeNameModel($setdata,$where);
        return $res;
    }
	
	public function universityNameService($data)
    {
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->universityNameModel($data);
        return $res;
    }
    
	public function updateUniversityService($data,$university_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['university_name'] = $data->university_name;
		$setdata['modified_by'] = $university_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $university_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->editUniversityNameModel($setdata,$where);
        return $res;
    }
	
	public function deleteUniversityService($data,$university_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['university_name'] = $data->university_name;
		$setdata['modified_by'] = $university_id;
		$setdata['modified_at'] = $date;
		$where['id']  = $university_id;

		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->deleteUniversityNameModel($setdata,$where);
        return $res;
    }
	
   public function appliedJobsService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->appliedJobsTable($data);	
        return $res;
    }
   
   public function statesMasterService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->statesMasterTable($data);	
        return $res;
    }
  public function citiesMasterService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->citiesMasterTable($data);	
        return $res;
    }
  public function areasMasterService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->areasMasterTable($data);	
        return $res;
    }	
 
  public function countriesMasterService($data)
    {
		
		$AdminTable = new AdminTable($this->adapter);
		$res = $AdminTable->countriesMasterTable($data);	
        return $res;
    }
	public function adminManageCandidateService()
    {
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->adminManageCandidateModel();	
        return $res;
    }
	public function manageEmployerSelectService()
    {
		
		$empTable = new EmployerTable($this->adapter);
		$res = $empTable->manageEmployerSelectModel();	
        return $res;
    }
    
	public function adminBannersService()
    {
		
		$empTable = new EmployerTable($this->adapter);
		$res = $empTable->adminBannersModel();	
        return $res;
    }
	
	public function adminaddjobsAction($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['jobs_id'] = $data->jobs_id;
		$setdata['contact_name'] = $data->contact_name;
		$setdata['email_id'] = $data->email_id;
		$setdata['address'] = $data->address;
		$setdata['time'] = $data->time;
		$setdata_settings['is_featured'] = $data->is_featured;
		$setdata_settings['is_priority'] = $data->is_priority;
		$setdata_settings['every_day'] = $data->every_day;
		$setdata_settings['every_3days'] = $data->every_3days;
		$setdata_settings['every_week'] = $data->every_week;
		$setdata_settings['every_month'] = $data->every_month;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$ProductsTable = new ProductsTable($this->adapter);
		$res = $ProductsTable->adminaddjobsModel($setdata,$setdata_settings);
        return $res;
    }
}
