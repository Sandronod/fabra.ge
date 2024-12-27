@extends('../nn_cms/pages/profile')



@section('tab_content')



    <!-- CHANGE AVATAR TAB -->

    <div class="tab-pane active" id="tab_1_2">

        {!! Form::model($users,['method' => 'PATCH', 'url' => getCurrentLocale() . '/manager/user/profile/'.$users->id.'/update/photo', 'autocomplete' => 'off']) !!}

            <div class="form-group{{ ($errors->has('imgurl')) ? ' has-error' : ''}}">

                <input type="hidden" name="imgurl" id="imgurl" data-required="1" class="form-control profile-imgurl" value="">

                <button type="button" class="btn default uppercase filemanager-btn" data-lang="">{{ trans('general.fclbSelectPhoto') }}</button>

                <button type="submit" class="btn green"> {{ trans('general.fclbSaveChanges') }} </button>

                @if($errors->has('imgurl'))

                    <div class="error-text text-danger">

                        {{ $errors->default->get('imgurl')[0] }}

                    </div>

                @endif

            </div>

        {!! Form::close() !!}

    </div>

    <!-- END CHANGE AVATAR TAB -->



    @push('head')

        <!--.. BEGIN PROFILE STYLES -->

        <link href="{{ url('assets/nn_cms/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />

        <!--.. END PROFILE STYLES -->

        <!-- END PROFILE CSS -->

    @endpush



    @push('body.bottom')

        <script src="{{ url('assets/nn_cms/custom/js/profile-filemanager-image.js') }}" type="text/javascript"></script>
        <script src="{{ url('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    @endpush



@stop