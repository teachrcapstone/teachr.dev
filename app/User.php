<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanFavorite;

use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use App\Models\BaseModel;


class User extends BaseModel implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use CanFollow, CanLike;
    use CanBeFollowed;
    use CanFavorite;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

     public static $rules = [

        'name' => 'required|min:2|max:200',
        'email' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'created_by');
    }

    public function plans()
    {
        return $this->hasMany('App\Models\Plan', 'created_by');
    }




}
