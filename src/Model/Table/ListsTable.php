<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ListsTable extends Table{

	public function initialize(array $config){
		$this->setTable("techlist");	//既存のテーブルに向けておく
		$this->addBehavior('Timestamp');
	}

	public function validationDefault(Validator $validator){
		$validator
			->notEmpty("ProjectName", false)	//入力必須(フォームにアイコンがつく)
			->minLength("ProjectName", 3)		//最小文字数(足りないと弾かれる)
			->maxLength("ProjectName", 20)	//最大文字数(入力フォームで制限される)

			->notEmpty("URL", false)
			->minLength("URL", 7);

		return $validator;
	}
}
?>
