<?php

namespace Frontend\Mail;

use Frontend\Component\Component;

/**
 * Class Mail
 * @package Frontend\Mail
 * @property \PHPMailer $mailer
 */
abstract class Mail extends Component implements MailInterface
{
    /**
     * @return bool
     */
    public function send()
    {
        $this->mailer->isHTML(true);
        $this->mailer->setFrom('noreply@knightstournament.com', 'KnightsTournament');
        $this->mailer->addAddress($this->getAddress(), $this->getName());
        $this->mailer->Subject = $this->getSubject();
        $this->mailer->Body = $this->getBody();

        return $this->mailer->send();
    }

    /**
     * @return string
     */
    protected abstract function getAddress();

    /**
     * @return string
     */
    protected abstract function getName();

    /**
     * @return string
     */
    protected abstract function getSubject();

    /**
     * @return string
     */
    protected abstract function getBody();
}
