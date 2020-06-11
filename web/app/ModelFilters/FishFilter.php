<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class FishFilter extends ModelFilter
{
    public function name($name)
    {
    	return $this->where('scientific_name', 'LIKE', '%' . $name . '%')
    				->orWhere('french_name', 'LIKE', '%' . $name . '%');
    }
}
