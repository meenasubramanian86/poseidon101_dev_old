<?php
namespace Users\Controller;

use Zend\Validator\AbstractValidator;
use Zend\Mvc\Controller\AbstractRestfulController;

use Zend\View\Model\JsonModel;

use Zend\Http\Response;
use Users\Service\UsersService;

use Zend\Http\Client as HttpClient;

class UsersController extends AbstractRestfulController

{
 
    
	public function latestJobsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
					
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->latestJobsSelectService();
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Error'));
            
        } 
		 return new JsonModel($resp);
   
	}
	
	public function featuredJobsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
					
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->featuredJobsSelectService();
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Error'));
            
        } 
		 return new JsonModel($resp);
   
	}
	
	public function featuredCompaniesAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
					
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->featuredCompaniesSelectService();
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Error'));
            
        } 
		 return new JsonModel($resp);
   
	}
	
	public function savedJobsSearchesAction()
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
		 if( !isset($data->user_id) || $data->user_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->keywords) || $data->keywords == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Keywords should not be empty');
          return new JsonModel($resp);
        }
         if( !isset($data->location) || $data->location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 503, 'errorMessage' => 'Location should not be empty');
          return new JsonModel($resp);
        }
        
        
        if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->addSavedJobsSearches($data);
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
	
public function updatesavedJobsSearchesAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$saved_job_searches_id = $this->params('id');
 
		if( !isset($saved_job_searches_id) || $saved_job_searches_id == '' || $saved_job_searches_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Job Searches Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->user_id) || $data->user_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->keywords) || $data->keywords == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Keywords should not be empty');
          return new JsonModel($resp);
        }
         if( !isset($data->location) || $data->location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 503, 'errorMessage' => 'Location should not be empty');
          return new JsonModel($resp);
        }
        
        
        if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->updateSavedJobsSearches($data,$saved_job_searches_id);
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

public function deletesavedJobsSearchesAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$saved_job_searches_id = $this->params('id');
 
		if( !isset($saved_job_searches_id) || $saved_job_searches_id == '' || $saved_job_searches_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Job Searches Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->user_id) || $data->user_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->keywords) || $data->keywords == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Keywords should not be empty');
          return new JsonModel($resp);
        }
         if( !isset($data->location) || $data->location == '') {
          $resp = array('status' => 'failure', 'errorCode' => 503, 'errorMessage' => 'Location should not be empty');
          return new JsonModel($resp);
        }
        
        
        if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->deleteSavedJobsSearches($data,$saved_job_searches_id);
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
	public function addsavedJobsAction()
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
		 if( !isset($data->user_id) || $data->user_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->job_id) || $data->job_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Job ID should not be empty');
          return new JsonModel($resp);
        }
    
        
        if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Created By should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->addSavedJobs($data);
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
	
public function updatesavedJobsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$saved_job_id = $this->params('id');
 
		if( !isset($saved_job_id) || $saved_job_id == '' || $saved_job_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Job Searches Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->user_id) || $data->user_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->job_id) || $data->job_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Job ID should not be empty');
          return new JsonModel($resp);
        }
      
        
        if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->updateSavedJobs($data,$saved_job_id);
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
	
