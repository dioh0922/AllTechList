<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

	//public $useTable = "login";

	public function initialize(array $config){
		$this->setTable("login");	//既存のテーブルに向けておく
		$this->addBehavior('Timestamp');
	}
}
?>
