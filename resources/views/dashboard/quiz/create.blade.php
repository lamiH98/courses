@extends('dashboard.layout.master_layout')

@section('title')
    @lang('quiz.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('quiz.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('quiz.index.quizes')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('quiz.create.add_new')</span></a></li>
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
                                @lang('quiz.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('quiz.store') }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('quiz.create.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="quiz_image">
                                    <label class="custom-file-label" for="customFile">@lang('quiz.create.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('quiz.create.title'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control m-input" placeholder=@lang('quiz.create.title')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('quiz.create.time'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="time" id="time" value="{{ old('time') }}" class="form-control m-input" placeholder=@lang('quiz.create.time')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('quiz.create.note'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="note" id="note" value="{{ old('note') }}" class="form-control m-input" placeholder=@lang('quiz.create.note')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('quiz.create.stages'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="stage_id" id="stage_id">
                                        <option disabled>Stages</option>
                                        @foreach ($stages as $stage)
                                            <option {{$stage->id == old('stage_id') ? "selected" : ""}} value="{{ $stage->id }}">{{ $stage->stage }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('quiz.create.courses'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="course_id" id="course_id">
                                        <option disabled>Courses</option>
                                        @foreach ($courses as $course)
                                            <option {{$course->id == old('course_id') ? "selected" : ""}} value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('quiz.create.status'):</label>
                                <div class="form-check col-md-4">
                                    <input class="form-check-input" name="status" type="checkbox" value="show" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        @lang('quiz.create.status')
                                    </label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description">@lang('quiz.create.description')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description" name="description" rows="9">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('quiz.create.title_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar') }}" class="form-control m-input" placeholder=@lang('quiz.create.title_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="description_ar">@lang('quiz.create.description_ar')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="description_ar" name="description_ar" rows="9">{{ old('description_ar') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('quiz.create.note_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="note_ar" id="note_ar" value="{{ old('note_ar') }}" class="form-control m-input" placeholder=@lang('quiz.create.note_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('quiz.create.save')</button>
                                    <a href="{{ route('quiz.index') }}" class="btn btn-secondary">@lang('quiz.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
