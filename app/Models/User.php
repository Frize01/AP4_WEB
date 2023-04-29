<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use App\Models\STAFF;
use App\Models\CLIENT;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\SERVEUR;
use App\Models\COMMANDE;
use App\Models\ADMINISTRATEUR;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class USER
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $password_resets
 * 
 * @property ADMINISTRATEUR $a_d_m_i_n_i_s_t_r_a_t_e_u_r
 * @property CLIENT $c_l_i_e_n_t
 * @property Collection|COMMANDE[] $c_o_m_m_a_n_d_e_s
 * @property SERVEUR $s_e_r_v_e_u_r
 * @property STAFF $s_t_a_f_f
 *
 * @package App\Models
 */
class USER extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'USERS';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'password_resets'
	];

	protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function a_d_m_i_n_i_s_t_r_a_t_e_u_r()
	{
		return $this->hasOne(ADMINISTRATEUR::class, 'ID');
	}

	public function client()
	{
		return $this->hasOne(CLIENT::class, 'ID');
	}

	public function c_o_m_m_a_n_d_e_s()
	{
		return $this->hasMany(COMMANDE::class, 'ID');
	}

	public function serveur()
	{
		return $this->hasOne(SERVEUR::class, 'ID');
	}

	public function s_t_a_f_f()
	{
		return $this->hasOne(STAFF::class, 'ID');
	}
}