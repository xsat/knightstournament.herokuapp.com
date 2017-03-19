<?php

namespace Common\Models;

use Common\Traits\Dates as DatesTrait;

/**
 * Class Confirm
 * @package Common\Models
 */
class Confirm extends Model
{
    use DatesTrait;

    const STATUS_CONFIRMED = 1;
    const STATUS_DENIED = 2;
    const STATUS_PENDING = 3;

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
    public $token;

    /**
     * @var string
     */
    public $code;

    /**
     * @var integer
     */
    public $status = self::STATUS_PENDING;

    /**
     * @var string
     */
    public $date_create;

    /**
     * @var string
     */
    public $date_update;

    /**
     * @var string
     */
    public $date_expire;
}
