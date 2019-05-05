@extends('layouts')

@section('header')
    @parent
    header888
@stop

@section('sidebar')
    sidebar777
@stop
@section('content')
    content
    {{--1.模板中输出PHP变量--}}
    <p>name的值：{{$name}}</p>
    {{--2.模板中调用PHP方法-}}
    <p>当前时间戳：{{time()}}</p>
    <p>当前时间{{date('Y-m-d H:i:s')}}</p>
    <p>name是否在arr数组中：{{in_array($name,$arr)?'true':'false'}}</p>
    <p>var_dump打印arr数组：{{var_dump($arr)}}</p>
    <p>用isset检测$name是否存在：{{isset($name)?$name:'default'}}</p>
    <p>or:{{$name or 'default'}}</p>
    {{--3.原样输出（想输出{{}}}}）--}}
    <p>原样输出:@{{$name}}</p>
    {{--4.模板中的注释--模板的注释是{{}},模板的注释在网页源代码中看不到}}
    {{--5.引入子视图--}}
    @include('student.common1',['message' => '我是错误信息'])
    <hr>
    <h3>流程控制</h3>
    {{--6.流程控制-if--}}
    <p>
        @if($name == 'cherry')
            我是cherry
        @elseif($name == 'summer')
            我是summer
        @else
            我是谁呢
        @endif
    </p>

    <p>
        @if(in_array($name,$arr))
            {{$name}}在数组arr中
        @else
            {{$name}}不在数组arr中
        @endif
    </p>
    {{--unless(相当于if的取反)--}}
    <p>
        @unless($name != 'cherry')
            我是cherry我才输出
        @endunless
    </p>
    {{--for--}}
    <p>
        @for($i = 0;$i < 5;$i ++)
            {{$i}}
        @endfor
    </p>
    {{--foreach--}}
    <p>
        @foreach($students as $student)
            {{$student->sname}}
        @endforeach
    </p>
    {{--foreach的变种forelse：--}}
    <p>
        @forelse($students as $student)
            {{$student->sname}}
        @empty
            null
        @endforelse
    </p>
    <hr>
    <h3>模板中的url</h3>
    {{--7.模板中的url 
        url()通过路由的名称生成url
        action()通过指定控制器及方法名生成url
        route()通过路由的别名生成url
        一般用的多的是url和route这两个
    --}}
    <a href="{{url('url_name')}}">url</a>
    <a href="{{action('StudentController@urlTest')}}">action</a>
    <a href="{{route('url')}}">route</a>

@stop