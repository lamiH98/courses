@extends('dashboard.layout.master_layout')

@section('title')
    @lang('quiz.index.quizes')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('quiz.index.quizes')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('quiz.index.quizes')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('quiz.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('quiz.create.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('quiz.Multidestroy') }}" method="POST">
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
                            <th>@lang('quiz.index.image')</th>
                            <th>@lang('quiz.index.title')</th>
                            <th>@lang('quiz.index.title_ar')</th>
                            <th>@lang('quiz.index.time')</th>
                            <th>@lang('quiz.index.stage')</th>
                            <th>@lang('quiz.index.course')</th>
                            <th>@lang('question.index.questions')</th>
                            <th>@lang('quiz.index.status')</th>
                            <th>@lang('quiz.index.created_at')</th>
                            <th>@lang('quiz.index.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" name="MultDelete[]" value="{{ $quiz->id }}" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $quiz->id }}</td>
                                <td><img src="{{ $quiz->image }}" width="100"></td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ $quiz->title_ar }}</td>
                                <td>{{ $quiz->time }}</td>
                                <td>{{ $quiz->stage->stage }}</td>
                                <td>{{ $quiz->course->title }}</td>
                                <td><a href="{{ route('quiz.question', $quiz->id) }}">{{ count($quiz->questions) }}</a></td>
                                <td>{{ $quiz->status == null ? 'false' : 'true' }}</td>
                                <td>{{ $quiz->created_at }}</td>
                                <td nowrap="">
                                    <a href="{{ route('quiz.edit', $quiz->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                        <i class="la la-edit"></i>
                                    </a>
                                    {{-- <a href="{{ route('video.createquizVideo', $quiz->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="video">
                                        <i class="fas fa-video"></i>
                                    </a> --}}
                                    <a href="{{ route('quiz.destroy', $quiz->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('quiz.index.delete_select')</span></span>
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
