<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($value)
	{
		$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
		return $utc->setTimezone('America/Chicago')->toDayDateTimeString();
	}

	public function getUpdatedAtAttribute($value)
	{
		$utc = \Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
		return $utc->setTimezone('America/Chicago')->toDayDateTimeString();
	}
}

