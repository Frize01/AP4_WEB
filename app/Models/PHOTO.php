<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PHOTO
 * 
 * @property int $ID_PHOTO
 * @property int $ID_RESTAURANT
 * @property string $PHOTO
 * 
 * @property RESTAURANT $r_e_s_t_a_u_r_a_n_t
 *
 * @package App\Models
 */
class PHOTO extends Model
{
	protected $table = 'PHOTO';
	protected $primaryKey = 'ID_PHOTO';
	public $timestamps = false;

	protected $casts = [
		'ID_RESTAURANT' => 'int'
	];

	protected $fillable = [
		'ID_RESTAURANT',
		'PHOTO'
	];

	public function r_e_s_t_a_u_r_a_n_t()
	{
		return $this->belongsTo(RESTAURANT::class, 'ID_RESTAURANT');
	}
}
