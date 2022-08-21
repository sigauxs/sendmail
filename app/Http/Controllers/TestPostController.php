<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class TestPostController extends Controller
{
    public function testPost(Request $request){


        $email_data = new Email();
        $email_data->to = $request->to;

        if($email_data->to != ""){
            echo json_encode($email_data->to);
        }else{
            echo json_encode("error");
        }



    }
}
