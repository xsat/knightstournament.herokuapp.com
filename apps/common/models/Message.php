<?php

namespace Common\Models;

use Common\Traits\Dates as DatesTrait;

/**
 * Class Message
 * @package Common\Models
 */
class Message extends Model
{
    use DatesTrait;

    const STATUS_VIEWED = 1;
    const STATUS_PENDING = 2;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $sender_id;

    /**
     * @var integer
     */
    public $receiver_id;

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

    public function initialize()
    {
        $this->setSource('message');

        $this->belongsTo('sender_id', 'Common\Models\User', 'id', [
            'alias' => 'user',
        ]);

        $this->belongsTo('receiver_id', 'Common\Models\User', 'id', [
            'alias' => 'receiver',
        ]);
    }
}
