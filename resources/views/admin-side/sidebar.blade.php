<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{--<img src="{{asset('admin-assets')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />--}}
            </div>
            {{--<div class="pull-left info">
                @if(Auth::check())
                    <p style="font-size: 18px;">{{Auth::user()->name}}</p>
                @else
                    <p style="font-size: 18px;">Alexander Pierce</p>
                @endif

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>--}}
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-user"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users')}}"><i class="fa fa-circle-o"></i>All Users</a></li>
                    <li><a href="{{route('admin.users.create')}}"><i class="fa fa-circle-o"></i>New User</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Books</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.books')}}"><i class="fa fa-circle-o"></i>All Books</a></li>
                    <li><a href="{{route('admin.books.create')}}"><i class="fa fa-circle-o"></i>New Book</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Authors</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.authors')}}"><i class="fa fa-circle-o"></i>All Authors</a></li>
                    <li><a href="{{route('admin.authors.create')}}"><i class="fa fa-circle-o"></i>New Author</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span>Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.categories')}}"><i class="fa fa-circle-o"></i>All Categories</a></li>
                    <li><a href="{{route('admin.categories.create')}}"><i class="fa fa-circle-o"></i>New Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-exchange"></i>
                    <span>Loans</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.loans.pending')}}"><i class="fa fa-circle-o"></i>Pending Loans</a></li>
                    <li><a href="{{route('admin.loans.overdue')}}"><i class="fa fa-circle-o"></i>Overdue Loans</a></li>
                    <li><a href="{{route('admin.loans')}}"><i class="fa fa-circle-o"></i>All Loans</a></li>
                    <li><a href="{{route('admin.loans.create')}}"><i class="fa fa-circle-o"></i>New Loan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Messages</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.messages.new')}}"><i class="fa fa-circle-o"></i>New Messages</a></li>
                    <li><a href="{{route('admin.messages.unreplied')}}"><i class="fa fa-circle-o"></i>Unreplied Messages</a></li>
                    <li><a href="{{route('admin.messages')}}"><i class="fa fa-circle-o"></i>All Messages</a></li>
                </ul>
            </li>

            {{--<li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-gear text-gray-600"></i>Settings</a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
