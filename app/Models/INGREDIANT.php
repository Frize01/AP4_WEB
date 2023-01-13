<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class INGREDIANT
 * 
 * @property int $ID_INGREDANT
 * @property string $NOM_INGREDIANT
 * 
 * @property Collection|CONTIENT[] $c_o_n_t_i_e_n_t_s
 * @property Collection|STOCK[] $s_t_o_c_k_s
 *
 * @package App\Models
 */
class INGREDIANT extends Model
{
	protected $table = 'INGREDIANT';
	protected $primaryKey = 'ID_INGREDANT';
	public $timestamps = false;

	protected $fillable = [
		'NOM_INGREDIANT'
	];

	public function c_o_n_t_i_e_n_t_s()
	{
		return $this->hasMany(CONTIENT::class, 'ID_INGREDANT');
	}

	public function s_t_o_c_k_s()
	{
		return $this->hasMany(STOCK::class, 'ID_INGREDANT');
	}
}
