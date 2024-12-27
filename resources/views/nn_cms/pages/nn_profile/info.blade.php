@extends('../nn_cms/pages/profile')

@section('tab_content')

    <!-- PERSONAL INFO TAB -->
    <div class="tab-pane active" id="tab_1_1">
        {!! Form::model($users,['method' => 'PATCH', 'url' => getCurrentLocale() . '/manager/user/profile/'.$users->id.'/update/info']) !!}
            <div class="form-group{{ ($errors->has('name')) ? ' has-error' : ''}}">
                {!! Form::label('name', trans('general.fclbUserName').':', ['class' => 'control-label']) !!}
    			{!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if($errors->has('name'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('name')[0] }}
                    </div>
                @endif
            </div>
            <div class="form-group{{ ($errors->has('surname')) ? ' has-error' : ''}}">
                {!! Form::label('surname', trans('general.fclbUserSurname').':', ['class' => 'control-label']) !!}
                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                @if($errors->has('surname'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('surname')[0] }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn green"> {{ trans('general.fclbUpdate') }} </button>
        {!! Form::close() !!}
        {!! Form::model($users,['method' => 'PATCH', 'url' => getCurrentLocale() . '/manager/user/profile/'.$users->id.'/update/info_mail', 'class' => 'margin-top-20']) !!}
            <div class="form-group{{ ($errors->has('email')) ? ' has-error' : ''}}">
                {!! Form::label('email', trans('general.fclbEmail').':', ['class' => 'control-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @if($errors->has('email'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('email')[0] }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn green"> {{ trans('general.fclbUpdateEmail') }} </button>
        {!! Form::close() !!}
    </div>
    <!-- END PERSONAL INFO TAB -->

@stop