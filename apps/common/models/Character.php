<?php

namespace Common\Models;

use Common\Traits\Dates as DatesTrait;

/**
 * Class Character
 * @package Common\Models
 */
class Character extends Model
{
    use DatesTrait;

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
    public $health = 100;

    /**
     * @var integer
     */
    public $steps = 5;

    /**
     * @var integer
     */
    public $points = 0;

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

        $this->hasMany('id', 'Common\Models\Step', 'character_id', [
            'alias' => 'steps',
        ]);
    }
}
