<?php
class Icuadmission extends Base {
	public $id;
	public $status;
	public $age;
	public $race;
	public $service;
	public $cancer;
	public $renal;
	public $infection;
	public $cpr;
	public $systolic;
	public $heartrate;
	public $previous;
	public $type;
	public $fracture;
	public $po2;
	public $ph;
	public $pco2;
	public $bicarbonate;
	public $creatinine;
	public $consciousness;
	
	public $table;

	function __construct() {
	    $this->table = 'pages';
	  }
}