<?php
//Admin
namespace Admin\Controller;

use Zend\Validator\AbstractValidator;
use Zend\Mvc\Controller\AbstractRestfulController;

use Zend\View\Model\JsonModel;

use Zend\Http\Response;
use Admin\Service\AdminService;

use Zend\Http\Client as HttpClient;
error_reporting(0);


class AdminController extends AbstractRestfulController
{

public function allCountAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		
		
		
			
	if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->allCountService();
			
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }
	
public function updatecoursesAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$courses_id = $this->params('id');
 
		if( !isset($courses_id) || $courses_id == '' || $courses_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Courses Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->name) || $data->name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Courses Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->updatecoursesNameService($data,$courses_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }

	public function deletecoursesAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$courses_id = $this->params('id');
 
		if( !isset($courses_id) || $courses_id == '' || $courses_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Courses Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->name) || $data->name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Courses Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->deletecoursesNameService($data,$courses_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }
	public function coursesNameAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->name) || $data->name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Courses Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->coursesNameService($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }
	
public function updatespecializationAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$specialization_id = $this->params('id');
 
		if( !isset($specialization_id) || $specialization_id == '' || $specialization_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Specialization Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->name) || $data->name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Specialization Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->updatespecializationNameService($data,$specialization_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }

	public function deletespecializationAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$specialization_id = $this->params('id');
 
		if( !isset($specialization_id) || $specialization_id == '' || $specialization_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Specialization Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->name) || $data->name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Specialization Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->deletespecializationNameService($data,$specialization_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }
	public function specializationNameAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->name) || $data->name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Specialization Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->specializationNameService($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }

	public function collegeNameAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->college_name) || $data->college_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'College Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->collegeNameService($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }
	
public function updatecollegeAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$college_id = $this->params('id');
 
		if( !isset($college_id) || $college_id == '' || $college_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'College Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->college_name) || $data->college_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'College Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->updatecollegeNameService($data,$college_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }

	public function deletecollegeAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$college_id = $this->params('id');
 
		if( !isset($college_id) || $college_id == '' || $college_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'College Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->college_name) || $data->college_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'College Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->deletecollegeNameService($data,$college_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }

	
	
public function updateeducationAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$university_id = $this->params('id');
 
		if( !isset($university_id) || $university_id == '' || $university_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'University Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->university_name) || $data->university_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'University Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->updateUniversityService($data,$university_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }

	public function deleteeducationAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$university_id = $this->params('id');
 
		if( !isset($university_id) || $university_id == '' || $university_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'University Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->university_name) || $data->university_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'University Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->deleteUniversityService($data,$university_id);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }
	public function universityNameAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->university_name) || $data->university_name== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'University Name should not be empty');
          return new JsonModel($resp);
        }			
		
    
        	else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->universityNameService($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }

		return new JsonModel($resp);
    }


public function JobsAppliedAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		$data = json_decode($body);
		
		if(!isset($data->jobID)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'JobID should not be empty');
          return new JsonModel($resp);
        }
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->appliedJobsService($data);
			}
		 
		 return new JsonModel($resp);
    }
     
public function statesMasterAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		$data = json_decode($body);
		
		if(!isset($data->country_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Country ID should not be empty');
          return new JsonModel($resp);
        }
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->statesMasterService($data);
			}
		 
		 return new JsonModel($resp);
    }

public function citiesMasterAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		$data = json_decode($body);
		
		if(!isset($data->state_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'State ID should not be empty');
          return new JsonModel($resp);
        }
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->citiesMasterService($data);
			}
		 
		 return new JsonModel($resp);
    }
	
public function areasMasterAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		$data = json_decode($body);
		
		if(!isset($data->city_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'City ID should not be empty');
          return new JsonModel($resp);
        }
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->areasMasterService($data);
			}
		 
		 return new JsonModel($resp);
    }
	
	public function countriesMasterAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		$data = json_decode($body);
		/*if(!isset($data->city_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'City ID should not be empty');
          return new JsonModel($resp);
        }*/
			
			if($this->getRequest()->getMethod() == 'GET') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->countriesMasterService($data);
			}
		 
		 return new JsonModel($resp);
    }
		public function adminManageCandidateAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
					
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->adminManageCandidateService();
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Error'));
            
        } 
		 return new JsonModel($resp);
   
	}
		
		//ADMIN
public function adminManageEmployerAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		/*if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}*/
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->manageEmployerSelectService();
			}
		 
		 return new JsonModel($resp);
   
	}
	
	//ADMIN
public function adminBannersAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		/*if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}*/
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->adminBannersService();
			}
		 
		 return new JsonModel($resp);
   
	}
	
public function adminaddjobsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
	if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->jobs_id) || $data->jobs_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Jobs ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->contact_name) || $data->contact_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Contact Name should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->email_id) || $data->email_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->address) || $data->address == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Address should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->time) || $data->time == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Time should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_featured) || $data->is_featured == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Is Featured should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->is_priority) || $data->is_priority== '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Is Priority should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->every_day) || $data->every_day == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Every Day should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->every_3days) || $data->every_3days == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Every 3 days should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->every_week) || $data->every_week == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Every Week should not be empty');
          return new JsonModel($resp);
        }
				
		if( !isset($data->every_month) || $data->every_month == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Every Month should not be empty');
          return new JsonModel($resp);
        }

		if( !isset($data->created_at) || $data->created_at == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Created At should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->is_active) || $data->is_active== '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
		
		
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$AdminService = new AdminService($dbAdapter);
				$resp = $AdminService->adminaddjobsAction($data);
			}
		}
       if(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		return new JsonModel($resp);
		
	}
	
	
    
}