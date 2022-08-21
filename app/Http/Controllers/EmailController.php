<?php

namespace App\Http\Controllers;

use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;


class EmailController extends Controller
{
    public function sendEmail(Request $request){


        $email_data = new Email();

        $email_data->idIns = $request->idIns;
        $email_data->link = $request->link;
        $email_data->to = $request->to;
        $email_data->cc = $request->cc;

        $reveiverEmailAddress = $email_data->to;

        Mail::to($reveiverEmailAddress)
              ->cc($email_data->cc)
              ->send(new HelloEmail($email_data));


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
             echo json_encode("success");
         }
    }
}
