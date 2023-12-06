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
     * @param  datatype  $email The email address to send the email to.
     * @param  datatype  $subject The subject of the email.
     * @param  datatype  $message The content of the email.
     * @return string
     *
     * @throws Some_Exception_Class Description of exception.
     */
    public static function sendEmail($email, $subject, $message, $orderId)
    {
        $mailStatus = '';
        try {
            Mail::to($email)->send(new OrderShipped($orderId));
            $mailStatus = 'An Email has been sent to '.$email.'with confirmation and Order Details';
        } catch (Exception $e) {
            $mailStatus = 'There was an error sending the email: '.$e->getMessage();
        }

        return $mailStatus;
    }
}
