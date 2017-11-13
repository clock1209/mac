<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())

        @endif

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
{{--            <li class="active"><a href="{{ url('shipments') }}"><i class='fa fa-list-alt'></i> <span>Shipments</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-list-alt'></i> <span>Shipping history</span></a></li>--}}
            @permission('see_user')
            <li><a href="{{url('users')}}"><i class='fa fa-user'></i> <span>Users</span></a></li>
            @endpermission
            @permission('see_customer')
            <li><a href="{{url('customers')}}"><i class='fa fa-users'></i> <span>Customers</span></a></li>
            @endpermission
            @permission('see_suppliers')
            <li><a href="{{ url('suppliers') }}"><i class='fa fa-car'></i> <span>Suppliers</span></a></li>
            @endpermission
            {{--<li><a href="#"><i class='fa fa-money'></i> <span>Concepts</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-car'></i> <span>Suppliers</span></a></li>--}}
            @permission('see_concepts')
            <li><a href="{{ url('concepts') }}"><i class='fa fa-money'></i> <span>Concepts</span></a></li>
            @endpermission
            @permission('see_consolidators')
            <li><a href="{{url('consolidators')}}"><i class='fa fa-bus'></i> <span>Consolidators</span></a></li>
            @endpermission
            @permission('see_carriers')
            <li><a href="{{url('carriers')}}"><i class='fa fa-ship'></i> <span>Carriers</span></a></li>
            @endpermission
            {{--<li><a href="#"><i class='fa fa-bus'></i> <span>Consolidators</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-ship'></i> <span>Carriers</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-signal'></i> <span>Rates</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-link'></i> <span>Sales</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-gift'></i> <span>Special rates</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-dollar'></i> <span>Payments</span></a></li>--}}
            {{--<li><a href="#"><i class='fa '></i> <span>Invoice</span></a></li>--}}
            @permission('see_role')
            <li><a href="{{ url('roles') }}"><i class='glyphicon glyphicon-knight'></i> <span>Roles</span></a></li>
            @endpermission
            <li><a href="{{ url('towns') }}"><i class='glyphicon glyphicon-globe'></i> <span>Cities & Ports</span></a></li>
            {{--<li><a href="#"><i class='fa fa-truck'></i> <span>Intermodal</span></a></li>--}}
            {{--<li><a href="#"><i class='fa fa-clock-o'></i> <span>Demurrage</span></a></li>--}}

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
