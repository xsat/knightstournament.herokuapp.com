<?php

namespace Server\Tasks;

/**
 * Class MainTask
 * @package Server\Tasks
 */
class MainTask extends Task
{
    public function mainAction(array $params)
    {
        var_dump($params);
    }

    public function testAction(array $params)
    {
        var_dump($params);
    }
}
