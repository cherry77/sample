<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function test1(){
        //1.直接写sql操作数据库
        //查询
//        $students = DB::select('select * from student');
//        print_r($students);exit;//返回的是数组
        //新增
//        $bool = DB::insert('insert into student(sname,sage) values(?,?)',['jack',19]);
//        var_dump($bool);exit;//返回的是一个bool值-bool(true)
        //修改
//        $num = DB::update('update student set sage = ? where sname = ?',[20,'jane']);
//        var_dump($num);//返回修改的条目数-int(1)
        //删除
//        $num = DB::delete('delete from student where sname = ?',['jack']);
//        var_dump($num);exit;//返回删除的条目数-int(1)

        //2.查询构造器-修改数据
//        $this->update();

        //3.查询构造器-删除数据
//        $this->find();

        //4.查询构造器中的聚合函数
//        $this->aggregate();
    }
    //1.查询构造器-新增
    public function add(){
        //2.1.1插入一条数据
//        $bool = DB::table('student')->insert(['sname'=>'jack','sage'=>19]);
//        var_dump($bool);exit;//返回的是一个bool值-bool(true)
        //2.1.2插入一条数据返回自增id
//        $insert_id = DB::table('student')->insertGetId(['sname' => 'marry','sage'=>16]);
//        var_dump($insert_id);exit;//返回自增id-int(4)
        //2.1.3插入多条数据(注意最外层有个中括号)
        $bool = DB::table('student')->insert([
            ['sname' => 'name1','sage'=>15],
            ['sname' => 'name2','sage'=>16],
            ['sname' => 'name3','sage'=>17]
        ]);
        var_dump($bool);exit;//bool(true)
    }
    //3.查询构造器-修改
    public function update(){
        //修改
//        $num = DB::table('student')->where('sid',3)->update(['sage' => 21]);
//        var_dump($num);exit;//int(1)

        //自增--修改某个字段的值都加3(第二个参数不写，默认自增1)
//        $num = DB::table('student')->increment('sage',3);
//        var_dump($num);exit;//int(7)

        //自减--修改某个字段的值都减4(第二个参数不写，默认自减1)
//        $num = DB::table('student')->decrement('sage',4);
//        var_dump($num);exit;//int(7)
        //自增自减的同时修改其他数据
//        $num = DB::table('student')->where('sid',3)->decrement('sage',1,['sname'=>'jack_update']);
//        var_dump($num);exit;//int(1)
    }
    //3.查询构造器-删除
    public function delete(){
        //delete
//        DB::table('student')->detele();//删这个表的数据
//        $num = DB::table('student')->where('sid',3)->delete();//删除id = 3的数据
//        var_dump($num);exit;//int(1)
//        $num = DB::table('student')->where('sid','>=',7)->delete();//删除id > 7的数据
//        var_dump($num);exit;//int(2)

        //truncate
//        DB::table('student')->truncate();//整张表的数据都没了，非常危险，谨慎使用。什么都不返回
    }
    //3.查询构造器-查询
    public function find(){
        //1.get()
//        $syudents = DB::table('student')->get();
//        dd($syudents);//得到所有数据

        //2.first()
//        $student = DB::table('student')->orderBy('sid','desc')->first();
//        dd($student);exit;//返回一条数据

        //3.where()
//        $student = DB::table('student')->where('sid','>=',4)->first();
//        $students = DB::table('student')->where('sid','>=',4)->get();
//        dd($student);
//        dd($students);exit;
        //接多个条件
//        $students = DB::table('student')->whereRaw('sid > ? and sage < ?',[4,18])->get();
//        dd($students);exit;

        //4.pluck()-返回结果指定字段
//        $snames = DB::table('student')->pluck('sname');
//        dd($snames);exit;

        //5.lists()--与pluck功能相似，但是可以返回指定的键(弃用了)
//        $snames = DB::table('student')->lists('sname','sid');
//        dd($snames);exit;
        //6.select()--指定字段查找
//        $student = DB::table('student')->select('sid','sname')->get();
//        dd($student);
        //7.chunk()必须和orderBy配合使用
//        echo '<pre>';
//        DB::table('student')->orderBy('sid','desc')->chunk(2,function($student){
//            var_dump($student);
//            if('满足条件'){
//                return false;
//            }
//        });
    }
    //4.查询构造器中的聚合函数
    function aggregate(){
        //1.count()
//        $num = DB::table('student')->count();
//        var_dump($num);//int(7)

        //2.max()
//        $max_sage = DB::table('student')->max('sage');
//        var_dump($max_sage);//int(18)
        //3.min()
//        $min_sage = DB::table('student')->min('sage');
//        var_dump($min_sage);//int(13)
        //4.avg()
//        $avg = DB::table('student')->avg('sage');
//        var_dump($avg);//string(7) "15.1429"
        //5.sum()
        $sum = DB::table('student')->sum('sage');
        var_dump($sum);//string(3) "106"
    }

    //Eloquent ORM操作数据库
    //----1.orm中的查询
    public function orm1(){
        //1.all()--查询表的所有记录
//        $students = Student::all();
//        dd($students);exit;

        //2.find()根据主键进行查询
//        $student = Student::find(11);
//        dd($student);exit;

        //3.findOrFail()根据主键进行查询，没有找到就抛出异常
//        $student = Student::findOrFail(99);
//        dd($student);exit;

        //4.get()查询所有的
//        $students = Student::get();
//        dd($students);exit;

        //5.加条件查询
//        $student = Student::where('sid','>',8)->orderBy('sage','desc')->first();
//        dd($student);exit;

        //6.chunk
//        echo '<pre>';
//        Student::chunk(2,function($students){
//            var_dump($students);
//        });

        //7.聚合函数 count()
//        $num = Student::count();
//        var_dump($num);exit;//int(7)

        //8.聚合函数 max()
//        $max_sage = Student::max('sage');
//        var_dump($max_sage);exit;//int(18)

        //9.聚合函数 min()
//        $min_sage = Student::min('sage');
//        var_dump($min_sage);exit;//int(13)

        //10.聚合函数 avg()
//        $avg = Student::avg('sage');
//        var_dump($avg);exit;//string(7) "15.1429"

        //11.聚合函数 sum()
//        $sum = Student::sum('sage');
//        var_dump($sum);exit;//string(3) "106"
    }
    //----2.orm中的新增
    public function orm2(){
        //orm中的新增、自定义时间戳及批量赋值
        //---1.通过模型新增数据（涉及到自定义时间戳，所以表中要有updated_at，created_at字段，不然会报错）
        //-----如果不想新增时间，就在模型层中关闭
//
        //查找时间
//        $student = Student::find(15);
        //2019-03-22 04:13:21可以看到已经自动格式好了
        //如果不想格式化时间，就在相应的模型层中加入asDateTime()方法，想格式化的时候自己进行格式化
//        echo date('Y-m-d H:i:s',$student->created_at);

        //---2.使用模型的Create方法新增数据（涉及到批量赋值）
        //指定允许批量赋值的字段--$fillable
//        $student = Student::create(
//            ['sname' => 'cherry2','sage'=>25]
//        );
//        dd($student);

        //2.2 firstOrCrete();以属性查找用户，若没有则新增并取到新增的
//        $student = Student::firstOrCreate(['sname' => 'cherry888']);
//        dd($student);exit;

        //2.3 firstOrNew();以属性查找用户，若没有则建立新的实例，需要保存的话，就调用save()
        $student = Student::firstOrNew(['sname'=>'cherry99']);
//        dd($student);//会返回新增的实例，但并没有保存到数据库里
        $bool = $student->save();

    }
    //----3.orm中的更新
    public function orm3(){
        //-----2.1通过模型更新
//        $student = Student::find(19);
//        $student->sname = 'cherry99_update3';
//        $bool = $student->save();

        //-----2.2结合查询语句 批量更新
//        $num = Student::where('sid','>',17)->update(['sage' => 17]);
//        var_dump($num);exit;//int(3)
    }
    //----4.orm中的删除
    public function orm4(){
        //1.通过模型删除
//        $student = Student::find(17);
//        $bool = $student->delete();
//        var_dump($bool);exit;//bool(true),没有这个记录就会报错--Call to a member function delete() on null

        //2.通过主键删除
        //一条数据
//        $num = Student::destroy(18);
//        var_dump($num);exit;//int(1)
        //删除多条数据-传多个id,以逗号分隔
//        $nums = Student::destroy(19,20);
//        var_dump($nums);exit;//int(2)
        //删除多条数据-传数组
//        $nums = Student::destroy([14,15]);
//        var_dump($nums);exit;//int(2)

        //3.根据指定条件删除
//        $nums = Student::where('sid','>',12)->delete();
//        var_dump($nums);exit;//int(1),没有可删的数据返回int(0)
    }

    public function section1(){
        $name = "cherry";
        $arr  =['cherry','summer'];
        $students = Student::get();
        return view('student.section1',[
            'name' => $name,
            'arr' =>$arr,
            'students' => $students
        ]);
    }

    public function urlTest(){
        return 'urlTest';
    }
    //controller之Request
    public function request(Request $request){
        //1.获取访问地址指定名字的值--http://sample.test/request?name=cherry
//        echo $request->input('name');//cherry

        //2.设置默认值,没有指定名称就输出设置的默认值--http://sample.test/request?name=cherry
//        echo $request->input('sex','默认值');//默认值

        //3.判断传参是否有此值--http://sample.test/request?name=cherry
//        if($request->has('name')){
//            echo $request->input('name');//cherry
//        }else{
//            echo '无该参数';
//        }

        //4.获取传参的全部值--http://sample.test/request?name=cherry&age=24
//        $ret = $request->all();
//        dd($ret);//array:2 ["name" => "cherry""age" => "24"]

        //5.判断请求的类型
//        echo $request->method();//GET

        //6.判断类型是不是我们预想的类型
//        if($request->isMethod('GET')){
//            echo 'true';
//        }else{
//            echo 'false';
//        }
        //7.判断是否是ajax请求
//        $ret = $request->ajax();
//        var_dump($ret);//bool(false)

        //8.判断请求的路径是否符合特定的格式 is()里面传的是路由设置的路径--
        //Route::any('student/request',['uses' => 'StudentController@request']);
        //http://sample.test/student/request?name=cherry&age=24
//        $ret = $request->is('student/*');
//        var_dump($ret);//bool(true)

        //9.获取当前的请求路径--http://sample.test/student/request?name=cherry&age=24
//        echo $request->url();//http://sample.test/student/request
    }
    //controller之Session
    public function session(Request $request){
        //laravel适用session有三种方式
        //1.HTTP request类的session方法
        //存
//        $request->session()->put('key1','value1');
        //取
//        $ret = $request->session()->get('key1');
//        var_dump($ret);//string(6) "value1"

        //2.session()辅助函数
//        session()->put('key2','value2');
//        echo session()->get('key2');//value2

        //3.Session facade
//        Session::put('key3','value3');
//        echo Session::get('key3');//value3
        //数据不存在，则取默认值
//        echo Session::get('key4','default');//default
        //以数组的形式存
//        Session::put(['key4' => 'value4','key5' => 'value5']);
//        echo Session::get('key5');//value5

        //怎样将数据放到session的数组中
//        Session::push('student','cherry');
//        Session::push('student','summer');
//        $ret = Session::get('student','default');
//        dd($ret);//array:2 [0 => "cherry",1 => "summer"]

        //从session中取出数据并删除
//        $res = Session::pull('student','default');
//        var_dump($res);//default

        //取出session中所有的值
//        $all = Session::all();
//        dd($all);

        //判断session中某个key存不存在
//        if(Session::has('key1')){
//            echo Session::get('key1');//value1
//        }else{
//            echo 'key1不存在';
//        }

        //删除session指定的key的值
//        Session::forget('key1');
//        $all = Session::all();
//        dd($all);

        //删除所有的session
//        Session::flush();
//        $all = Session::all();
//        dd($all);//[]
        //闪存（第一次进来存，再次进来就不存了）
//        Session::flash('key-flash','val-flash');
//        echo Session::get('key-flash');//val-flash

        //接收response方法中的快闪数据
        echo Session::get('message','暂无数据');//第一次加载显示"我是快闪数据",第二次显示"暂无数据"
    }
    //响应的常见类型-字符串，视图，json，重定向
    public function response(){
        //1.数组转json
//        $arr = ['errCode' => 0,'errMsg' => 'success','data'=>'cherry'];
//        return response()->json($arr);//{"errCode":0,"errMsg":"success","data":"cherry"}
        //2.重定向-redirect
//        return redirect('session');//页面就会跳到有session路由的界面
        //3.重定向带数据-redirect
//        return redirect('session')->with('message','我是快闪数据');
        //4.重定向action()-控制器名和方法名
//        return redirect()->action('StudentController@session')
//            ->with('message','我是快闪数据');
        //5.重定向route()-路由的别名
//        return redirect()->route('as_session')->with('message','我是快闪数据');
        //6.返回上一个页面
        return redirect()->back();
    }

    //中间件Middleware-过滤进入应用程序的HTTP请求
   //场景：有一个活动，在指定日期后开始，如果活动没有开始，只能访问宣传页面（只要活动没开始，就跳到宣传页面）
    public function activity0(){
        return '活动还没开始呢！';
    }
    public function activity1(){
        return '欢迎来到activity1';
    }
    public function activity2(){
        return '欢迎来到activity2';
    }
    // 步骤：1.新建中间件；2.注册中间件；3.使用中间件；4.中间件的前置和后置操作
    //1.新建中间件,在app/Http/Middleware/Activity.php新建中间件
    //2.注册中间件：在app/Http/Kernel.php中注册中间件
        //'activity' => \App\Http\Middleware\Activity::class,
    //3.在路由web.php中使用中间件
        //Route::group(['middleware' => ['activity']],function(){
        //    Route::any('activity1',['uses' => 'StudentController@activity1']);
        //    Route::any('activity2',['uses' => 'StudentController@activity2']);
        //});
    //4.中间件的前置和后置操作
        //怎样区分是前置还是后置操作：是根据中间件的逻辑是在请求前还是请求后来区分的

    public function upload(Request $request){
        if($request->isMethod('POST')){
            $file = $request->file('file');
            //文件是否上传成功
            if($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();

                //验证
                //验证完后上传到指定的位置
                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                var_dump($bool);exit;
            }
        }
        return view('student.upload');
    }

    public function mail(){
        //邮件发送方式一Mail::raw();
        Mail::raw('邮件内容',function($message){
            $message->from('15071285862@163.com','cherry');
            $message->subject('邮件主题 测试');
            $message->to('930289986@qq.com');
        });
        //邮件发送方式二Mail::send
        Mail::send('student.mail',['name' =>'cherry'],function($message){
            $message->subject('邮件主题 测试');
            $message->to('930289986@qq.com');
        });
    }

    public function cache1(){
        //1.put() 保存对象到缓存中
//        $res = Cache::put('key2','val2',10);
//        var_dump($res);//NULL
        //3.add() 如果key存在则添加失败，反之添加成功
        $bool = Cache::add('key3','val3',10);
        var_dump($bool);//bool(true)
    }
    public function cache2(){
        //2.get()从缓存中获取值
        $val1 = Cache::get('key3');
        var_dump($val1);//string(4) "val1"
    }
}