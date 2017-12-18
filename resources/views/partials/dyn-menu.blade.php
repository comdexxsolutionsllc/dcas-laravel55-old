<ul class="nav nav-bar navi-left-padding">
    {!! \DCAS\Helpers\BuildMenuHelper::printMenu(session('menu')) !!}
    <li class="dropdown drop-down">
        <a class="dropdown-toggle" data-toggle="droxpdown" href="#"><span class="glyphicon glyphicon-user"
                                                                         aria-hidden="true"></span></a>
        <ul class="dropdown-menu">
            <li>
                @if(!auth()->check())
                    <label>
                        <a href="{{ \URL::to('login') }}" class="sign-padding">{{ trans('messages.sign_in') }}</a>
                        <br><br>
                        <a href="{{ \URL::to('register')}}" class="join-padding">{{ trans('messages.join') }}</a>
                    </label>
                @else
                    <a href="{{ \URL::to('login') }}" class="sign-padding">{{ trans('messages.account') }}</a>
                @endif
            </li>
        </ul>
    </li>
    <li class="dropdown drop-down"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ \URL::to('en') }}">en</a>
                <a href="{{ \URL::to('ar') }}">ar</a>
            </li>
        </ul>
    </li>
</ul>
