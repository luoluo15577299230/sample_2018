@extends('layouts.default')

@section('title', '{{ $user->name }}-Home')
@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
                <h3>微博列表</h3>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
                <section class="stats">
                    @include('shared._stats', ['user'=> Auth::user()])
                </section>
            </aside>
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Handsome Guy</h1>
            <p class="lead">
                你现在所看到的是 <a href="https://laravel-china.org/courses/laravel-essential-training-5.1">Laravel PHP Sample_2018示例项目主页。</a>
            </p>
            <p>
                Let's Begining!
            </p>
            <p>
                <a class="btn btn-lg btn-success" href="{{route('login')}}" role="button">Login now</a>
            </p>
        </div>
    @endif

    <!-- <div>
        <h1 class="test-center">Laravel 教程 目录</h1>
     <h4>第一章. 基础信息</h4>
     <h5>1.1. 序言</h5>
     <h5>1.2. 关于作者</h5>
     <h5>1.3. Laravel 与 PHP</h5>
     <h5>1.4. 如何正确阅读本书？</h5>
     <h5>1.5. 写作约定</h5>
     <h5>1.6. 发行说明</h5>
     <h5>1.7. 本书源码</h5>
     <h5>1.8. 反馈纠错</h5>
     <h5>1.9. 常见问题</h5>
     <h5>1.10. 收到的赞誉</h5>
    <h4>第二章. 开发环境布置</h4>
     <h5>2.1. 开发环境 </h5>
     <h5>2.2. 第一个应用，Hello Laravel！</h5>
     <h5>2.3. Git 与 GitHub</h5>
     <h5>2.4. 部署上线</h5>
     <h5>2.5. 小结</h5>
    <h4>第三章. 构建页面</h4>
     <h5>3.1. 章节说明</h5>
     <h5>3.2. 创建应用</h5>
     <h5>3.3. 静态页面</h5>
     <h5>3.4. Artisan 命令</h5>
     <h5>3.5. 小结</h5>
    <h4>第四章. 优化页面</h4>
     <h5>4.1. 章节说明</h5>
     <h5>4.2. 样式美化</h5>
     <h5>4.3. Laravel 前端工作流</h5>
     <h5>4.4. 局部视图</h5>
     <h5>4.5. 布局中的链接</h5>
     <h5>4.6. 用户注册页面</h5>
     <h5>4.7. 小结</h5>
    <h4>第五章. 用户模型</h4>
     <h5>5.1. 章节说明</h5>
     <h5>5.2. 数据库迁移</h5>
     <h5>5.3. 查看数据库表</h5>
     <h5>5.4. 模型文件</h5>
     <h5>5.5. 创建用户对象</h5>
     <h5>5.6. 查找用户对象</h5>
     <h5>5.7. 更新用户对象</h5>
     <h5>5.8. 小结</h5>
    <h4>第六章. 用户注册</h4>
     <h5>6.1. 章节说明</h5>
     <h5>6.2. 显示用户的信息</h5>
     <h5>6.3. 注册表单</h5>
     <h5>6.4. 用户数据验证</h5>
     <h5>6.5. 注册失败错误消息</h5>
     <h5>6.6. 注册成功</h5>
     <h5>6.7. 在 Heroku 上使用 PostgreSQL</h5>
     <h5>6.8. 小结</h5>
    <h4>第七章. 会话管理</h4>
     <h5>7.1. 章节说明</h5>
     <h5>7.2. 会话</h5>
     <h5>7.3. 用户登录</h5>
     <h5>7.4. 退出</h5>
     <h5>7.5. 记住我</h5>
     <h5>7.6. 小结</h5>
    <h4>第八章. 用户 CRUD</h4>
     <h5>8.1. 章节说明</h5>
     <h5>8.2. 更新用户</h5>
     <h5>8.3. 权限系统</h5>
     <h5>8.4. 列出所有用户</h5>
     <h5>8.5. 删除用户</h5>
     <h5>8.6. 小结</h5>
    <h4>第九章. 邮件发送</h4>
     <h5>9.1. 章节说明</h5>
     <h5>9.2. 账户激活</h5>
     <h5>9.3. 密码重设</h5>
     <h5>9.4. 在生产环境中发送邮件</h5>
     <h5>9.5. 小结</h5>
    <h4>第十章. 微博 CRUD</h4>
     <h5>10.1. 章节说明</h5>
     <h5>10.2. 微博模型</h5>
     <h5>10.3. 显示微博</h5>
     <h5>10.4. 微博相关的操作</h5>
     <h5>10.5. 小结</h5>
    <h4>第十一章. 粉丝关系</h4>
     <h5>11.1. 章节说明</h5>
     <h5>11.2. 粉丝数据表</h5>
     <h5>11.3. 关注用户的网页界面</h5>
     <h5>11.4. 动态流</h5>
     <h5>11.5. 小结</h5>
    <h4>第十二章. 附录</h4>
     <h5>12.1. 专有名词索引</h5>
     <h5>12.2. 命令行索引</h5>
    <h4>第十三章. 附言</h4>
     <h5>13.1. 下一步的学习建议</h5>
     <h5>13.2. 作品分享和学习感悟</h5>
    </div> -->

@stop