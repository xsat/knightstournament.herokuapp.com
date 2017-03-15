<?php

namespace Common\Models;

use Common\Traits\Dates as DatesTrait;

/**
 * Class Token
 * @package Common\Models
 */
class Token extends Model
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
     * @var string
     */
    public $hash;

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
        $this->setSource('token');

        $this->belongsTo('user_id', 'Common\Models\User', 'id', [
            'alias' => 'user',
        ]);
    }
}
