<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait HashesPassword
{
    /**
     * Boot the HashesPassword trait for a model.
     *
     * @return void
     */
    public static function bootHashesPassword()
    {
        static::creating(function ($model) {
            if ($model->passwordIsNotHashed() && $model->password) {
                $model->password = Hash::make($model->password);
            }
        });

        static::updating(function ($model) {
            if ($model->passwordIsNotHashed() && $model->password) {
                $model->password = Hash::make($model->password);
            }
        });
    }

    /**
     * Check if the password is not hashed.
     *
     * @return bool
     */
    public function passwordIsNotHashed()
    {
        return !preg_match('/^\$2[ayb]\$.{56}$/', $this->password);
    }
}
