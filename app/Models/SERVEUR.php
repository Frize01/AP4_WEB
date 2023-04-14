<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SERVEUR
 * 
 * @property int $ID
 * @property int|null $ID_RESTAURANT
 * 
 * @property RESTAURANT|null $r_e_s_t_a_u_r_a_n_t
 * @property USER $u_s_e_r
 * @property Collection|SURPLACE[] $s_u_r_p_l_a_c_e_s
 *
 * @package App\Models
 */
class SERVEUR extends Model
{
	protected $table = 'SERVEUR';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'ID_RESTAURANT' => 'int'
	];

	protected $fillable = [
		'ID_RESTAURANT'
	];

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}

	public function user()
	{
		return $this->belongsTo(USER::class, 'ID');
	}

	public function s_u_r_p_l_a_c_e_s()
	{
		return $this->hasMany(SURPLACE::class, 'ID');
	}
}
