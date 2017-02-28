<?php

namespace Common\Models;

use Common\Traits\Dates;

/**
 * Class Token
 * @package Common\Models
 */
class Token extends Model
{
    use Dates;

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
        $this->belongsTo('user_id', 'Common\Models\User', 'id', [
            'alias' => 'user',
        ]);
    }
}
