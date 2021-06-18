@extends('dashboard.layout.master_layout')

@section('title')
    @lang('stage.index.stages')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('stage.index.stages')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('stage.index.stages')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('stage.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('stage.index.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('stage.Multidestroy') }}" method="POST" style="margin-bottom: 40px;">
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
                            <th>@lang('stage.index.id')</th>
                            <th>@lang('stage.index.image')</th>
                            <th>@lang('stage.index.stage')</th>
                            <th>@lang('stage.index.stage_ar')</th>
                            <th>@lang('course.index.courses')</th>
                            <th>@lang('stage.index.created_at')</th>
                            <th>@lang('stage.index.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stages as $stage)
                            <tr>
                                <td class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" name="MultDelete[]" value="{{ $stage->id }}" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $stage->id }}</td>
                                <td><img src="{{ $stage->image }}" width="100"></td>
                                <td>{{ $stage->stage }}</td>
                                <td>{{ $stage->stage_ar }}</td>
                                <td><a href="{{ route('stage.courses', $stage->id) }}">{{ count($stage->courses) }}</a></td>
                                <td>{{ $stage->created_at }}</td>
                                <td nowrap="">
                                    <a href="{{ route('stage.edit', $stage->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{ route('stage.destroy', $stage->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('stage.index.delete_select')</span></span>
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
