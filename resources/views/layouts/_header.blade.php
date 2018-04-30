<!--
<header class="navbar navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="col-md-offset-1 col-md-10">
                    <a href="{{route('home')}}" id="logo">Sample_2018</a>
                    <nav>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{'help'}}">帮助</a></li>
                            <li><a href="{{'login'}}">登录</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>   -->

<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!--    Brand and taggle get grouped for better mobile display    -->
            <div class="navbar-header">
                <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>       <!--    面包屑按钮组件设置   -->
                <a class="navbar-brand" href="{{route('home')}}" id="logo">Sample_2018</a>
            </div>
            <!--    Collect the nav links, forms, and other content for toggling    -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    <!--    此处id与面包屑<button>中的id对应  -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}">登录</a></li>
                    <li><a href="#">注册</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">其他<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('help')}}">帮助</a></li>
                            <li><a href="#">其他</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">      <!--    搜索表单控件  -->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submint" class="btn btn-default">搜索</button>
                </form>
            </div>
        </div>
    </nav>
</header>