<?php

namespace Common\Models;

use Common\Traits\Dates as DatesTrait;

/**
 * Class Settings
 * @package Common\Models
 */
class Settings extends Model
{
    use DatesTrait;

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

    public function initialize()
    {
        $this->setSource('settings');

        $this->belongsTo('user_id', 'Common\Models\User', 'id', [
            'alias' => 'user',
        ]);
    }
}
