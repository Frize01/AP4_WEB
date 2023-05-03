<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TABLECLIENT
 * 
 * @property int $ID_RESTAURANT
 * @property int $ID_TABLE
 * @property string $LIBELLE_TABLE
 * 
 * @property RESTAURANT $r_e_s_t_a_u_r_a_n_t
 * @property Collection|SURPLACE[] $s_u_r_p_l_a_c_e_s
 *
 * @package App\Models
 */
class TABLECLIENT extends Model
{
	protected $table = 'TABLE_CLIENTS';
	public $incrementing = false;
	public $timestamps = false;
	public $primaryKey = 'ID_TABLE';

	protected $casts = [
		'ID_RESTAURANT' => 'int',
		'ID_TABLE' => 'int'
	];

	protected $fillable = [
		'LIBELLE_TABLE'
	];

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}

	public function s_u_r_p_l_a_c_e_s()
	{
		return $this->hasMany(SURPLACE::class, 'ID_RESTAURANT');
	}
}
