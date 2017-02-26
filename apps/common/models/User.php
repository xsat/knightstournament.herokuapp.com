<?php

namespace Common\Models;

/**
 * Class User
 * @package Common\Models
 */
class User extends Model
{
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
}
