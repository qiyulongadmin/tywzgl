<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    //1. 用户模型关联表
    public $table = 'manage';
    //2.关联表的主键
    public $primaryKey = 'id';
    /**
     * 3.允许被批量操作的字段
     *
     * @var array
     */
    //只允许name和paddword
    // protected $fillable = [
    //     'name', 'password',
    // ];
    //全部批量赋值：没有不允许的，
    public $guarded = [];

    //4.禁用时间戳(再不用created_at和updated_at两个字段时)
    public $timestamps = false;


    //添加动态属性，关联权限模型
    public function authority()
    {
        return $this->hasMany(Authority::class, 'manage_id', 'id');
    }
}
