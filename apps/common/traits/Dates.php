<?php

namespace Common\Traits;

/**
 * Class Dates
 * @package Common\Traits
 * @property string $date_create
 * @property string $date_update
 */
trait Dates
{
    public function beforeCreate()
    {
        $this->date_create = $this->date_update = date('Y-m-d H:i:s');
    }

    public function beforeUpdate()
    {
        $this->date_update = date('Y-m-d H:i:s');
    }
}
