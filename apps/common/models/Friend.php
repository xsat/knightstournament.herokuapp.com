<?php

namespace Common\Models;

use Common\Traits\Dates as DatesTrait;

/**
 * Class Friend
 * @package Common\Models
 */
class Friend extends Model
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
     * @var integer
     */
    public $friend_id;

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

    public function initialize()
    {
        $this->belongsTo('user_id', 'Common\Models\User', 'id', [
            'alias' => 'user',
        ]);

        $this->belongsTo('friend_id', 'Common\Models\User', 'id', [
            'alias' => 'friend',
        ]);
    }
}
