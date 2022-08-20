<?php

namespace App\Http\Controllers;

use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class EmailController extends Controller
{
    public function sendEmail(){
        $reveiverEmailAddress = "jasen192021@gmail.com";

        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the
         * receiver email address.
         *
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */
        Mail::to($reveiverEmailAddress)->send(new HelloEmail);


        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
        if( Mail::flushMacros() > 0 ) {

            echo "There was one or more failures. They were: <br />";

            foreach(Mail::flushMacros() as $email_address) {
                echo " - $email_address <br />";
             }

         } else {
             echo "No errors, all sent successfully!";
         }
    }
}
