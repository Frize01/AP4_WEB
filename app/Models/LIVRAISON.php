<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LIVRAISON
 * 
 * @property int $ID_LIVRAISON
 * @property Carbon $DATE_LIVRAISON
 * 
 * @property Collection|LIVRER[] $l_i_v_r_e_r_s
 *
 * @package App\Models
 */
class LIVRAISON extends Model
{
	protected $table = 'LIVRAISON';
	protected $primaryKey = 'ID_LIVRAISON';
	public $timestamps = false;

	protected $dates = [
		'DATE_LIVRAISON'
	];

	protected $fillable = [
		'DATE_LIVRAISON'
	];

	public function l_i_v_r_e_r_s()
	{
		return $this->hasMany(LIVRER::class, 'ID_LIVRAISON');
	}
}
