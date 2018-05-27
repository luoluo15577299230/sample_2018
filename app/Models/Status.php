<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['content'];      //指定微博模型中可以进行正常更新，若不设置 fillable 属性，会提示 MassAssignmentException (批量赋值异常)

    public function user()      //定义反向关联
    {
        return $this->belongsTo(User::Class);
    }
}