public function deletesavedJobsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$saved_job_id = $this->params('id');
 
		if( !isset($saved_job_id) || $saved_job_id == '' || $saved_job_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Saved Job Searches Id should not be empty or zero');
		  return new JsonModel($resp);
        }
		
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->user_id) || $data->user_id== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->job_id) || $data->job_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Job ID should not be empty');
          return new JsonModel($resp);
        }
      
        
        if( !isset($data->modified_by) || $data->modified_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Modified By should not be empty');
          return new JsonModel($resp);
        }
        
		
		if( !isset($data->is_active) || $data->is_active == '') {
          $resp = array('status' => 'failure', 'errorCode' => 508, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
                
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->deleteSavedJobs($data,$saved_job_id);
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
	
public function updateMyAccountAction()
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
				if(empty($data->profiletitle))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile Title');
				}
				elseif(empty($data->user_first_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the User First Name');
				}
				elseif(empty($data->user_last_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the User Last Name');
				}
				elseif(empty($data->user_email_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Email ID');
				}
				elseif(empty($data->user_mobile))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Mobile Number');
				}
				elseif(empty($data->companyName))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Company Name');
				}
				elseif(empty($data->Designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Designation');
				}
				elseif(empty($data->Salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Salary');
				}
				elseif(empty($data->Location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Location');
				}
				elseif(empty($data->preferredlocations))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Preferred Location');
				}
				elseif(empty($data->expectedsalary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Expected Salary');
				}
				elseif(empty($data->desiredPosition))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Desired Position');
				}
				elseif(empty($data->skypeid))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Skype ID');
				}
				elseif(empty($data->visaStatus))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Visa Status');
				}
				elseif(empty($data->certification))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Certification');
				}
				elseif(empty($data->certificationDate))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the CertificationDate');
				}
				elseif(empty($data->skills))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the skills');
				}
				elseif(empty($data->version))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Version');
				}
				elseif(empty($data->yearLastUsed))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Year Last Used');
				}
				elseif(empty($data->expertise))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Expertise');
				}
				elseif(empty($data->client))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Client');
				}
				elseif(empty($data->yourRole))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Role');
				}
				elseif(empty($data->duration))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Project Duration');
				}
				elseif(empty($data->skillUsed))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Skill Used');
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->updateMyAccountService($data,$id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function deleteMyAccountAction()
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
				if(empty($data->profiletitle))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile Title');
				}
				elseif(empty($data->user_first_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the User First Name');
				}
				elseif(empty($data->user_last_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the User Last Name');
				}
				elseif(empty($data->user_email_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Email ID');
				}
				elseif(empty($data->user_mobile))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Mobile Number');
				}
				elseif(empty($data->companyName))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Company Name');
				}
				elseif(empty($data->Designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Designation');
				}
				elseif(empty($data->Salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Salary');
				}
				elseif(empty($data->Location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Location');
				}
				elseif(empty($data->preferredlocations))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Preferred Location');
				}
				elseif(empty($data->expectedsalary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Expected Salary');
				}
				elseif(empty($data->desiredPosition))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Desired Position');
				}
				elseif(empty($data->skypeid))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Skype ID');
				}
				elseif(empty($data->visaStatus))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Visa Status');
				}
				elseif(empty($data->certification))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Certification');
				}
				elseif(empty($data->certificationDate))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the CertificationDate');
				}
				elseif(empty($data->skills))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the skills');
				}
				elseif(empty($data->version))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Version');
				}
				elseif(empty($data->yearLastUsed))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Year Last Used');
				}
				elseif(empty($data->expertise))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Expertise');
				}
				elseif(empty($data->client))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Client');
				}
				elseif(empty($data->yourRole))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Role');
				}
				elseif(empty($data->duration))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Project Duration');
				}
				elseif(empty($data->skillUsed))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Skill Used');
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->deleteMyAccountService($data,$id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	public function updateJobdescAction()
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
				if(empty($data->user_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the User ID');
				}
				elseif(empty($data->title))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile Title');
				}
				elseif(empty($data->experience_years))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Experience Years');
				}
				elseif(empty($data->experience_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Experience Months');
				}
				elseif(empty($data->salary_per_annum_lakhs))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Salary Per Annum Lakhs');
				}
				elseif(empty($data->salary_per_annum_thousand))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Salary Per Annum Thousand');
				}
				elseif(empty($data->designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Designation');
				}
				elseif(empty($data->preferred_designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Preferred Designation');
				}
				elseif(empty($data->preferred_location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Preferred Location');
				}
				elseif(empty($data->expected_salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Expected Salary');
				}
				elseif(empty($data->description))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Description');
				}
				elseif(empty($data->detail_description))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Detailed Description');
				}
				elseif(empty($data->contact_person))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Recruiter Name');
				}
				elseif(empty($data->contact_number))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Recruiter Contact Number');
				}
				elseif(empty($data->contact_address))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Recruiter Address');
				}
				elseif(empty($data->interview_time))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Interview Time');
				}
				elseif(empty($data->skills))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Skills');
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->updateJobdescService($data,$id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function deleteJobdescAction()
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
				if(empty($data->user_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the User ID');
				}
				elseif(empty($data->title))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile Title');
				}
				elseif(empty($data->experience_years))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Experience Years');
				}
				elseif(empty($data->experience_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Experience Months');
				}
				elseif(empty($data->salary_per_annum_lakhs))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Salary Per Annum Lakhs');
				}
				elseif(empty($data->salary_per_annum_thousand))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Salary Per Annum Thousand');
				}
				elseif(empty($data->designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Designation');
				}
				elseif(empty($data->preferred_designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Preferred Designation');
				}
				elseif(empty($data->preferred_location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Preferred Location');
				}
				elseif(empty($data->expected_salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Expected Salary');
				}
				elseif(empty($data->description))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Description');
				}
				elseif(empty($data->detail_description))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Detailed Description');
				}
				elseif(empty($data->contact_person))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Recruiter Name');
				}
				elseif(empty($data->contact_number))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Recruiter Contact Number');
				}
				elseif(empty($data->contact_address))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Recruiter Address');
				}
				elseif(empty($data->interview_time))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Interview Time');
				}
				elseif(empty($data->skills))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Skills');
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->deleteJobdescService($data,$id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function passwordAction()
    {
	
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
		
		$user_id = $this->params('id');
 
		if( !isset($user_id) || $user_id == '' || $user_id == 0) {
		  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID should not be empty or zero');
		  return new JsonModel($resp);
        }
		
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
		 if( !isset($data->token) || $data->token== '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Token should not be empty');
          return new JsonModel($resp);
        }			
		
         if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 502, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
      
        
        if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 505, 'errorMessage' => 'Email ID should not be empty');
          return new JsonModel($resp);
        }
              
			else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$UsersService = new UsersService($dbAdapter);
				$resp = $UsersService->changePasswordSelectService($data,$user_id);
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
	
	public function insertprofessionalDetailsAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($_POST);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->cover_note))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->company_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->company_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->duration_from))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->duration_to))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->project_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->role))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Current Designation');
				}
				if(empty($data->team_strength))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Current Salary');
				}
				if(empty($data->skills_used))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Desired Position');
				}
				if(empty($data->remarks))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 612, 'errorMessage' => 'Enter the Expected Salary');
				}
				if(empty($data->client))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Client');
				}
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->insertprofessionalDetailsService($data);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function updateprofessionalDetailsAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$professional_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->cover_note))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->company_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->company_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->duration_from))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->duration_to))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->project_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->role))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Current Designation');
				}
				if(empty($data->team_strength))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Current Salary');
				}
				if(empty($data->skills_used))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Desired Position');
				}
				if(empty($data->remarks))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 612, 'errorMessage' => 'Enter the Expected Salary');
				}
				if(empty($data->client))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Client');
				}
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->updateprofessionalDetailsService($data,$professional_id);
				}
			}
		 return new JsonModel($resp);
   
	}
	
	public function deleteprofessionalDetailsAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$professional_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->cover_note))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->company_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->company_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->duration_from))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->duration_to))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->project_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Profile title');
				}
				if(empty($data->role))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Current Designation');
				}
				if(empty($data->team_strength))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Current Salary');
				}
				if(empty($data->skills_used))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Desired Position');
				}
				if(empty($data->remarks))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 612, 'errorMessage' => 'Enter the Expected Salary');
				}
				if(empty($data->client))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Client');
				}
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->deleteprofessionalDetailsService($data,$professional_id);
				}
			}
		 return new JsonModel($resp);
   
	}
	
	public function skillsSearchAction()
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
				if(empty($data->skills_used))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Skills');
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->skillsUsedService($data);
				}
			}
		 return new JsonModel($resp);
   
	}
