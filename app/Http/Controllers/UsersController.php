<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Models\User;

    class UsersController extends Controller
    {
        public function create()
        {
            return view('users.create');
        }

        public function login()
        {
            return view('users.login');
        }

        public function show(User $user)
        {
            return view('users.show', compact('user'));
        }   //用户个人信息显示页面

        public function store(Request $request)
        {
            $this->validate($request,[
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|confirmed|min:6'
            ]);             //处理用户创建信息的相关逻辑

            $user = User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => bcrypt($request -> password),
            ]);             //用户模型的创建，创建成功后会返回一个用户对象

            session() -> flash('success', '欢迎，这片星空将属于你');   //此处将成功注册提示信息放入缓存中，session() 为用于临时保存用户数据的方法， flash() 为将数据信息放入缓存且只在下一次请求内有效

            return redirect() -> route('users.show', [$user]);  //此处为约定由于配置，$user是User模型对象的实例，[$user] 等同于 [$user->id]
        }
        //$request为用户输入数据,'name'=>'required'验证是否为空,'email'=>'email'验证邮箱格式
        //'email'=>'unique:users'针对数据表users做唯一性验证，即邮箱是否已经被注册使用
        //'password'=>'confirmed'对两次密码输入进行匹配，验证是否一致

    }
