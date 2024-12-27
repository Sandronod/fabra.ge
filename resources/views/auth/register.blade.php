@extends('../auth/index')

@section('content')

<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="{{ url('/auth/register') }}" enctype="multipart/form-data" class="{{ ($errors->any()) ? 'animated shake' : '' }}">
    <h3 class="form-title font-green">{{ trans('auth.register') }}</h3>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label">{{ trans('auth.name') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="name" value="{{ old('name') }}" />
    </div>

    <div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label">{{ trans('auth.surName') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="surname" value="{{ old('surname') }}" />
    </div>

    <div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label">{{ trans('auth.eMail') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" name="email" value="{{ old('email') }}" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ trans('auth.password') }}</label>
        <input id="password" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ trans('auth.password') }}" name="password" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ trans('auth.confirmPassword') }}</label>
        <input id="password" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ trans('auth.password') }}" name="password_confirmation" />
    </div>

    <div class="form-actions">
        <button type="submit" class="btn green uppercase">{{ trans('auth.register') }}</button>
    </div>
</form>

@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@stop