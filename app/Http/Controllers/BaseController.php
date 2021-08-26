<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class BaseController extends Controller
{

    protected function handleErrors($messages) {
        App::abort(400, json_encode(array('errors' => $messages)));
    }

    protected function handleErrorMessage($key, $message) {
        $messages = new MessageBag();
        $messages->add($key, $message);
        $this->handleErrors($messages);
    }

    protected function validateInput($input, $rules) {
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $this->handleErrors($validator->errors());
        }
    }
}
