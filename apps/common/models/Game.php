<?php

namespace Common\Models;

/**
 * Class Game
 * @package Common\Models
 */
class Game extends Model
{
    const STATUS_STARTED = 1;
    const STATUS_ENDED = 2;
    const STATUS_PENDING = 3;

    /**
     * @var integer
     */
    public $id;

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
