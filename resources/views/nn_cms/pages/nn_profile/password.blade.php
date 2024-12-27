@extends('../nn_cms/pages/profile')

@section('tab_content')

    <!-- CHANGE PASSWORD TAB -->
    <div class="tab-pane active" id="tab_1_3">
        {!! Form::model($users,['method' => 'PATCH', 'url' => getCurrentLocale() . '/manager/user/profile/'.$users->id.'/update/pass', 'autocomplete' => 'off']) !!}
            <div class="form-group{{ ($errors->has('current_password') || $errors->has('current_password_match')) ? ' has-error' : ''}}">
                {!! Form::label('current_password', trans('general.fclbCurrentPassword').':', ['class' => 'control-label']) !!}
                {!! Form::password('current_password', ['class' => 'form-control']) !!}
                @if($errors->has('current_password'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('current_password')[0] }}
                    </div>
                @elseif($errors->has('current_password_match'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('current_password_match')[0] }}
                    </div>
                @endif
            </div>
            <div class="form-group{{ ($errors->has('password')) ? ' has-error' : ''}}">
                {!! Form::label('password', trans('general.fclbNewPassword').':',['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                @if($errors->has('password'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('password')[0] }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', trans('general.fclbRetypeNewPassword').':', ['class' => 'control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            <div class="margin-top-10">
                <button type="submit" class="btn green"> {{ trans('general.fclbUpdate') }} </button>
            </div>
        {!! Form::close() !!}
    </div>
    <!-- END CHANGE PASSWORD TAB -->

@stop