<nav class="navbar navbar-custome" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Nguyễn Mạnh</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Trang chủ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Học lập trình<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
                <li><a href="/">Chém gió</a></li>
                <li><a href="/contact">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form  action="{{ route('blog.search') }}" method="get" class="navbar-form navbar-left" role="search">
                    <div class="search">
                        <input type="text" class="form-control-custom input-sm" maxlength="64" placeholder="Search" name="q" />
                         <button type="submit" class="btn btn-secondary btn btn-default btn-sm">
                             <i class="fa fa-search" aria-hidden="true"></i>
                         </button>
                    </div>
                </form>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>