public function insertpersonalDetailsAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($_POST);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->title))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Title');
				}
				if(empty($data->objective))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Objective');
				}
				if(empty($data->dob))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Date Of Birth');
				}
				if(empty($data->gender))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Gender');
				}
				if(empty($data->experience_years))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Years');
				}
				if(empty($data->experience_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Months');
				}
				if(empty($data->salary_per_annum_lakhs))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Salary Per Annum Lakhs');
				}
				if(empty($data->salary_per_annum_thousand))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Salary Per Annum Thousand');
				}
				if(empty($data->designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Designation');
				}
				if(empty($data->preferred_designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 612, 'errorMessage' => 'Enter the Preferred Designation');
				}
				if(empty($data->preferred_location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Preferred Location');
				}
				if(empty($data->expected_salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Expected Salary');
				}
				if(empty($data->notice_period_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Notice Period Months');
				}
				if(empty($data->skype_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Skype ID');
				}
				if(empty($data->gtalk_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the GTalk ID');
				}
				if(empty($data->yahoo_messenger_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Yahoo Messenger ID');
				}
				if(empty($data->linkedin_url))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Linked IN URL');
				}
				if(empty($data->resume_url))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Resume URL');
				}
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->insertPersonalDetailsService($data);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
public function updatepersonalDetailsAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($_POST);exit;
		$data = json_decode($body);
		$personal_id= $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->title))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Title');
				}
				if(empty($data->objective))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Objective');
				}
				if(empty($data->dob))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Date Of Birth');
				}
				if(empty($data->gender))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Gender');
				}
				if(empty($data->experience_years))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Years');
				}
				if(empty($data->experience_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Months');
				}
				if(empty($data->salary_per_annum_lakhs))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Salary Per Annum Lakhs');
				}
				if(empty($data->salary_per_annum_thousand))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Salary Per Annum Thousand');
				}
				if(empty($data->designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Designation');
				}
				if(empty($data->preferred_designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 612, 'errorMessage' => 'Enter the Preferred Designation');
				}
				if(empty($data->preferred_location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Preferred Location');
				}
				if(empty($data->expected_salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Expected Salary');
				}
				if(empty($data->notice_period_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Notice Period Months');
				}
				if(empty($data->skype_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Skype ID');
				}
				if(empty($data->gtalk_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the GTalk ID');
				}
				if(empty($data->yahoo_messenger_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Yahoo Messenger ID');
				}
				if(empty($data->linkedin_url))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Linked IN URL');
				}
				if(empty($data->resume_url))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Resume URL');
				}
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->updatePersonalDetailsService($data,$personal_id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function deletepersonalDetailsAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($_POST);exit;
		$data = json_decode($body);
		$personal_id= $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->title))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Title');
				}
				if(empty($data->objective))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Objective');
				}
				if(empty($data->dob))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Date Of Birth');
				}
				if(empty($data->gender))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Gender');
				}
				if(empty($data->experience_years))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Years');
				}
				if(empty($data->experience_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Months');
				}
				if(empty($data->salary_per_annum_lakhs))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 609, 'errorMessage' => 'Enter the Salary Per Annum Lakhs');
				}
				if(empty($data->salary_per_annum_thousand))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 610, 'errorMessage' => 'Enter the Salary Per Annum Thousand');
				}
				if(empty($data->designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 611, 'errorMessage' => 'Enter the Designation');
				}
				if(empty($data->preferred_designation))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 612, 'errorMessage' => 'Enter the Preferred Designation');
				}
				if(empty($data->preferred_location))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Preferred Location');
				}
				if(empty($data->expected_salary))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Expected Salary');
				}
				if(empty($data->notice_period_months))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Notice Period Months');
				}
				if(empty($data->skype_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Skype ID');
				}
				if(empty($data->gtalk_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the GTalk ID');
				}
				if(empty($data->yahoo_messenger_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Yahoo Messenger ID');
				}
				if(empty($data->linkedin_url))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Linked IN URL');
				}
				if(empty($data->resume_url))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 614, 'errorMessage' => 'Enter the Resume URL');
				}
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->deletePersonalDetailsService($data,$personal_id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function inserteducationalcertificationAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($_POST);exit;
		$data = json_decode($body);
		
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->institute))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Title');
				}
				if(empty($data->passedyear_from_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Objective');
				}
				if(empty($data->passedyear_from_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Date Of Birth');
				}
				if(empty($data->passedyear_to_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Gender');
				}
				if(empty($data->passedyear_to_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Years');
				}
				if(empty($data->created_by))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Months');
				}
				
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->inserteducationalcertificationService($data);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function updateeducationalcertificationAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		
		$educational_cert_id= $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->institute))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Title');
				}
				if(empty($data->passedyear_from_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Objective');
				}
				if(empty($data->passedyear_from_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Date Of Birth');
				}
				if(empty($data->passedyear_to_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Gender');
				}
				if(empty($data->passedyear_to_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Years');
				}
				if(!isset($data->modified_by) || $data->modified_by== '')
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Modified By');
				}
				
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->updateeducationalcertificationService($data,$educational_cert_id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
		public function deleteeducationalcertificationAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		
		$educational_cert_id= $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				}
				if(empty($data->institute))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Title');
				}
				if(empty($data->passedyear_from_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Objective');
				}
				if(empty($data->passedyear_from_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Date Of Birth');
				}
				if(empty($data->passedyear_to_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Gender');
				}
				if(empty($data->passedyear_to_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Experience Years');
				}
				if(!isset($data->modified_by) || $data->modified_by== '')
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Modified By');
				}
				
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->deleteeducationalcertificationService($data,$educational_cert_id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function inserteducationalgraduationAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		$data = json_decode($body);
				
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				   return new JsonModel($resp);
				}
				if(empty($data->university_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the University Name');
				   return new JsonModel($resp);
				}
				if(empty($data->university_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the University ID');
				   return new JsonModel($resp);
				}
				if(empty($data->mode_of_education))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Mode Of Education');
				   return new JsonModel($resp);
				}
				if(empty($data->degree))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Degree');
				   return new JsonModel($resp);
				}
				if(empty($data->specialization))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Specialization');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_from_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year From Month');
				   return new JsonModel($resp);
				}
				
				if(empty($data->passedyear_from_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year From Year');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_to_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year To Month');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_to_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year To Year'); 
				   return new JsonModel($resp);
				}
				if(empty($data->created_by))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Created By');
				   return new JsonModel($resp);
				}
				
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->inserteducationalgraduationService($data);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function updateeducationalgraduationAction()
    {
		
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		
		$educational_grad_id= $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				   return new JsonModel($resp);
				}
				if(empty($data->university_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the University Name');
				   return new JsonModel($resp);
				}
				if(empty($data->university_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the University ID');
				   return new JsonModel($resp);
				}
				if(empty($data->mode_of_education))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Mode Of Education');
				   return new JsonModel($resp);
				}
				if(empty($data->degree))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Degree');
				   return new JsonModel($resp);
				}
				if(empty($data->specialization))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Specialization');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_from_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year From Month');
				   return new JsonModel($resp);
				}
				
				if(empty($data->passedyear_from_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year From Year');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_to_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year To Month');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_to_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year To Year'); 
				   return new JsonModel($resp);
				}
				if(empty($data->modified_by))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Modified By');
				   return new JsonModel($resp);
				}
				
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->updateeducationalgraduationService($data,$educational_grad_id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
		public function deleteeducationalgraduationAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		
		$data = json_decode($body);
		
		$educational_grad_id= $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				   return new JsonModel($resp);
				}
				if(empty($data->university_name))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the University Name');
				   return new JsonModel($resp);
				}
				if(empty($data->university_id))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the University ID');
				   return new JsonModel($resp);
				}
				if(empty($data->mode_of_education))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Mode Of Education');
				   return new JsonModel($resp);
				}
				if(empty($data->degree))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Degree');
				   return new JsonModel($resp);
				}
				if(empty($data->specialization))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Specialization');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_from_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year From Month');
				   return new JsonModel($resp);
				}
				
				if(empty($data->passedyear_from_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year From Year');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_to_month))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year To Month');
				   return new JsonModel($resp);
				}
				if(empty($data->passedyear_to_year))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Passed Year To Year'); 
				   return new JsonModel($resp);
				}
				if(empty($data->modified_by))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Created By');
				   return new JsonModel($resp);
				}
				
				if( !isset($data->user_id) || $data->user_id== '') 
				{
					$resp = array('status' => 'failure', 'errorCode' => 613, 'errorMessage' => 'User ID should not be empty');
					return new JsonModel($resp);
				}
				else{
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->deleteeducationalgraduationService($data,$educational_grad_id);
				}
			}
		
		 return new JsonModel($resp);
   
	}
	
	public function visiblitySettingsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$user_id= $this->params('id');
					
			if($this->getRequest()->getMethod() == 'POST') {
				if(empty($data->token))
				{
				   $resp = array('status' => 'failure', 'errorCode' => 608, 'errorMessage' => 'Enter the Token');
				   return new JsonModel($resp);
				}
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$usersService = new UsersService($dbAdapter);
				$resp = $usersService->visibiltySettingsSelect($data,$user_id);
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'Error'));
            
        } 
		 return new JsonModel($resp);
   
	}
	

}