<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())

        @endif



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            {{--<li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>--}}
            <li><a href="#"><i class='fa fa-list-alt'></i> <span>Shipments</span></a></li>
            <li><a href="#"><i class='fa fa-list-alt'></i> <span>Shipping history</span></a></li>
            <li><a href="#"><i class='fa fa-user'></i> <span>Users</span></a></li>
            <li><a href="#"><i class='fa fa-users'></i> <span>Customers</span></a></li>
            <li><a href="#"><i class='fa fa-car'></i> <span>Suppliers</span></a></li>
            <li><a href="#"><i class='fa fa-money'></i> <span>Concepts</span></a></li>
            <li><a href="#"><i class='fa fa-bus'></i> <span>Consolidators</span></a></li>
            <li><a href="#"><i class='fa fa-ship'></i> <span>Carriers</span></a></li>
            <li><a href="#"><i class='fa fa-signal'></i> <span>Rates</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>Sales</span></a></li>
            <li><a href="#"><i class='fa fa-gift'></i> <span>Special rates</span></a></li>
            <li><a href="#"><i class='fa fa-dollar'></i> <span>Payments</span></a></li>
            <li><a href="#"><i class='fa '></i> <span>Invoice</span></a></li>
            <li><a href="#"><i class='fa fa-truck'></i> <span>Intermodal</span></a></li>
            <li><a href="#"><i class='fa fa-clock-o'></i> <span>Demurrage</span></a></li>

            {{--<li class="treeview">--}}
                {{--<a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                    {{--<li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
