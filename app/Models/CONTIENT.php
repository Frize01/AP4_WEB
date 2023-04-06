<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CONTIENT
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_RECETTE
 * @property int $ID_INGREDANT
 * 
 * @property INGREDIANT $i_n_g_r_e_d_i_a_n_t
 * @property RECETTE $r_e_c_e_t_t_e
 *
 * @package App\Models
 */
class CONTIENT extends Model
{
	protected $table = 'CONTIENT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_RECETTE' => 'int',
		'ID_INGREDANT' => 'int'
	];

	public function i_n_g_r_e_d_i_a_n_t()
	{
		return $this->belongsTo(INGREDIANT::class, 'ID_INGREDANT');
	}

	public function r_e_c_e_t_t_e()
	{
		return $this->belongsTo(RECETTE::class, 'ID_RESTAURANT')
					->where('RECETTE.ID_RESTAURANT', '=', 'CONTIENT.ID_RESTAURANT')
					->where('RECETTE.ID_RECETTE', '=', 'CONTIENT.ID_RECETTE');
	}
}
