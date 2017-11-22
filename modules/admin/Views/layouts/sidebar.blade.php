<li class="sub-menu">
    <a class="" href="{{ URL::route('dashboard') }}">
        <i class="icon-dashboard"></i>
        <span>Home</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-cog"></i>
        <span>Master Setup</span>
    </a>
    <ul class="sub">
        <li><a  href="{{URL::to('admin/country')}}" class="">Country</a></li>
        <li><a  href="{{URL::to('admin/company')}}">Company</a></li>
        <li><a  href="{{URL::to('admin/currencies')}}">Currency</a></li>
        <li><a  href="{{URL::to('admin/airlines')}}" class="">Airlines Information</a></li>
        <li><a href="{{URL::to('admin/expense-head')}}">Expense Head</a></li>
        <li><a href="{{URL::to('admin/expense-subhead')}}">Expense Sub Head</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-ticket"></i>
        <span>Ticketing</span>
    </a>
    <ul class="sub">
        <li><a href="{{URL::to('ticketing/passengers-ticket-info')}}">Passengers Ticket Information</a></li>
        <li><a href="{{URL::to('ticketing/expense-details')}}">Expenses Details Information</a></li>
        <li><a href="javascript:void(0)">Date Wise Ticket Report</a></li>
        <li><a href="javascript:void(0)">Date Wise Expense Report</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-rocket"></i>
        <span>Hazz</span>
    </a>
    <ul class="sub">
        <li><a href="{{URL::to('hazz/hazz-client-info')}}">Hazz Client Information</a></li>
        <li><a href="javascript:void(0)">Expenses Details Information</a></li>
        <li><a href="{{URL::to('hazz/hazz-client-info-report')}}">Hazz Client Report</a></li>
        <li><a href="{{URL::to('hazz/hazz-client-payment-receive-report')}}">Hazz Client Payment Receive Report</a></li>
        <li><a href="javascript:void(0)">Date Wise Expense Report</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-plane"></i>
        <span>Umrah</span>
    </a>
    <ul class="sub">
        <li><a href="{{URL::to('umrah/umrah-client-info')}}">Umrah Client Information</a></li>
        <li><a href="javascript:void(0)">Expenses Details Information</a></li>
        <li><a href="javascript:void(0)">Umrah Client Report</a></li>
        <li><a href="javascript:void(0)">Date Wise Expense Report</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-subway"></i>
        <span>Tour Package</span>
    </a>
    <ul class="sub">
        <li><a href="javascript:void(0)">Package Information</a></li>
        <li><a href="javascript:void(0)">Expenses Details Information</a></li>
        <li><a href="javascript:void(0)">Package Report</a></li>
        <li><a href="javascript:void(0)">Date Wise Expense Report</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-graduation-cap"></i>
        <span>Reports</span>
    </a>
    <ul class="sub">
        <li><a href="{{URL::to('report/expenses')}}">Expenses Information</a></li>
        <li><a href="{{URL::to('report/ticket-information')}}">Ticket Information</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-user"></i>
        <span>User</span>
    </a>
    <ul class="sub">
        <li><a href="{{URL::to('user/user-list')}}">User List</a></li>
        <li><a href="{{URL::to('user/index-role-user')}}">Role User</a></li>
    </ul>
</li>






<!-- ******* -->