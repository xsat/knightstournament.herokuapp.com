<?php

namespace Common\Models;

/**
 * Class Settings
 * @package Common\Models
 */
class Settings extends Model
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
     * @var integer
     */
    public $send_newsletters = 0;

    /**
     * @var int
     */
    public $friend_requests = 1;

    /**
     * @var int
     */
    public $mute_messages = 0;

    /**
     * @var string
     */
    public $date_create;

    /**
     * @var string
     */
    public $date_update;
}
