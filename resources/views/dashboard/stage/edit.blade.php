@extends('dashboard.layout.master_layout')

@section('title')
    @lang('stage.update.edit_stage')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('stage.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('stage.update.stages')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('stage.update.edit_stage')</span></a></li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                @lang('stage.update.edit_stage')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('stage.update', $stage->id) }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('stage.update.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="stage_image">
                                    <label class="custom-file-label" for="customFile">@lang('stage.update.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('stage.update.stage'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="stage" id="stage" value="{{ $stage->stage }}" class="form-control m-input" placeholder=@lang('stage.update.stage')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('stage.update.stage_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="stage_ar" id="stage_ar" value="{{ $stage->stage_ar }}" class="form-control m-input" placeholder=@lang('stage.update.stage_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('stage.update.update')</button>
                                    <a href="{{ route('stage.index') }}" class="btn btn-secondary">@lang('stage.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
