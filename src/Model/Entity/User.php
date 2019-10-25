<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity{

	protected function _setPassword($value){
		if(strlen($value)){
			return (new DefaultPasswordHasher)->hash($value);
		}
	}

	//「pass」として送られた場合はここの関数で処理する
	protected function _setpass($value){
		if(strlen($value)){
			return (new DefaultPasswordHasher)->hash($value);
		}
	}
}
?>
