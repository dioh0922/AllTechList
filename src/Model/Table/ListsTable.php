<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class ListsTable extends Table{

	public $useTable = "techlist";

	public function initialize(array $config){
		$this->table("techlist");	//既存のテーブルに向けておく
		$this->addBehavior('Timestamp');
	}
}
?>
