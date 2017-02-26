<?php

namespace Common\Models;

/**
 * Class Token
 * @package Common\Models
 */
class Token extends Model
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $user_id;

    /**
     * @var string
     */
    public $hash;

    /**
     * @var string
     */
    public $date_create;

    /**
     * @var string
     */
    public $date_update;
}
