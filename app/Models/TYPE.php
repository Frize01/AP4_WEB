<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TYPE
 * 
 * @property int $ID_TYPE
 * @property string $LIBELLE_TYPE
 * 
 * @property Collection|DEFINIR[] $d_e_f_i_n_i_r_s
 *
 * @package App\Models
 */
class TYPE extends Model
{
	protected $table = 'TYPE';
	protected $primaryKey = 'ID_TYPE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE_TYPE'
	];

	public function d_e_f_i_n_i_r_s()
	{
		return $this->hasMany(DEFINIR::class, 'ID_TYPE');
	}
}
