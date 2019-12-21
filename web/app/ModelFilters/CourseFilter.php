<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CourseFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function level($levelId)
    {
        return $levelId == -1 ?: $this->whereHas('module', function ($moduleQuery) use ($levelId) {
            return $moduleQuery->whereHas('classe', function ($classeQuery) use ($levelId) {
                return $classeQuery->whereHas('subLevel', function ($subLevelQuery) use ($levelId) {
                    $subLevelQuery->where('level_id', $levelId);
                });
            });
        });
    }

    public function subLevel($subLevelId)
    {
        return $subLevelId == -1 ?: $this->whereHas('module', function ($moduleQuery) use ($subLevelId) {
            return $moduleQuery->whereHas('classe', function ($classeQuery) use ($subLevelId) {
                $classeQuery->where('sub_level_id', $subLevelId);
            });
        });
    }

    public function class($classId)
    {
        return $classId == -1 ?: $this->whereHas('module', function ($moduleQuery) use ($classId) {
            return $moduleQuery->where('classe_id', $classId);
        });
    }

    public function module($moduleId)
    {
        return $moduleId == -1 ?: $this->where('module_id', $moduleId);
    }
}
