<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ADMINISTRATEUR
 * 
 * @property int $ID
 * 
 * @property USER $u_s_e_r
 *
 * @package App\Models
 */
class ADMINISTRATEUR extends Model
{
	protected $table = 'ADMINISTRATEUR';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int'
	];

	public function u_s_e_r()
	{
		return $this->belongsTo(USER::class, 'ID');
	}
}
