<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\STAFF;
use App\Models\CLIENT;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\SERVEUR;
use App\Models\COMMANDE;
use App\Models\ADMINISTRATEUR;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class USER
 * 
 * @property int $ID
 * @property string $NAME
 * @property string $EMAIL
 * @property Carbon|null $EMAIL_VERIFIED_AT
 * @property string $PASSWORD
 * @property string|null $REMEMBER_TOKEN
 * @property Carbon|null $CREATED_AT
 * @property Carbon|null $UPDATED_AT
 * 
 * @property ADMINISTRATEUR $administrateur
 * @property CLIENT $client
 * @property Collection|COMMANDE[] $commandes
 * @property SERVEUR $serveur
 * @property STAFF $staff
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'USERS';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $dates = [
		'EMAIL_VERIFIED_AT',
		'CREATED_AT',
		'UPDATED_AT'
	];

	protected $fillable = [
		'NAME',
		'EMAIL',
		'EMAIL_VERIFIED_AT',
		'PASSWORD',
		'REMEMBER_TOKEN',
		'CREATED_AT',
		'UPDATED_AT'
	];

	public function a_d_m_i_n_i_s_t_r_a_t_e_u_r()
	{
		return $this->hasOne(ADMINISTRATEUR::class, 'ID');
	}

	public function client()
	{
		return $this->hasOne(CLIENT::class, 'ID');
	}

	public function commandes()
	{
		return $this->hasMany(COMMANDE::class, 'ID');
	}

	public function serveur()
	{
		return $this->hasOne(SERVEUR::class, 'ID');
	}

	public function staff()
	{
		return $this->hasOne(STAFF::class, 'ID');
	}
}
