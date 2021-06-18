@extends('dashboard.layout.master_layout')

@section('title')
    @lang('question.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('question.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('question.index.questions')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('question.create.add_new')</span></a></li>
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
                                @lang('question.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('question.store') }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="question_image">
                                    <label class="custom-file-label" for="customFile">@lang('question.create.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.title'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control m-input" placeholder=@lang('question.create.title')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_1'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_1" id="option_1" value="{{ old('option_1') }}" class="form-control m-input" placeholder=@lang('question.create.option_1')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_2'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_2" id="option_2" value="{{ old('option_2') }}" class="form-control m-input" placeholder=@lang('question.create.option_2')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_3'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_3" id="option_3" value="{{ old('option_3') }}" class="form-control m-input" placeholder=@lang('question.create.option_3')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_4'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_4" id="option_4" value="{{ old('option_4') }}" class="form-control m-input" placeholder=@lang('question.create.option_4')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.right_answer'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="right_answer" id="right_answer" value="{{ old('right_answer') }}" class="form-control m-input" placeholder=@lang('question.create.right_answer')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.mark'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="mark" id="mark" value="{{ old('mark') }}" class="form-control m-input" placeholder=@lang('question.create.mark')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.note'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="note" id="note" value="{{ old('note') }}" class="form-control m-input" placeholder=@lang('question.create.note')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('question.create.quizes'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="quiz_id" id="quiz_id">
                                        <option disabled>@lang('question.create.quizes')</option>
                                        @foreach ($quizes as $quize)
                                            <option {{$quize->id == old('quiz_id') ? "selected" : ""}} value="{{ $quize->id }}">{{ $quize->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.title_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title_ar" id="title_ar" value="{{ old('title_ar') }}" class="form-control m-input" placeholder=@lang('question.create.title_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_1_ar'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_1_ar" id="option_1_ar" value="{{ old('option_1_ar') }}" class="form-control m-input" placeholder=@lang('question.create.option_1_ar')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_2_ar'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_2_ar" id="option_2_ar" value="{{ old('option_2_ar') }}" class="form-control m-input" placeholder=@lang('question.create.option_2_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_3_ar'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_3_ar" id="option_3_ar" value="{{ old('option_3_ar') }}" class="form-control m-input" placeholder=@lang('question.create.option_3_ar')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('question.create.option_4_ar'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="option_4_ar" id="option_4_ar" value="{{ old('option_4_ar') }}" class="form-control m-input" placeholder=@lang('question.create.option_4_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.right_answer_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="right_answer_ar" id="right_answer_ar" value="{{ old('right_answer_ar') }}" class="form-control m-input" placeholder=@lang('question.create.right_answer_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('question.create.note_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="note_ar" id="note_ar" value="{{ old('note_ar') }}" class="form-control m-input" placeholder=@lang('question.create.note_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('question.create.save')</button>
                                    <a href="{{ route('question.index') }}" class="btn btn-secondary">@lang('question.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
