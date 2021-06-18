@extends('dashboard.layout.master_layout')

@section('title')
    @lang('user.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('user.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('user.create.users')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('user.create.add_new')</span></a></li>
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
                                @lang('user.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('user.store') }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.create.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="user_image">
                                    <label class="custom-file-label" for="customFile">@lang('user.create.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.create.name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control m-input" placeholder=@lang('user.create.name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.create.email'):</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control m-input" placeholder=@lang('user.create.email')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.create.phone'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control m-input" placeholder=@lang('user.create.phone')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('course.create.type'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="type" id="type">
                                        <option disabled>Choose the type of course</option>
                                        <option value="biology">biology</option>
                                        <option value="applied">applied</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('course.create.stages'):</label>
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
                                <label class="col-lg-2 col-form-label">@lang('user.create.password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password" name="password" class="form-control m-input" placeholder=@lang('user.create.password')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.create.confirm_password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control m-input" placeholder=@lang('user.create.confirm_password')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('user.create.save')</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">@lang('user.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
