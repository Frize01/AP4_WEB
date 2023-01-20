<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FAVORI
 * 
 * @property int $ID
 * @property int $ID_RESTAURANT
 * 
 * @property CLIENT $c_l_i_e_n_t
 * @property RESTAURANT $r_e_s_t_a_u_r_a_n_t
 *
 * @package App\Models
 */
class FAVORI extends Model
{
	protected $table = 'FAVORIS';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'ID_RESTAURANT' => 'int'
	];

	public function c_l_i_e_n_t()
	{
		return $this->belongsTo(CLIENT::class, 'ID');
	}

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}
}
