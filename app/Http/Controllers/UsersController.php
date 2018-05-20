<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Models\User;
    use Auth;

    class UsersController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth',[
                'except' => ['show', 'create', 'store', 'index']
            ]);
            $this->middleware('guest',[
                'only' => ['create']
            ]);
        }

        public function index()
        {
            $users = User::paginate(12);
            return view('users.index', compact('users'));
        }

        public function create()
        {
            return view('users.create');
        }       //跳转登录页面



        public function show(User $user)
        {
            return view('users.show', compact('user'));
        }   //用户个人信息显示页面

        public function store(Request $request)
        {
            $this->validate($request,[
                'name' => 'required|unique:users|min:3|max:50',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|confirmed|min:6'
            ]);             //处理用户创建信息的相关逻辑
            if ($request->has('Readed_Web_Agreement')){
                $user = User::create([
                    'name' => $request -> name,
                    'email' => $request -> email,
                    'password' => bcrypt($request -> password),
                ]);             //用户模型的创建，创建成功后会返回一个用户对象

                //Auth::login($user);     //实现注册后自动登录，直到退出
                session() -> flash('success', '欢迎，这片星空将属于你');   //此处将成功注册提示信息放入缓存中，session() 为用于临时保存用户数据的方法， flash() 为将数据信息放入缓存且只在下一次请求内有效

                return redirect() -> route('users.show', [$user]);  //此处为约定由于配置，$user是User模型对象的实例，[$user] 等同于 [$user->id]
            } else{
                session() -> flash('warning','请阅读Web协议');
                return redirect() -> route('signup');
            }
        }
        //$request为用户输入数据,'name'=>'required'验证是否为空,'email'=>'email'验证邮箱格式
        //'email'=>'unique:users'针对数据表users做唯一性验证，即邮箱是否已经被注册使用
        //'password'=>'confirmed'对两次密码输入进行匹配，验证是否一致

        public function edit(User $user)
        {
            $this->authorize('update', $user);
            return view('users.edit', compact('user'));

        }

        public function update(User $user, Request $request)
        {
            $this->validate($request,[
                'name' => 'required|max:50',
                'password' => 'nullable|confirmed|min:6'
            ]);

            $this->authorize('update', $user);

            $data = [];
            $data['name'] = $request->name;
            if($request->password){
                $data['password'] = bcrypt($request->password);
            }
            $user->update($data);

            session()->flash('success', '个人资料修改成功！');

            return redirect()->route('users.show', compact('user'));
        }

    }
