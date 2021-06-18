@extends('dashboard.layout.master_layout')

@section('title')
    @lang('course.index.courses')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('course.index.courses')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('course.index.courses')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('course.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('course.create.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('course.Multidestroy') }}" method="POST">
                @csrf
                <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                    <thead>
                        <tr>
                            <th class="dt-right sorting_disabled" rowspan="1" colspan="1" style="width: 30.5px;" aria-label="Record ID">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" value="" class="m-group-checkable">
                                    <span></span>
                                </label>
                            </th>
                            <th>ID</th>
                            <th>@lang('course.index.image')</th>
                            <th>@lang('course.index.title')</th>
                            {{-- <th>@lang('course.index.title_ar')</th>
                            <th>@lang('course.index.type')</th>
                            <th>@lang('course.index.type_ar')</th> --}}
                            <th>@lang('course.index.time')</th>
                            <th>@lang('course.index.stage')</th>
                            <th>@lang('course.index.videos')</th>
                            <th>@lang('user.index.users')</th>
                            <th>@lang('quiz.index.quizes')</th>
                            <th>@lang('course.index.created_at')</th>
                            <th>@lang('course.index.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" name="MultDelete[]" value="{{ $course->id }}" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $course->id }}</td>
                                <td><img src="{{ $course->image }}" width="100"></td>
                                <td>{{ $course->title }}</td>
                                {{-- <td>{{ $course->title_ar }}</td>
                                <td>{{ $course->type }}</td>
                                <td>{{ $course->type_ar }}</td> --}}
                                <td>{{ $course->time }}</td>
                                <td>{{ $course->stage->stage }}</td>
                                <td><a href="{{ route('course.videos', $course->id) }}">{{ count($course->videos) }}</a></td>
                                <td><a href="{{ route('course.users', $course->id) }}">{{ count($course->users) }}</a></td>
                                <td><a href="{{ route('course.quizzes', $course->id) }}">{{ count($course->quizzes) }}</a></td>
                                <td>{{ $course->created_at }}</td>
                                <td nowrap="">
                                    <a href="{{ route('course.edit', $course->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{ route('video.createCourseVideo', $course->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="video">
                                        <i class="fas fa-video"></i>
                                    </a>
                                    <a href="{{ route('course.destroy', $course->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('course.index.delete_select')</span></span>
                </button> --}}
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#example').DataTable( {
            "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
        });
    </script>
@endsection
