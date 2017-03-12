<?php

namespace Frontend\Mail;

/**
 * Interface MailInterface
 * @package Frontend\Mail
 */
interface MailInterface
{
    /**
     * @return bool
     */
    public function send();
}
