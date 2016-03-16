<?php
namespace Register\Service;
use Zend\View\Model\ViewModel;
use Register\Model\RegisterTable;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\Db\Adapter\Adapter;
use Zend\Validator\Db\RecordExists;


class RegisterService
{    
    public function __construct(Adapter $adapter) {
      $this->adapter = $adapter;
    }

    public function signup($data)
    {
	
		$date = date('Y-m-d H:i:s');
		$setdata = array();
		$token = md5($data->email_id.time());
		$password =  md5($data->password);
		$setdata['token'] = $token;
		$setdata['first_name'] = $data->first_name;
		$setdata['last_name'] = $data->last_name;
		$setdata['email_id'] = $data->email_id;
		$setdata['password'] = $password;
		$setdata['user_type'] = $data->user_type;
		$setdata['address1'] = $data->address1;
		$setdata['address2'] = $data->address2;
		$setdata['country'] = $data->country;
		$setdata['state'] = $data->state;
		$setdata['city'] = $data->city;
		$setdata['area'] = $data->area;
		$setdata['postal_code'] = $data->postal_code;
		$setdata['latitude'] = $data->latitude;
		$setdata['longitude'] = $data->longitude;
		$setdata['gender'] = $data->gender;
		$setdata['birthdate'] = $data->birthdate;
		$setdata['phone'] = $data->phone;
		$setdata['phone2'] = $data->phone2;
		$setdata['phone3'] = $data->phone3;
		$setdata['mobile'] = $data->mobile;
		$setdata['mobile2'] = $data->mobile2;
		$setdata['mobile3'] = $data->mobile3;
		$setdata['profile_picture'] = $data->profile_picture;
		$setdata['blood_group_id'] = $data->blood_group_id;
		$setdata['blood_donation'] = $data->blood_donation;
		$setdata['verification_code'] = $data->verification_code;
		$setdata['is_verified'] = $data->is_verified;
		$setdata['last_login'] = $data->last_login;
		$setdata['role_default_id'] = $data->role_default_id;
		$setdata['secret_question'] = $data->secret_question;
		$setdata['secret_answer'] = $data->secret_answer;
		$setdata['is_profile_completed'] = $data->is_profile_completed;
		$setdata['is_profile_ms_completed'] = $data->is_profile_ms_completed;
		$setdata['last_login'] = $date;
		$setdata['created_by'] = $data->created_by;
		$setdata['created_at'] = $date;
 		$setdata['is_active'] = '1';
		$registerTable = new RegisterTable($this->adapter);
		$res = $registerTable->saveRegister($setdata);	
        return $res;
    }
    
   public function userLogindata($data)
    {
		$registerTable = new RegisterTable($this->adapter);
		$res = $registerTable->saveLogin($data);	
        return $res;
    }
	

    
}
