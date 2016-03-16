<?php
namespace Users\Service;

use Zend\View\Model\ViewModel;
use Users\Model\UsersTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;

use Zend\Validator\Db\RecordExists;

use Zend\Cache\StorageFactory;

class UsersService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }
 
    public function latestJobsSelectService()
    {
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->latestJobsSelectModel();	
        return $res;
    }
	
	public function featuredJobsSelectService()
    {
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->featuredJobsSelectModel();	
        return $res;
    }
	
	public function featuredCompaniesSelectService()
    {
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->featuredCompaniesSelectModel();	
        return $res;
    }
	public function addSavedJobsSearches($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['user_id'] = $data->user_id;
		$setdata['keywords'] = $data->keywords;
		$setdata['location'] = $data->location;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->user_id;
 		$setdata['is_active'] = '1';
		 
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->addSavedJobsSearches($setdata);
		 
        return $res;
    }
	
		
	public function updateSavedJobsSearches($data,$saved_job_searches_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['user_id'] = $data->user_id;
		$setdata['keywords'] = $data->keywords;
		$setdata['location'] = $data->location;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->user_id;
 		$setdata['is_active'] = '1';
		$where['id']  = $saved_job_searches_id;
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->updateSavedJobsSearches($setdata,$where);
		 
        return $res;
    }
	
	public function deleteSavedJobsSearches($data,$saved_job_searches_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['user_id'] = $data->user_id;
		$setdata['keywords'] = $data->keywords;
		$setdata['location'] = $data->location;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->user_id;
 		$setdata['is_active'] = '1';
		$where['id']  = $saved_job_searches_id;
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->deleteSavedJobsSearches($setdata,$where);
		 
        return $res;
    }
	
	public function addSavedJobs($data)
    {
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$setdata['user_id'] = $data->user_id;
		$setdata['job_id'] = $data->job_id;
		$setdata['created_at'] = $date;
		$setdata['created_by'] = $data->user_id;
 		$setdata['is_active'] = '1';
		 
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->addSavedJobs($setdata);
		 
        return $res;
    }
	
	public function updateSavedJobs($data,$saved_job_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['user_id'] = $data->user_id;
		$setdata['job_id'] = $data->job_id;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->user_id;
 		$setdata['is_active'] = '1';
		$where['id']  = $saved_job_id;
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->updateSavedJobs($setdata,$where);
		 
        return $res;
    }
	
	public function deleteSavedJobs($data,$saved_job_id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$setdata['user_id'] = $data->user_id;
		$setdata['job_id'] = $data->job_id;
		$setdata['modified_at'] = $date;
		$setdata['modified_by'] = $data->user_id;
 		$setdata['is_active'] = '1';
		$where['id']  = $saved_job_id;
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->deleteSavedJobs($setdata,$where);
		 
        return $res;
    }
	
	public function updateMyAccountService($data,$id)
    {
		
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->updateMyAccountAction($data,$id);	
        return $res;
    }
	public function deleteMyAccountService($data,$id)
    {
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->deleteMyAccountAction($data,$id);	
        return $res;
    }
	public function updateJobdescService($data,$id)
    {
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$token = $data->token;
		$setdata['title'] = $data->title;
		$setdata['experience_years'] = $data->experience_years;
		$setdata['experience_months'] = $data->experience_months;
		$setdata['salary_per_annum_lakhs'] = $data->salary_per_annum_lakhs;
		$setdata['salary_per_annum_thousand'] = $data->salary_per_annum_thousand;
		$setdata['designation'] = $data->designation;
		$setdata['preferred_designation'] = $data->preferred_designation;
		$setdata['preferred_location'] = $data->preferred_location;
		$setdata['expected_salary'] = $data->expected_salary;
		//Jobs
		$setdata_jobs['description'] = $data->description;
		$setdata_jobs['detail_description'] = $data->detail_description;
		$setdata_jobs['contact_person'] = $data->contact_person;
		$setdata_jobs['contact_number'] = $data->contact_number;
		$setdata_jobs['contact_address'] = $data->contact_address;
		$setdata_jobs['interview_time'] = $data->interview_time;
		$where['user_id']  = $id;
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->updateJobdescAction($setdata,$where,$token,$setdata_jobs);
        return $res;
    }
	public function deleteJobdescService($data,$id)
    {
		$setdata = array();
		$where = array();
		
		$token = $data->token;
		$setdata['title'] = $data->title;
		$setdata['experience_years'] = $data->experience_years;
		$setdata['experience_months'] = $data->experience_months;
		$setdata['salary_per_annum_lakhs'] = $data->salary_per_annum_lakhs;
		$setdata['salary_per_annum_thousand'] = $data->salary_per_annum_thousand;
		$setdata['designation'] = $data->designation;
		$setdata['preferred_designation'] = $data->preferred_designation;
		$setdata['preferred_location'] = $data->preferred_location;
		$setdata['expected_salary'] = $data->expected_salary;
		//Jobs
		$setdata_jobs['description'] = $data->description;
		$setdata_jobs['detail_description'] = $data->detail_description;
		$setdata_jobs['contact_person'] = $data->contact_person;
		$setdata_jobs['contact_number'] = $data->contact_number;
		$setdata_jobs['contact_address'] = $data->contact_address;
		$setdata_jobs['interview_time'] = $data->interview_time;
		$where['user_id']  = $id;
		
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->deleteJobdescAction($setdata,$where,$token,$setdata_jobs);
        return $res;
    }

	public function changePasswordSelectService($data,$id)
    {
	
		$usersTable = new UsersTable($this->adapter);
		$res = $usersTable->changePasswordSelectModel($data,$id);	
        return $res;
    }
	
	public function insertprofessionalDetailsService($data)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		//Professional Details
		$setdata_details['cover_note'] = $data->cover_note;
		$setdata_details['company_name'] = $data->company_name;
		$setdata_details['company_id'] = $data->company_id;
		$setdata_details['duration_from'] = $data->duration_from;
		$setdata_details['duration_to'] = $data->duration_to;
		$setdata_details['created_at'] = $date;
		$setdata_details['user_id'] = $data->user_id;
		$setdata_details['created_by'] = $data->user_id;
 		$setdata_details['is_active'] = '1';
		//Professional Projects
		$setdata_projects['client'] = $data->client;
		$setdata_projects['project_name'] = $data->project_name;
 		$setdata_projects['role'] = $data->role;
		$setdata_projects['team_strength'] = $data->team_strength;
		$setdata_projects['skills_used'] = $data->skills_used;
 		$setdata_projects['remarks'] = $data->remarks;
		$setdata_projects['user_id'] = $data->user_id;
		$setdata_projects['created_at'] = $date;
		$setdata_projects['created_by'] = $data->user_id;
 		$setdata_projects['is_active'] = '1';
		$res = $usersTable->insertprofessionalDetailsAction($setdata_details,$setdata_projects,$token);	
        return $res;
    }
	public function insertpersonalDetailsService($data)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;

		$setdata['title'] = $data->title;
		$setdata['objective'] = $data->objective;
 		$setdata['dob'] = $data->dob;
		$setdata['gender'] = $data->gender;
		$setdata['experience_years'] = $data->experience_years;
 		$setdata['experience_months'] = $data->experience_months;
		$setdata['salary_per_annum_lakhs'] = $data->salary_per_annum_lakhs;
		$setdata['salary_per_annum_thousand'] = $data->salary_per_annum_thousand;
		$setdata['designation'] = $data->designation;
		$setdata['preferred_designation'] = $data->preferred_designation;
		$setdata['preferred_location'] = $data->preferred_location;
		$setdata['expected_salary'] = $data->expected_salary;
		$setdata['notice_period_months'] = $data->notice_period_months;
		$setdata['skype_id'] = $data->skype_id;
 		$setdata['gtalk_id'] = $data->gtalk_id;
		$setdata['yahoo_messenger_id'] = $data->yahoo_messenger_id;
		$setdata['linkedin_url'] = $data->linkedin_url;
		$setdata['resume_url'] = $data->resume_url;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->insertpersonalDetailsAction($setdata,$token);	
        return $res;
    }
	public function updateprofessionalDetailsService($data,$professional_id)
    {
		
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $professional_id;
		//Professional Details
		$setdata_details['cover_note'] = $data->cover_note;
		$setdata_details['company_name'] = $data->company_name;
		$setdata_details['company_id'] = $data->company_id;
		$setdata_details['duration_from'] = $data->duration_from;
		$setdata_details['duration_to'] = $data->duration_to;
		$setdata_details['modified_at'] = $date;
		$setdata_details['user_id'] = $data->user_id;
		$setdata_details['modified_by'] = $data->user_id;
 		$setdata_details['is_active'] = '1';
		//Professional Projects
		$setdata_projects['client'] = $data->client;
		$setdata_projects['project_name'] = $data->project_name;
 		$setdata_projects['role'] = $data->role;
		$setdata_projects['team_strength'] = $data->team_strength;
		$setdata_projects['skills_used'] = $data->skills_used;
 		$setdata_projects['remarks'] = $data->remarks;
		$setdata_projects['user_id'] = $data->user_id;
		$setdata_projects['modified_at'] = $date;
		$setdata_projects['modified_by'] = $data->user_id;
 		$setdata_projects['is_active'] = '1';
		$res = $usersTable->updateprofessionalDetailsAction($setdata_details,$setdata_projects,$token,$where);	
        return $res;
    }
	
	public function updatepersonalDetailsService($data,$personal_id)
    {
		
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $personal_id;
		$setdata['title'] = $data->title;
		$setdata['objective'] = $data->objective;
 		$setdata['dob'] = $data->dob;
		$setdata['gender'] = $data->gender;
		$setdata['experience_years'] = $data->experience_years;
 		$setdata['experience_months'] = $data->experience_months;
		$setdata['salary_per_annum_lakhs'] = $data->salary_per_annum_lakhs;
		$setdata['salary_per_annum_thousand'] = $data->salary_per_annum_thousand;
		$setdata['designation'] = $data->designation;
		$setdata['preferred_designation'] = $data->preferred_designation;
		$setdata['preferred_location'] = $data->preferred_location;
		$setdata['expected_salary'] = $data->expected_salary;
		$setdata['notice_period_months'] = $data->notice_period_months;
		$setdata['skype_id'] = $data->skype_id;
 		$setdata['gtalk_id'] = $data->gtalk_id;
		$setdata['yahoo_messenger_id'] = $data->yahoo_messenger_id;
		$setdata['linkedin_url'] = $data->linkedin_url;
		$setdata['resume_url'] = $data->resume_url;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->updatepersonalDetailsAction($setdata,$token,$where);	
        return $res;
    }
	
	public function deleteprofessionalDetailsService($data,$professional_id)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $professional_id;
		//Professional Details
		$setdata_details['cover_note'] = $data->cover_note;
		$setdata_details['company_name'] = $data->company_name;
		$setdata_details['company_id'] = $data->company_id;
		$setdata_details['duration_from'] = $data->duration_from;
		$setdata_details['duration_to'] = $data->duration_to;
		$setdata_details['modified_at'] = $date;
		$setdata_details['user_id'] = $data->user_id;
		$setdata_details['modified_by'] = $data->user_id;
 		$setdata_details['is_active'] = '1';
		//Professional Projects
		$setdata_projects['client'] = $data->client;
		$setdata_projects['project_name'] = $data->project_name;
 		$setdata_projects['role'] = $data->role;
		$setdata_projects['team_strength'] = $data->team_strength;
		$setdata_projects['skills_used'] = $data->skills_used;
 		$setdata_projects['remarks'] = $data->remarks;
		$setdata_projects['user_id'] = $data->user_id;
		$setdata_projects['modified_at'] = $date;
		$setdata_projects['modified_by'] = $data->user_id;
 		$setdata_projects['is_active'] = '1';
		$res = $usersTable->deleteprofessionalDetailsAction($setdata_details,$setdata_projects,$token,$where);	
        return $res;
    }
	public function skillsUsedService($data)
    {
		
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$setdata['skills_used'] = $data->skills_used;
		//$where = array();
		//$where['id']  = $professional_id;
		$res = $usersTable->skillsUsedAction($setdata);	
        return $res;
    }
	
	public function deletepersonalDetailsService($data,$personal_id)
    {
		
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $personal_id;
		$setdata['title'] = $data->title;
		$setdata['objective'] = $data->objective;
 		$setdata['dob'] = $data->dob;
		$setdata['gender'] = $data->gender;
		$setdata['experience_years'] = $data->experience_years;
 		$setdata['experience_months'] = $data->experience_months;
		$setdata['salary_per_annum_lakhs'] = $data->salary_per_annum_lakhs;
		$setdata['salary_per_annum_thousand'] = $data->salary_per_annum_thousand;
		$setdata['designation'] = $data->designation;
		$setdata['preferred_designation'] = $data->preferred_designation;
		$setdata['preferred_location'] = $data->preferred_location;
		$setdata['expected_salary'] = $data->expected_salary;
		$setdata['notice_period_months'] = $data->notice_period_months;
		$setdata['skype_id'] = $data->skype_id;
 		$setdata['gtalk_id'] = $data->gtalk_id;
		$setdata['yahoo_messenger_id'] = $data->yahoo_messenger_id;
		$setdata['linkedin_url'] = $data->linkedin_url;
		$setdata['resume_url'] = $data->resume_url;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->deletepersonalDetailsAction($setdata,$token,$where);	
        return $res;
    }

	public function inserteducationalcertificationService($data)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;

		$setdata['institute'] = $data->institute;
		$setdata['passedyear_from_month'] = $data->passedyear_from_month;
 		$setdata['passedyear_from_year'] = $data->passedyear_from_year;
		$setdata['passedyear_to_month'] = $data->passedyear_to_month;
		$setdata['passedyear_to_year'] = $data->passedyear_to_year;
		$setdata['created_at'] = $date;
 		$setdata['created_by'] = $data->user_id;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->inserteducationalcertificationAction($setdata,$token);	
        return $res;
    }
	
	public function updateeducationalcertificationService($data,$educational_cert_id)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $educational_cert_id;
		$setdata['institute'] = $data->institute;
		$setdata['passedyear_from_month'] = $data->passedyear_from_month;
 		$setdata['passedyear_from_year'] = $data->passedyear_from_year;
		$setdata['passedyear_to_month'] = $data->passedyear_to_month;
		$setdata['passedyear_to_year'] = $data->passedyear_to_year;
		$setdata['modified_at'] = $date;
 		$setdata['modified_by'] = $data->modified_by;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->updateeducationalcertificationAction($setdata,$token,$where);	
        return $res;
    }
	
	public function deleteeducationalcertificationService($data,$educational_cert_id)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $educational_cert_id;
		$setdata['institute'] = $data->institute;
		$setdata['passedyear_from_month'] = $data->passedyear_from_month;
 		$setdata['passedyear_from_year'] = $data->passedyear_from_year;
		$setdata['passedyear_to_month'] = $data->passedyear_to_month;
		$setdata['passedyear_to_year'] = $data->passedyear_to_year;
		$setdata['modified_at'] = $date;
 		$setdata['modified_by'] = $data->modified_by;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->deleteeducationalcertificationAction($setdata,$token,$where);	
        return $res;
    }
	
	
	public function inserteducationalgraduationService($data)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$date = date('Y-m-d H:i:s');
		$token=$data->token;

		$setdata['university_name'] = $data->university_name;
		$setdata['university_id'] = $data->university_id;
		$setdata['mode_of_education'] = $data->mode_of_education;
		$setdata['degree'] = $data->degree;
		$setdata['specialization'] = $data->specialization;
 		$setdata['passedyear_from_year'] = $data->passedyear_from_year;
		$setdata['passedyear_to_month'] = $data->passedyear_to_month;
		$setdata['passedyear_to_year'] = $data->passedyear_to_year;
		$setdata['created_at'] = $date;
 		$setdata['created_by'] = $data->user_id;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->inserteducationalgraduationAction($setdata,$token);	
        return $res;
    }
	
	public function updateeducationalgraduationService($data,$educational_grad_id)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $educational_grad_id;
		$setdata['university_name'] = $data->university_name;
		$setdata['university_id'] = $data->university_id;
		$setdata['mode_of_education'] = $data->mode_of_education;
		$setdata['degree'] = $data->degree;
		$setdata['specialization'] = $data->specialization;
 		$setdata['passedyear_from_year'] = $data->passedyear_from_year;
		$setdata['passedyear_to_month'] = $data->passedyear_to_month;
		$setdata['passedyear_to_year'] = $data->passedyear_to_year;
		$setdata['modified_at'] = $date;
 		$setdata['modified_by'] = $data->modified_by;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->updateeducationalgraduationAction($setdata,$token,$where);	
        return $res;
    }
	
	public function deleteeducationalgraduationService($data,$educational_grad_id)
    {
		$usersTable = new UsersTable($this->adapter);
		$setdata = array();
		$where = array();
		
		$date = date('Y-m-d H:i:s');
		$token=$data->token;
		$where['id']  = $educational_grad_id;
		$setdata['institute'] = $data->institute;
		$setdata['passedyear_from_month'] = $data->passedyear_from_month;
 		$setdata['passedyear_from_year'] = $data->passedyear_from_year;
		$setdata['passedyear_to_month'] = $data->passedyear_to_month;
		$setdata['passedyear_to_year'] = $data->passedyear_to_year;
		$setdata['modified_at'] = $date;
 		$setdata['modified_by'] = $data->modified_by;
		$setdata['user_id'] = $data->user_id;
		$res = $usersTable->deleteeducationalgraduationAction($setdata,$token,$where);	
        return $res;
    }
	
	public function visibiltySettingsSelect($data,$user_id)
    {
		$usersTable = new usersTable($this->adapter);
		$res = $usersTable->visibilitySettingsAction($data,$user_id);
        return $res;
    }

	
	
}

