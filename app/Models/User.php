<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /*The attributes that database_name.*/
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* 定义 gravatar 方法， 用来生成用户的头像 */
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this -> attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    /* 生成注册账号的验证令牌 */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user){
            $user->activation_token = str_random(30);
        });
    }

    /* 发送重置密码邮件方法 */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function statuses()         //定义一对多 模型关联
    {
        return $this->hasMany(Status::class);
    }

    public function feed()      //将动态微博信息从数据库 statuses 中取出， desc 值为 降序排列
    {
        $user_ids = Auth::user()->followings->pluck('id')->toArray();   // pluck 函数将 id 分离出来，并赋值到 user_ids
        array_push($user_ids, Auth::user()->id);        // 将当前用户加入到 user_ids 的 Array 中

        return Status::whereIn('user_id', $user_ids)    // whereIn 方法 取出所有用户的微博动态
                    ->with('user')      // 预加载 with 方法， 避免 N+1 查找问题，提高查找效率
                    ->orderBy('created_at', 'desc');
    }

    public function followers()         //定义粉丝 关注 模型关联
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followings()        //定义粉丝 被关注 模型关联
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function follow($user_ids)       //关注用户 $user_ids
    {
        if ( !is_array($user_ids) ){
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    public function unfollow($user_ids)     //取消关注用户 $user_ids
    {
        if ( !is_array($user_ids) ){
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    public function isFollowing($user_id)       //判断当前登录用户 是否 关注了用户 $user_id
    {
        return $this->followings->contains($user_id);
    }
        /*    $this->followings() //返回 HasMany 对象
            $this->followings   //返回 Collection 集合
            $this->followings()->get()      //相当于上一个语句,如果不需要条件，可按上一句写        */
}
