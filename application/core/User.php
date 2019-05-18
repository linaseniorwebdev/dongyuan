<?php

class User {
	private $id;		    // User ID
	private $permission;    // User Permission
	private $status;        // User status

	public function __construct() {
		// Empty constructor
	}

	public static function init(array $arr) {
		$instance               = new self();
		$instance->id           = $arr['id'];
		$instance->permission   = (int)$arr['permission'];
		$instance->status       = (int)$arr['status'];
		return $instance;
	}

	public function getId() {
		return $this->id;
	}

	public function getPermission() {
		return $this->permission;
	}

	public function getStatus() {
		return $this->status;
	}
}