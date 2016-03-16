<?php
namespace Lib\Controller;

use Zend\Validator\AbstractValidator;
use Zend\Mvc\Controller\AbstractRestfulController;

use Zend\View\Model\JsonModel;

use Zend\Http\Response;
use Lib\Service\LibService;

use Zend\Http\Client as HttpClient;

class LibController extends AbstractRestfulController
{
 
    public function areaAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		if( !isset($data->city_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'City  should not be empty');
          return new JsonModel($resp);
        }
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->areaSelectService($data,$id);
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}	
	
	public function stateAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		if( !isset($data->country_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Country  should not be empty');
          return new JsonModel($resp);
        }
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->stateSelectService($data,$id);
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}
	
	public function cityAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$id  = $this->params('id');
		if( !isset($data->state_id)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'State  should not be empty');
          return new JsonModel($resp);
        }
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
			if($this->getRequest()->getMethod() == 'POST') {
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->citySelectService($data,$id);
			}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}
	
	public function addskillsAction()
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
			if( !isset($data->user_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->skill_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Skill ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->skill_name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Skill Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->number_of_years)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Number Of Years  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->year_last_used)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Year Last Used  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->rate_yourself)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Rate Yourself  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->is_active)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->skillsService($data);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}
	
public function updateskillsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$skill_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
			if( !isset($data->user_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->skill_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Skill ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->skill_name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Skill Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->number_of_years)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Number Of Years  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->year_last_used)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Year Last Used  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->rate_yourself)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Rate Yourself  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->modified_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Modified By  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->is_active)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Active  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->updateskillsService($data,$skill_id);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}
	
public function deleteskillsAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$skill_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
			if( !isset($data->user_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->skill_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Skill ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->skill_name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Skill Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->number_of_years)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Number Of Years  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->year_last_used)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Year Last Used  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->rate_yourself)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Rate Yourself  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->modified_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Modified By  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->is_active)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Active  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->deleteskillsService($data,$skill_id);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}
	
	public function addLanguageAction()
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
			if( !isset($data->user_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->proficiency)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Proficiency  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_read)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Read  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_write)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Write  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_speak)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Speak  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->LanguageService($data);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}

public function updatelanguageAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$language_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
			if( !isset($data->user_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->proficiency)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Proficiency  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_read)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Read  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_write)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Write  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_speak)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Speak  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->updatelanguageService($data,$language_id);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}

	public function deletelanguageAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$language_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
			if( !isset($data->user_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_id)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language ID  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->proficiency)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Proficiency  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_read)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Read  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_write)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Write  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->language_speak)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Language Speak  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->deletelanguageService($data,$language_id);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}

public function addFeedbackAction()
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
			if( !isset($data->feedbackDate)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'FeedbackDate  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->message)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Message  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->phoneNo)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone No  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->category)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Category  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->tag)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Tag  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->addFeedback($data);
			}
		}
		
		 return new JsonModel($resp);
   
	}

public function updateFeedbackAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$language_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
			if( !isset($data->feedbackDate)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'FeedbackDate  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->message)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Message  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->phoneNo)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone No  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->category)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Category  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->tag)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Tag  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->updateFeedback($data);
			}
		}
		 if(!empty($resp) && $resp['errorCode'] == '513') {
            
            $resp = array_merge($resp, array('status' => 'failure','errorcode' => 513,'errorMessage' => 'City Id does not match'));
            
        } elseif(!empty($resp) && $resp['errorCode'] == '511') {
          $resp = array_merge($resp,  array('status' => 'failure','errorcode' => 511,'errorMessage' => 'Sql error'));
        }
        else{
          //$resp = array_merge($resp, array('status' => 'failure'));
        }
		 return new JsonModel($resp);
   
	}

	public function deletefeedbackAction()
    {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    
        $body = $this->getRequest()->getContent();
		//print_r($body);exit;
		$data = json_decode($body);
		$language_id  = $this->params('id');
		
		if(empty($data)){
		  $resp = array('status' => 'failure', 'errorCode' => 516, 'errorMessage' => 'json code format error');
          return new JsonModel($resp);
		}
			
		if($this->getRequest()->getMethod() == 'POST') {
			if( !isset($data->feedbackDate)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'FeedbackDate  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->message)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Message  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->name)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Name  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->phoneNo)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone No  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->category)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Category  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->tag)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Tag  should not be empty');
			  return new JsonModel($resp);
			}
			if( !isset($data->created_by)) {
			  $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Created By  should not be empty');
			  return new JsonModel($resp);
			}
			
			else
			{			
				$sm = $this->getServiceLocator();
				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
				$libService = new LibService($dbAdapter);
				$resp = $libService->deleteFeedback($data,$feedback_id);
			}
		}
	    return new JsonModel($resp);
   
	}	

}