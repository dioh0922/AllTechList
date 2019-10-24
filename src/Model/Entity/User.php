<?php
namespace App\Model\Entity;
use Cake\AuthDefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity{

	protected function _setPassword($value){
		if(strlen($value)){
			$hasher = new AuthDefaultPasswordHasher();

			return $haser->hash($value);
		}
	}
}
?>
