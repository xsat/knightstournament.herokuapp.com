<?php

namespace Common\Models;

/**
 * Class Message
 * @package Common\Models
 */
class Message extends Model
{
    const STATUS_VIEWED = 1;
    const STATUS_PENDING = 2;

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
    public $partner_id;

    /**
     * @var string
     */
    public $content;

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
