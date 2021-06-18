@extends('dashboard.layout.master_layout')

@section('title')
    @lang('video.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('course.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('course.create.courses')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('video.create.add_new')</span></a></li>
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
                                @lang('video.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('video.store') }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.create.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="video_image">
                                    <label class="custom-file-label" for="customFile">@lang('video.create.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.create.title'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control m-input" placeholder=@lang('video.create.title')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.create.url'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="url" id="url" value="{{ old('url') }}" class="form-control m-input" placeholder=@lang('video.create.url')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.create.time'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="time" id="time" value="{{ old('time') }}" class="form-control m-input" placeholder=@lang('video.create.time')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('video.create.courses'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="course_id" id="course_id">
                                        <option disabled>course</option>
                                        <option {{$course->title}} value="{{ $course->id }}">{{ $course->title }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description">@lang('video.create.description')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description" name="description" rows="9">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.create.title_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar') }}" class="form-control m-input" placeholder=@lang('video.create.title_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description_ar">@lang('video.create.description_ar')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description_ar" name="description_ar" rows="9">{{ old('description_ar') }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('video.create.save')</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-secondary">@lang('video.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
