<?php

namespace Common\Models;

use Common\Traits\Dates;

/**
 * Class Player
 * @package Common\Models
 */
class Player extends Model
{
    use Dates;

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
    public $health;

    /**
     * @var integer
     */
    public $steps;

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

    public function initialize()
    {
        $this->belongsTo('game_id', 'Common\Models\Game', 'id', [
            'alias' => 'game',
        ]);

        $this->belongsTo('user_id', 'Common\Models\User', 'id', [
            'alias' => 'user',
        ]);
    }
}
