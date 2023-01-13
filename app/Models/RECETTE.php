<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RECETTE
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_RECETTE
 * @property int $ID_CATEGORIE
 * @property string $NOM_RECETTE
 * @property string $DESCRIPTION_RECETTE
 * @property string $PHOTO_RECETTE
 * @property float $PRIXHT
 * 
 * @property CATEGORIE $c_a_t_e_g_o_r_i_e
 * @property RESTAURANT $r_e_s_t_a_u_r_a_n_t
 * @property Collection|COMPOSER[] $c_o_m_p_o_s_e_r_s
 * @property Collection|CONTIENT[] $c_o_n_t_i_e_n_t_s
 * @property Collection|DEFINIR[] $d_e_f_i_n_i_r_s
 *
 * @package App\Models
 */
class RECETTE extends Model
{
	protected $table = 'RECETTE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_RECETTE' => 'int',
		'ID_CATEGORIE' => 'int',
		'PRIXHT' => 'float'
	];

	protected $fillable = [
		'ID_CATEGORIE',
		'NOM_RECETTE',
		'DESCRIPTION_RECETTE',
		'PHOTO_RECETTE',
		'PRIXHT'
	];

	public function c_a_t_e_g_o_r_i_e()
	{
		return $this->belongsTo(CATEGORIE::class, 'ID_CATEGORIE');
	}

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}

	public function c_o_m_p_o_s_e_r_s()
	{
		return $this->hasMany(COMPOSER::class, 'ID_RESTAURANT');
	}

	public function c_o_n_t_i_e_n_t_s()
	{
		return $this->hasMany(CONTIENT::class, 'ID_RESTAURANT');
	}

	public function d_e_f_i_n_i_r_s()
	{
		return $this->hasMany(DEFINIR::class, 'ID_RESTAURANT');
	}
}
