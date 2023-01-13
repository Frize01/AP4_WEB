<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RESTAURANT
 * 
 * @property int $ID_RESTAURANT
 * @property string $NOM_RESTAURANT
 * @property string $ADRESSE_RESTAURANT
 * @property string|null $LOGO_RESTAURANT
 * @property string|null $BG_RESTAURANT
 * @property string $COULEUR_SITE
 * 
 * @property Collection|FAVORI[] $f_a_v_o_r_i_s
 * @property Collection|PHOTO[] $p_h_o_t_o_s
 * @property Collection|RECETTE[] $r_e_c_e_t_t_e_s
 * @property Collection|SERVEUR[] $s_e_r_v_e_u_r_s
 * @property Collection|STAFF[] $s_t_a_f_f
 * @property Collection|STOCK[] $s_t_o_c_k_s
 * @property Collection|TABLECLIENT[] $t_a_b_l_e_c_l_i_e_n_t_s
 *
 * @package App\Models
 */
class RESTAURANT extends Model
{
	protected $table = 'RESTAURANT';
	protected $primaryKey = 'ID_RESTAURANT';
	public $timestamps = false;

	protected $fillable = [
		'NOM_RESTAURANT',
		'ADRESSE_RESTAURANT',
		'LOGO_RESTAURANT',
		'BG_RESTAURANT',
		'COULEUR_SITE'
	];

	public function f_a_v_o_r_i_s()
	{
		return $this->hasMany(FAVORI::class, 'ID_RESTAURANT');
	}

	public function p_h_o_t_o_s()
	{
		return $this->hasMany(PHOTO::class, 'ID_RESTAURANT');
	}

	public function r_e_c_e_t_t_e_s()
	{
		return $this->hasMany(RECETTE::class, 'ID_RESTAURANT');
	}

	public function s_e_r_v_e_u_r_s()
	{
		return $this->hasMany(SERVEUR::class, 'ID_RESTAURANT');
	}

	public function s_t_a_f_f()
	{
		return $this->hasMany(STAFF::class, 'ID_RESTAURANT');
	}

	public function s_t_o_c_k_s()
	{
		return $this->hasMany(STOCK::class, 'ID_RESTAURANT');
	}

	public function t_a_b_l_e_c_l_i_e_n_t_s()
	{
		return $this->hasMany(TABLECLIENT::class, 'ID_RESTAURANT');
	}
}
