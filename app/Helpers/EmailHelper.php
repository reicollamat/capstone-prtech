<?php

namespace App\Helpers;

use App\Mail\OrderShipped;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    /**
     * Sends an email with the given email, subject, and message.
     *
     * @param string $email The email address to send the email to.
     * @param $orderId
     * @return string The status of the email sending
     *
     */
    public static function sendEmail($email, $orderId): string
    {
        $mailStatus = '';
        try {
            Mail::to($email)->send(new OrderShipped($orderId));
            $mailStatus = 'An Email has been sent to '.$email.' with confirmation and Order Details';
        } catch (Exception $e) {
            $mailStatus = 'There was an error sending the email: '.$e->getMessage();
        }

        return $mailStatus;
    }
}
