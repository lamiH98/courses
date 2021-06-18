@extends('dashboard.layout.master_layout')

@section('title')
    @lang('video.update.edit_video')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('video.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('video.index.videos')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('video.update.edit_video')</span></a></li>
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
                                @lang('video.update.edit_video')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('video.update', $video->id) }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.update.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="video_image">
                                    <label class="custom-file-label" for="customFile">@lang('video.update.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.update.title'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" id="title" value="{{ $video->title }}" class="form-control m-input" placeholder=@lang('video.update.title')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.create.url'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="url" id="url" value="{{ $video->url }}" class="form-control m-input" placeholder=@lang('video.create.url')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.update.time'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="time" id="time" value="{{ $video->time }}" class="form-control m-input" placeholder=@lang('video.update.time')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('video.create.courses'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="course_id" id="course_id">
                                        <option disabled>courses</option>
                                        @foreach ($courses as $course)
                                            <option {{$course->id == $video->course_id ? "selected" : ""}} value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description">@lang('video.update.description')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description" name="description" rows="9">{{ $video->description }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('video.update.title_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title_ar" id="title_ar" value="{{ $video->title_ar }}" class="form-control m-input" placeholder=@lang('video.update.title_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description_ar">@lang('video.update.description_ar')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description_ar" name="description_ar" rows="9">{{ $video->description_ar }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('video.update.update')</button>
                                    <a href="{{ route('video.index') }}" class="btn btn-secondary">@lang('video.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
