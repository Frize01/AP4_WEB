<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class CLIENT
 * 
 * @property int $ID
 * 
 * @property USER $u_s_e_r
 * @property Collection|FAVORI[] $f_a_v_o_r_i_s
 *
 * @package App\Models
 */
class CLIENT extends Model
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'CLIENT';
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

	public function f_a_v_o_r_i_s()
	{
		return $this->hasMany(FAVORI::class, 'ID');
	}
}
