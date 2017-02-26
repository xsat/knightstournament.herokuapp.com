<?php

namespace Common\Models;

/**
 * Class Transaction
 * @package Common\Models
 */
class Transaction extends Model
{
    const TYPE_NONE = 0;
    const TYPE_ADD = 1;
    const TYPE_BUY = 2;

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
     * @var integer
     */
    public $amount;

    /**
     * @var integer
     */
    public $type = self::TYPE_NONE;

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
}
