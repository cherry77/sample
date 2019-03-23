<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    //表名默认是类名小写复数形式，如果不是，则需要指定
    protected $table='student';
    //表主键默认是id，如果不是，则需要指定
    protected $primaryKey = 'sid';

    //指定允许批量赋值的字段--create
    protected $fillable = ['sname','sage'];

    //指定某个字段不允许批量赋值
    protected $guarded = [];

    //自动维护时间--如果不想新增时间，就在模型层中关闭-false(注意是public类型)
    public $timestamps = true;

    //如果想自动维护时间戳
    protected function getDateFormat()
    {
        return 'U';
    }
    /**
     * select的时候避免转换时间为Carbon
     */
//    public function asDateTime($value)
//    {
//        return $value;
//    }

    /**
     * 避免转换时间戳为时间字符串
     *
     * @param DateTime|int $value
     * @return DateTime|int
     */
//    public function fromDateTime($value)
//    {
//        return $value;
//    }
}
