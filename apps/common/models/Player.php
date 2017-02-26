<?php

namespace Common\Models;

/**
 * Class Player
 * @package Common\Models
 */
class Player extends Model
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $game_id;

    /**
     * @var integer
     */
    public $user_id;

    /**
     * @var integer
     */
    public $points;

    /**
     * @var string
     */
    public $date_create;

    /**
     * @var string
     */
    public $date_update;
}
