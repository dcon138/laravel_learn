<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

abstract class RestResourceModel extends Eloquent {

    use SoftDeletingTrait;

    public static function getValidationErrors($input, $modelClass)
    {
        $validator = Validator::make($input, $modelClass::$validation);
        $valid = $validator->passes();
        if ($valid) {
            return false;
        } else {
            return $validator->messages()->all();
        }
    }

}
