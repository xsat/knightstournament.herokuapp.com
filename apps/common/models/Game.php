<?php

namespace Common\Models;

use Common\Traits\Dates;

/**
 * Class Game
 * @package Common\Models
 */
class Game extends Model
{
    use Dates;

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

    public function initialize()
    {
        $this->hasMany('id', 'Common\Models\Player', 'game_id', [
            'alias' => 'players',
        ]);

        $this->hasMany('id', 'Common\Models\Step', 'step_id', [
            'alias' => 'steps',
        ]);
    }
}
