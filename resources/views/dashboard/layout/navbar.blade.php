<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

        {{-- Dashboard Link --}}
        {{-- @if (auth('admin')->user()->can('browse dashboard')) --}}
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{ route('dashboard.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">@lang('aside-menu.dashboard')</span>
                            <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span>
                        </span>
                    </span>
                </a>
            </li>
        {{-- @endif --}}
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">@lang('aside-menu.featured')</h4>
            <i class="m-menu__section-icon flaticon-more-v2"></i>
        </li>

        {{-- @if (auth('admin')->user()->can('browse dashboard')) --}}
        {{-- <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
            <a href="{{ route('notification.index') }}" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">@lang('aside-menu.notifications')</span>
                        <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span>
                    </span>
                </span>
            </a>
        </li> --}}
    {{-- @endif --}}

        {{-- Admin Link --}}
        {{-- @if (auth('admin')->user()->can('browse admin')) --}}
            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.admins')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">@lang('aside-menu.admins')</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.admins')</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_admin')</span></a></li>
                    </ul>
                </div>
            </li>
        {{-- @endif --}}

        {{-- User Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.users')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Users</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('user.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.users')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('user.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_user')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- stage Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.stages')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Stages</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('stage.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.stages')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('stage.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_stage')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- Course Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.courses')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Courses</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('course.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.courses')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('course.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_course')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- Video Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.videos')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Videos</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('video.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.videos')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('video.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_video')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- Slider Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.sliders')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Sliders</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('slider.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.sliders')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('slider.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_slider')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- Quiz Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.quizs')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Quizs</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('quiz.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.quizs')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('quiz.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_quiz')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- Question Link --}}
        <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">@lang('aside-menu.questions')</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style="display: none; overflow: hidden;"><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Questions</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('question.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.questions')</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('question.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">@lang('aside-menu.add_question')</span></a></li>
                </ul>
            </div>
        </li>

        {{-- Setting Link --}}
        <li class="m-menu__item " aria-haspopup="true">
            <a href="{{ route('setting.index') }}" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">@lang('aside-menu.setting')</span>
                    </span>
                </span>
            </a>
        </li>

    </ul>
</div>
