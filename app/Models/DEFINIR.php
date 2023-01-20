<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DEFINIR
 * 
 * @property int $ID_TYPE
 * @property int $ID_RESTAURANT
 * @property int $ID_RECETTE
 * 
 * @property RECETTE $r_e_c_e_t_t_e
 * @property TYPE $t_y_p_e
 *
 * @package App\Models
 */
class DEFINIR extends Model
{
	protected $table = 'DEFINIR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_TYPE' => 'int',
		'ID_RESTAURANT' => 'int',
		'ID_RECETTE' => 'int'
	];

	public function r_e_c_e_t_t_e()
	{
		return $this->belongsTo(RECETTE::class, 'ID_RESTAURANT')
					->where('RECETTE.ID_RESTAURANT', '=', 'DEFINIR.ID_RESTAURANT')
					->where('RECETTE.ID_RECETTE', '=', 'DEFINIR.ID_RECETTE');
	}

	public function t_y_p_e()
	{
		return $this->belongsTo(TYPE::class, 'ID_TYPE');
	}
}
