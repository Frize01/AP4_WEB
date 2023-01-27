<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
 * @property ADMINISTRATEUR $a_d_m_i_n_i_s_t_r_a_t_e_u_r
 * @property CLIENT $c_l_i_e_n_t
 * @property Collection|COMMANDE[] $c_o_m_m_a_n_d_e_s
 * @property SERVEUR $s_e_r_v_e_u_r
 * @property STAFF $s_t_a_f_f
 *
 * @package App\Models
 */
class USER extends Model
{
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

	public function c_l_i_e_n_t()
	{
		return $this->hasOne(CLIENT::class, 'ID');
	}

	public function c_o_m_m_a_n_d_e_s()
	{
		return $this->hasMany(COMMANDE::class, 'ID');
	}

	public function s_e_r_v_e_u_r()
	{
		return $this->hasOne(SERVEUR::class, 'ID');
	}

	public function s_t_a_f_f()
	{
		return $this->hasOne(STAFF::class, 'ID');
	}
}
