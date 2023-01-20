<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TYPETVA
 * 
 * @property int $ID_TYPE_TVA
 * @property string $LIB_TYPE_TVA
 * 
 * @property Collection|TVA[] $t_v_a_s
 *
 * @package App\Models
 */
class TYPETVA extends Model
{
	protected $table = 'TYPE_TVA';
	protected $primaryKey = 'ID_TYPE_TVA';
	public $timestamps = false;

	protected $fillable = [
		'LIB_TYPE_TVA'
	];

	public function t_v_a_s()
	{
		return $this->hasMany(TVA::class, 'ID_TYPE_TVA');
	}
}
