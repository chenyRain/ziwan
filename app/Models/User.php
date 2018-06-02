<?php

namespace App\Models;

use http\Url;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @param array $data
     * @return bool|mixed
     */
    public static function register($data = array())
    {
        if (empty($data)) {
            return false;
        }
        $model = new User();
        $model->name = $data['name'];
        $model->password = bcrypt($data['password']);
        return $model->save() ? $model->id : false;
    }


    public static function login($data = array())
    {
        if (empty($data)) {
            return false;
        }
    }
}
