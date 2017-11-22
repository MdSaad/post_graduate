<div class="sidebar-toggle-box">
    <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips">
        <i class="fa fa-bars"></i>
    </div>
</div>
<!--logo start-->

<a href="{{ URL::route('dashboard') }}" class="logo">Purple Aviation</a>
 
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            {{--Central Settings--}}
        </li>
    </ul>
    <!--  notification end -->
</div>

<div class="top-nav ">
    <!--search & user info start-->

    <?php $loginUser=Auth::user(); $profileImage = \App\UserImage::where('user_id',$loginUser->id)->orderBy('id','desc')->first()  ?>
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder="Search">
        </li>
     {{--   <li class="center"><p><b> {!! isset($loginUser->first_name) ?$loginUser->first_name:'' !!} </b></p></li>--}}
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                @if(isset($profileImage))
                    @if(file_exists($profileImage->thumbnail))
                        {!! Html::image(url($profileImage->thumbnail), 'title', ['style'=>'width:35px;']) !!}
                    @else
                        {!! Html::image('/assets/img/rsz_user.png', 'title', array()) !!}
                    @endif
                @else
                    {!! Html::image('/assets/img/rsz_user.png', 'title', array()) !!}
                @endif
                <span class="username">{{$loginUser->username}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                {{--<li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="icon-cog"></i> Setting</a></li>
                <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>--}}

                @if(isset(Auth::user()->id))
                    {{--<li><a href="#"><i ></i></a></li>--}}
                    {{--<li><a href="{{Route('user-profile')}}"><i class="icon-cog"></i>Profile</a></li>--}}
                    {{--<li><a href="javascript:void(0)"><i class="icon-cog"></i>Profile</a></li>--}}
                    {{--<li><a href="#"><i ></i> </a></li>--}}
                    <li><a href={{Route('user-logout')}}><i class="icon-key"></i> Log Out</a></li>
                @else
                    <li><a href={{ route('user-login') }}><i class="icon-key"></i> Sign In</a></li>
                @endif
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>

<style>
    .center{
        padding-top: 10px;
    }
</style>