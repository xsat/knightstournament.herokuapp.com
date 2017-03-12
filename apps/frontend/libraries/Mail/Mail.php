<?php

namespace Frontend\Mail;

use Frontend\Component\Component;

/**
 * Class Mail
 * @package Frontend\Mail
 */
abstract class Mail extends Component implements MailInterface
{
    /**
     * @return bool
     */
    public function send()
    {
        return true;
    }

    /**
     * @return string
     */
    protected function getHeaders()
    {
        return 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    }

    /**
     * @return string
     */
    protected abstract function getContent();

    /**
     * @return string
     */
    protected abstract function getSubject();
}
