<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

	public function initialize(array $config){
		$this->table("login");	//既存のテーブルに向けておく
		$this->addBehavior('Timestamp');
	}

	/*
	public function validationDefault(Validator $validator){
		return $validator
			->notEmpty("userID", "ユーザー名の不正")
			->notEmpty("pass", "パスワードの不正")
			->notEmpty("accept", "許可情報の不正")
			->add("")
	}
	*/
}
?>
