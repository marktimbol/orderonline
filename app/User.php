<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'workPhone', 'homePhone', 'mobile', 'restaurantOwner'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function hasAccessTo($restaurant) {

		$userRestaurants = $this->restaurant()->lists('id');
	
		return in_array($restaurant->id, $userRestaurants) ? true : false;

	}

	public function setPasswordAttribute( $password ) {
		$this->attributes['password'] = Hash::make( $password );
	}

	public function restaurant() {
		return $this->hasMany('App\Restaurant');
	}
}
