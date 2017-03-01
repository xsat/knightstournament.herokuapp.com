<?php

namespace Common\Models;

/**
 * Class Step
 * @package Common\Models
 */
class Step extends Model
{
    const TYPE_NONE = 1;
    const TYPE_MOVE = 2;
    const TYPE_ATTACK = 3;
    const TYPE_BLOCK = 4;

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
    public $character_id;

    /**
     * @var integer
     */
    public $user_id;

    /*
     * @var integer
     */
    public $x;

    /*
     * @var integer
     */
    public $y;

    /**
     * @var integer
     */
    public $type = self::TYPE_NONE;

    public function initialize()
    {
        $this->belongsTo('game_id', 'Common\Models\Game', 'id', [
            'alias' => 'game',
        ]);

        $this->belongsTo('character_id', 'Common\Models\Character', 'id', [
            'alias' => 'character',
        ]);
    }
}
