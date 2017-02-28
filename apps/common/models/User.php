<?php

namespace Common\Models;

use Common\Traits\Dates;

/**
 * Class User
 * @package Common\Models
 */
class User extends Model
{
    use Dates;

    const STATUS_CONFIRMED = 1;
    const STATUS_BANNED = 2;
    const STATUS_PENDING = 3;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

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

    /**
     * @var string
     */
    public $date_login;

    public function initialize()
    {
        $this->hasMany('id', 'Common\Models\Confirm', 'user_id', [
            'alias' => 'confirms',
        ]);

        $this->hasMany('id', 'Common\Models\Game', 'user_id', [
            'alias' => 'games',
        ]);

        $this->hasMany('id', 'Common\Models\Step', 'user_id', [
            'alias' => 'steps',
        ]);

        $this->hasMany('id', 'Common\Models\Player', 'user_id', [
            'alias' => 'players',
        ]);

        $this->hasMany('id', 'Common\Models\Transaction', 'user_id', [
            'alias' => 'transactions',
        ]);

        $this->hasOne('id', 'Common\Models\Token', 'user_id', [
            'alias' => 'token',
        ]);

        $this->hasOne('id', 'Common\Models\Settings', 'user_id', [
            'alias' => 'settings',
        ]);
    }
}
