@extends('dashboard.layout.master_layout')

@section('title')
    @lang('course.update.edit_course')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('course.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('course.index.courses')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('course.update.edit_course')</span></a></li>
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
                                @lang('course.update.edit_course')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('course.update', $course->id) }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('course.update.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="course_image">
                                    <label class="custom-file-label" for="customFile">@lang('course.update.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('course.update.title'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" id="title" value="{{ $course->title }}" class="form-control m-input" placeholder=@lang('course.update.title')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('course.update.time'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="time" id="time" value="{{ $course->time }}" class="form-control m-input" placeholder=@lang('course.update.time')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('course.update.price'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="price" id="price" value="{{ $course->price }}" class="form-control m-input" placeholder=@lang('course.update.price')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('course.update.price_offer'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="price_offer" id="price_offer" value="{{ $course->price_offer }}" class="form-control m-input" placeholder=@lang('course.update.price_offer')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('course.create.type'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="type" id="type">
                                        <option disabled>Choose the type of course</option>
                                        <option {{$course->type == 'biology' ? "selected" : ""}} value="biology">biology</option>
                                        <option {{$course->type == 'applied' ? "selected" : ""}} value="applied">applied</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('course.create.stages'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="stage_id" id="stage_id">
                                        <option disabled>@lang('course.create.stages')</option>
                                        @foreach ($stages as $stage)
                                            <option {{$stage->id == $course->stage_id ? "selected" : ""}} value="{{ $stage->id }}">{{ $stage->stage }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description">@lang('course.update.description')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description" name="description" rows="9">{{ $course->description }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('course.update.title_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title_ar" id="title_ar" value="{{ $course->title_ar }}" class="form-control m-input" placeholder=@lang('course.update.title_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('course.create.type_ar'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="type_ar" id="type_ar">
                                        <option disabled> إختر نوع الكورس</option>
                                        <option {{$course->type_ar == 'أحيائي' ? "selected" : ""}} value="أحيائي">أحيائي</option>
                                        <option {{$course->type_ar == 'تطبيقي' ? "selected" : ""}} value="تطبيقي">تطبيقي</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description_ar">@lang('course.update.description_ar')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description_ar" name="description_ar" rows="9">{{ $course->description_ar }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('course.update.update')</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-secondary">@lang('course.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
