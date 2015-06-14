<?php namespace App\Repo\Users;

interface UserRepositoryInterface {
	
	public function find( $userId);
	
	public function store( $data );

	public function owns($restaurant);
}