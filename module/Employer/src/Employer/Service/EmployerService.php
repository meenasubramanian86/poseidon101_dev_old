<?php
namespace Employer\Service;
use Zend\View\Model\ViewModel;
use Employer\Model\EmployerTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;
use Zend\Validator\Db\RecordExists;

use Zend\Cache\StorageFactory;
class EmployerService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }
    
   public function empLogindata($data)
    {
		$employerTable = new EmployerTable($this->adapter);
		$res = $employerTable->saveLogin($data);	
        return $res;
    }
	
	public function addemailTemplate($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['template_id'] = $data->template_id;
		$setdata['status'] = $data->status;
		$setdata['is_default'] = $data->is_default;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->addemailTemplate($setdata);
        return $res;
    }
	
	public function updateemailTemplate($data,$email_template_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['template_id'] = $data->template_id;
		$setdata['status'] = $data->status;
		$setdata['is_default'] = $data->is_default;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $email_template_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->updateemailTemplate($setdata,$where);
        return $res;
    }
	
	public function deleteemailTemplate($data,$email_template_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['template_id'] = $data->template_id;
		$setdata['status'] = $data->status;
		$setdata['is_default'] = $data->is_default;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $email_template_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->deleteemailTemplate($setdata,$where);
        return $res;
    }
	
	public function addSMSTemplate($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['template_id'] = $data->template_id;
		$setdata['status'] = $data->status;
		$setdata['is_default'] = $data->is_default;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->addSMSTemplate($setdata);
        return $res;
    }
	
	public function updateSMSTemplate($data,$SMS_template_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['template_id'] = $data->template_id;
		$setdata['status'] = $data->status;
		$setdata['is_default'] = $data->is_default;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $SMS_template_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->updateSMSTemplate($setdata,$where);
        return $res;
    }
	
	public function deleteSMSTemplate($data,$SMS_template_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['template_id'] = $data->template_id;
		$setdata['status'] = $data->status;
		$setdata['is_default'] = $data->is_default;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $SMS_template_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->deleteSMSTemplate($setdata,$where);
        return $res;
    }
	
	public function addemployerRegistration($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token = md5($data->email_id.time());
		$password =  md5($data->password);
		$setdata['company_name'] = $data->company_name;
		$setdata['company_short_name'] = $data->company_short_name;
		$setdata['email_id'] = $data->email_id;
		$setdata['password'] = $password;
		$setdata['token'] = $token;
		$setdata['position'] = $data->position;
		$setdata['company_type'] = $data->company_type;
		$setdata['website_url'] = $data->website_url;
		$setdata['industry'] = $data->industry;
		$setdata['company_discription'] = $data->company_discription;
		$setdata['logo'] = $data->logo;
		$setdata['linkedin_url'] = $data->linkedin_url;
		$setdata['facebook_url'] = $data->facebook_url;
		$setdata['twitter_url'] = $data->twitter_url;
		$setdata['is_mail_send'] = $data->is_mail_send;
		$setdata['address1'] = $data->address1;
		$setdata['address2'] = $data->address2;
		$setdata['country'] = $data->country;
		$setdata['state'] = $data->state;
		$setdata['city'] = $data->city;
		$setdata['area'] = $data->area;
		$setdata['postal_code'] = $data->postal_code;
		$setdata['latitude'] = $data->latitude;
		$setdata['longitude'] = $data->longitude;
		$setdata['phone'] = $data->phone;
		$setdata['phone2'] = $data->phone2;
		$setdata['phone3'] = $data->phone3;
		$setdata['mobile'] = $data->mobile;
		$setdata['mobile2'] = $data->mobile2;
		$setdata['mobile3'] = $data->mobile3;
		$setdata['profile_picture'] = $data->profile_picture;
		$setdata['verification_code'] = $data->verification_code;
		$setdata['is_verified'] = $data->is_verified;
		$setdata['last_login'] = $date;
		$setdata['secret_question'] = $data->secret_question;
		$setdata['secret_answer'] = $data->secret_answer;
		$setdata['is_profile_completed'] = $data->is_profile_completed;
		$setdata['created_by'] = $data->created_by;
		$setdata['created_at'] = $date;
 		$setdata['is_active'] = '1';
		 
		
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->addemployerRegistration($setdata);
		 
        return $res;
    }

	public function updateemployerRegistration($data,$employer_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['company_name'] = $data->company_name;
		$setdata['company_short_name'] = $data->company_short_name;
		$setdata['email_id'] = $data->email_id;
		$setdata['password'] = $data->password;
		$setdata['token'] = $data->token;
		$setdata['position'] = $data->position;
		$setdata['company_type'] = $data->company_type;
		$setdata['website_url'] = $data->website_url;
		$setdata['industry'] = $data->industry;
		$setdata['company_discription'] = $data->company_discription;
		$setdata['logo'] = $data->logo;
		$setdata['linkedin_url'] = $data->linkedin_url;
		$setdata['facebook_url'] = $data->facebook_url;
		$setdata['twitter_url'] = $data->twitter_url;
		$setdata['is_mail_send'] = $data->is_mail_send;
		$setdata['address1'] = $data->address1;
		$setdata['address2'] = $data->address2;
		$setdata['country'] = $data->country;
		$setdata['state'] = $data->state;
		$setdata['city'] = $data->city;
		$setdata['area'] = $data->area;
		$setdata['postal_code'] = $data->postal_code;
		$setdata['latitude'] = $data->latitude;
		$setdata['longitude'] = $data->longitude;
		$setdata['phone'] = $data->phone;
		$setdata['phone2'] = $data->phone2;
		$setdata['phone3'] = $data->phone3;
		$setdata['mobile'] = $data->mobile;
		$setdata['mobile2'] = $data->mobile2;
		$setdata['mobile3'] = $data->mobile3;
		$setdata['profile_picture'] = $data->profile_picture;
		$setdata['verification_code'] = $data->verification_code;
		$setdata['is_verified'] = $data->is_verified;
		$setdata['last_login'] = $date;
		$setdata['secret_question'] = $data->secret_question;
		$setdata['secret_answer'] = $data->secret_answer;
		$setdata['is_profile_completed'] = $data->is_profile_completed;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['modified_at'] = $date;
 		$setdata['is_active'] = '1';
		$where['id']  = $employer_id;
		 
		
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->updateemployerRegistration($setdata,$where);
		 
        return $res;
    }
	public function deleteEmployerRegistration($data,$employer_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['company_name'] = $data->company_name;
		$setdata['company_short_name'] = $data->company_short_name;
		$setdata['email_id'] = $data->email_id;
		$setdata['password'] = $data->password;
		$setdata['token'] = $data->token;
		$setdata['position'] = $data->position;
		$setdata['company_type'] = $data->company_type;
		$setdata['website_url'] = $data->website_url;
		$setdata['industry'] = $data->industry;
		$setdata['company_discription'] = $data->company_discription;
		$setdata['logo'] = $data->logo;
		$setdata['linkedin_url'] = $data->linkedin_url;
		$setdata['facebook_url'] = $data->facebook_url;
		$setdata['twitter_url'] = $data->twitter_url;
		$setdata['is_mail_send'] = $data->is_mail_send;
		$setdata['address1'] = $data->address1;
		$setdata['address2'] = $data->address2;
		$setdata['country'] = $data->country;
		$setdata['state'] = $data->state;
		$setdata['city'] = $data->city;
		$setdata['area'] = $data->area;
		$setdata['postal_code'] = $data->postal_code;
		$setdata['latitude'] = $data->latitude;
		$setdata['longitude'] = $data->longitude;
		$setdata['phone'] = $data->phone;
		$setdata['phone2'] = $data->phone2;
		$setdata['phone3'] = $data->phone3;
		$setdata['mobile'] = $data->mobile;
		$setdata['mobile2'] = $data->mobile2;
		$setdata['mobile3'] = $data->mobile3;
		$setdata['profile_picture'] = $data->profile_picture;
		$setdata['verification_code'] = $data->verification_code;
		$setdata['is_verified'] = $data->is_verified;
		$setdata['last_login'] = $date;
		$setdata['secret_question'] = $data->secret_question;
		$setdata['secret_answer'] = $data->secret_answer;
		$setdata['is_profile_completed'] = $data->is_profile_completed;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['modified_at'] = $date;
 		$setdata['is_active'] = '1';
		$where['id']  = $employer_id;
		
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->deleteEmployerRegistration($setdata,$where);
			 
        return $res;
    }
	
	public function addSavedResumes($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['user_id'] = $data->user_id;
		$setdata['resume_id'] = $data->resume_id;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->addSavedResumes($setdata);
        return $res;
    }
	
	public function updateSavedResumes($data,$saved_resumes_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['user_id'] = $data->user_id;
		$setdata['resume_id'] = $data->resume_id;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $saved_resumes_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->updateSavedResumes($setdata,$where);
        return $res;
    }
	
	public function deleteSavedResumes($data,$saved_resumes_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['user_id'] = $data->user_id;
		$setdata['resume_id'] = $data->resume_id;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $saved_resumes_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->deleteSavedResumes($setdata,$where);
        return $res;
    }
	
	public function addSavedResumesSearches($data)
    {
		
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['keyword'] = $data->keyword;
		$setdata['resume_posted_from'] = $data->resume_posted_from;
		$setdata['resume_posted_to'] = $data->resume_posted_to;
		$setdata['experience_from'] = $data->experience_from;
		$setdata['experience_to'] = $data->experience_to;
		$setdata['is_desired_location'] = $data->is_desired_location;
		$setdata['location'] = $data->location;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['is_active'] = $data->is_active;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->addSavedResumesSearches($setdata);
        return $res;
    }
	
	public function updateSavedResumesSearches($data,$saved_resumes_searches_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['keyword'] = $data->keyword;
		$setdata['resume_posted_from'] = $data->resume_posted_from;
		$setdata['resume_posted_to'] = $data->resume_posted_to;
		$setdata['experience_from'] = $data->experience_from;
		$setdata['experience_to'] = $data->experience_to;
		$setdata['is_desired_location'] = $data->is_desired_location;
		$setdata['location'] = $data->location;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $saved_resumes_searches_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->updateSavedResumesSearches($setdata,$where);
        return $res;
    }
	
	public function deleteSavedResumesSearches($data,$saved_resumes_searches_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['employer_id'] = $data->employer_id;
		$setdata['keyword'] = $data->keyword;
		$setdata['resume_posted_from'] = $data->resume_posted_from;
		$setdata['resume_posted_to'] = $data->resume_posted_to;
		$setdata['experience_from'] = $data->experience_from;
		$setdata['experience_to'] = $data->experience_to;
		$setdata['is_desired_location'] = $data->is_desired_location;
		$setdata['location'] = $data->location;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->modified_by;
		$setdata['is_active'] = $data->is_active;
		$where['id']  = $saved_resumes_searches_id;
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->deleteSavedResumesSearches($setdata,$where);
        return $res;
    }
	public function changePasswordSelectService($data,$id)
    {
		$employerTable = new employerTable($this->adapter);
		$res = $employerTable->changePasswordSelectModel($data,$id);	
        return $res;
    }
	
		public function addemployerAccounts($data)
		{
			$setdata = array();
			$date = date('Y-m-d H:i:s');
			$password =  md5($data->password);
			$setdata['employer_id'] = $data->employer_id;
			$setdata['email_id'] = $data->email_id;
			$setdata['password'] = $password;
			$setdata['role_type'] = $data->role_type;
			$setdata['created_by'] = $data->created_by;
			$setdata['created_at'] = $date;
			$setdata['is_active'] = '1';
			$employerTable = new employerTable($this->adapter);
			$res = $employerTable->addemployerAccountsAction($setdata);
			return $res;
		}
		
		public function updateemployerAccounts($data,$employer_accounts_id)
		{
			$setdata = array();
			$where=array();
			$date = date('Y-m-d H:i:s');
			$password =  md5($data->password);
			$setdata['employer_id'] = $data->employer_id;
			$setdata['email_id'] = $data->email_id;
			$setdata['password'] = $password;
			$setdata['role_type'] = $data->role_type;
			$setdata['modified_by'] = $data->modified_by;
			$setdata['modified_at'] = $date;
			$setdata['is_active'] = '1';
			$where['id'] = $employer_accounts_id;
			$employerTable = new employerTable($this->adapter);
			$res = $employerTable->updateemployerAccountsAction($setdata,$where);
			return $res;
		}
		
		public function deleteemployerAccounts($data,$employer_accounts_id)
		{
			$setdata = array();
			$where=array();
			$date = date('Y-m-d H:i:s');
			$password =  md5($data->password);
			$setdata['employer_id'] = $data->employer_id;
			$setdata['email_id'] = $data->email_id;
			$setdata['password'] = $password;
			$setdata['role_type'] = $data->role_type;
			$setdata['modified_by'] = $data->modified_by;
			$setdata['modified_at'] = $date;
			$setdata['is_active'] = '1';
			$where['id'] = $employer_accounts_id;
			$employerTable = new employerTable($this->adapter);
			$res = $employerTable->deleteemployerAccountsAction($setdata,$where);
			return $res;
		}
		
	public function manageJobsSelectService()
    {
		
		$empTable = new EmployerTable($this->adapter);
		$res = $empTable->manageJobsSelectModel();	
        return $res;
    }
	
	

    
}
