@extends('../nn_cms/index')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(getCurrentLocale() . '/manager') }}">{{ trans('general.bcHome') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Site Settings</h3>
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <div class="tab-content">
                    {!! Form::open(array('method' => 'PATCH', 'url' => getCurrentLocale().'/manager/site-settings/update', 'id' => 'form_site_setting', 'class' => 'form-horizontal form_ajax')) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Email</label>
                                <div class="col-md-7">
                                    <input type="text" name="email" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->email : '' }}">
                                </div>
                            </div>
{{-- 
                            <div class="form-group">
                                <label class="control-label col-md-2">Header Logo</label>
                                <div class="col-md-3">
                                    <div class="photo">
                                        <img src="{{ ($siteSettings && $siteSettings->header_logo) ? $siteSettings->header_logo : url('assets/nn_cms/custom/images/no-image-1.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/no-image-1.png') }}" id="header_logo_show_img" class="img-responsive img-thumbnail center-block img" alt="catalog photo">
                                        <input type="hidden" name="header_logo" id="header_logo" onclick="chooseImg('header_logo')" data-required="1" class="form-control" value="{{ ($siteSettings && $siteSettings->header_logo) ? $siteSettings->header_logo : '' }}">
                                    </div>
                                    <button type="button" onclick="chooseImg('header_logo')" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">ლოგოს ატვირთვა</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Footer Logo</label>
                                <div class="col-md-3">
                                    <div class="photo">
                                        <img src="{{ ($siteSettings && $siteSettings->footer_logo) ? $siteSettings->footer_logo : url('assets/nn_cms/custom/images/no-image-1.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/no-image-1.png') }}" id="footer_logo_show_img" class="img-responsive img-thumbnail center-block img" alt="catalog photo">
                                        <input type="hidden" name="footer_logo" id="footer_logo" onclick="chooseImg('footer_logo')" data-required="1" class="form-control" value="{{ ($siteSettings && $siteSettings->footer_logo) ? $siteSettings->footer_logo : '' }}">
                                    </div>
                                    <button type="button" onclick="chooseImg('footer_logo')"  class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">ლოგოს ატვირთვა</button>
                                </div>
                            </div> --}}
                            
                            {{-- <div class="form-group">
                                <label class="col-md-2 control-label">One time payment €</label>
                                <div class="col-md-7">
                                    <input type="text" name="one_time_payment_price" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->one_time_payment_price : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Month payment €</label>
                                <div class="col-md-7">
                                    <input type="text" name="month_payment_price" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->month_payment_price : '' }}">
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label class="control-label col-md-2">ლოგო (პროფილის გვერდზე)</label>
                                <div class="col-md-3">
                                    <div class="photo">
                                        <img src="{{ ($siteSettings && $siteSettings->profile_logo) ? $siteSettings->profile_logo : url('assets/nn_cms/custom/images/no-image-1.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/no-image-1.png') }}" id="profile_logo_show_img" class="img-responsive img-thumbnail center-block img" alt="catalog photo">
                                        <input type="hidden" name="profile_logo" id="profile_logo" onclick="chooseImg('profile_logo')" data-required="1" class="form-control" value="{{ ($siteSettings && $siteSettings->profile_logo) ? $siteSettings->profile_logo : '' }}">
                                    </div>
                                    <button type="button" onclick="chooseImg('profile_logo')"  class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">ლოგოს ატვირთვა</button>
                                </div>
                            </div> --}}

                            {{-- 41.70874716345268
                            44.764587832987495 --}}

                            {{-- <div class="form-group">
                                <label class="col-md-2 control-label">ბანკის ანგარიში</label>
                                <div class="col-md-7">
                                    <input type="text" name="bank_account" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->bank_account : '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Map - latitude</label>
                                <div class="col-md-7">
                                    <input type="text" name="latitude" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->latitude : '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Map - longitude</label>
                                <div class="col-md-7">
                                    <input type="text" name="longitude" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->longitude : '' }}">
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label class="col-md-2 control-label">Mobile</label>
                                <div class="col-md-7">
                                    <input type="text" name="mobile" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->mobile : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Telephone</label>
                                <div class="col-md-7">
                                    <input type="text" name="phone" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->phone : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Address GEO</label>
                                <div class="col-md-7">
                                    <input type="text" name="address_ka" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->address_ka : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Address ENG</label>
                                <div class="col-md-7">
                                    <input type="text" name="address_en" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->address_en : '' }}">
                                </div>
                            </div>
                            {{-- 
                            <div class="form-group">
                                <label class="col-md-2 control-label">მისამართი RUS</label>
                                <div class="col-md-7">
                                    <input type="text" name="address_ru" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->address_ru : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">სამუშაო საათები GEO</label>
                                <div class="col-md-7">
                                    <input type="text" name="work_hours_ka" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->work_hours_ka : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">სამუშაო საათები ENG</label>
                                <div class="col-md-7">
                                    <input type="text" name="work_hours_en" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->work_hours_en : '' }}">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-2 control-label">სამუშაო საათები RUS</label>
                                <div class="col-md-7">
                                    <input type="text" name="work_hours_ru" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->work_hours_ru : '' }}">
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="col-md-2 control-label">ფუტერის ტექსტი GEO</label>
                                <div class="col-md-7">
                                    <textarea type="text" name="footer_text_ka" class="form-control input-lg">{{ $siteSettings ? $siteSettings->footer_text_ka : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="col-md-2 control-label">ფუტერის ტექსტი ENG</label>
                                <div class="col-md-7">
                                    <textarea type="text" name="footer_text_en" class="form-control input-lg">{{ $siteSettings ? $siteSettings->footer_text_en : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="col-md-2 control-label">ფუტერის ტექსტი RUS</label>
                                <div class="col-md-7">
                                    <textarea type="text" name="footer_text_ru" class="form-control input-lg">{{ $siteSettings ? $siteSettings->footer_text_ru : '' }}</textarea>
                                </div>
                            </div>
                        </div>--}}
                        {{-- <div class="form-group last">
                            <label class="col-md-2 control-label">Youtube</label>
                            <div class="col-md-7">
                                <input type="text" name="youtube" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->youtube : '' }}">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">Facebook</label>
                            <div class="col-md-7">
                                <input type="text" name="facebook" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->facebook : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Instagram</label>
                            <div class="col-md-7">
                                <input type="text" name="instagram" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->instagram : '' }}">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-md-2 control-label">Twitter</label>
                            <div class="col-md-7">
                                <input type="text" name="twitter" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->twitter : '' }}">
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-md-2 control-label">Linkedin</label>
                            <div class="col-md-7">
                                <input type="text" name="linkedin" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->linkedin : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title GEO</label>
                            <div class="col-md-7">
                                <input type="text" name="title_ka" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->title_ka : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title ENG</label>
                            <div class="col-md-7">
                                <input type="text" name="title_en" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->title_en : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description GEO</label>
                            <div class="col-md-7">
                                <textarea type="text" name="description_ka" class="form-control input-lg">{{ $siteSettings ? $siteSettings->description_ka : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description ENG</label>
                            <div class="col-md-7">
                                <textarea type="text" name="description_en" class="form-control input-lg">{{ $siteSettings ? $siteSettings->description_en : '' }}</textarea>
                            </div>
                        </div>
                        <!-- Bank currencies -->
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title (Bank currencies Page) GEO</label>
                            <div class="col-md-7">
                                <input type="text" name="bank_currencies_title_ka" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->bank_currencies_title_ka : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title (Bank currencies Page) ENG</label>
                            <div class="col-md-7">
                                <input type="text" name="bank_currencies_title_en" class="form-control input-lg" value="{{ $siteSettings ? $siteSettings->bank_currencies_title_en : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description (Bank currencies Page) GEO</label>
                            <div class="col-md-7">
                                <textarea type="text" name="bank_currencies_description_ka" class="form-control input-lg">{{ $siteSettings ? $siteSettings->bank_currencies_description_ka : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description (Bank currencies Page) ENG</label>
                            <div class="col-md-7">
                                <textarea type="text" name="bank_currencies_description_en" class="form-control input-lg">{{ $siteSettings ? $siteSettings->bank_currencies_description_en : '' }}</textarea>
                            </div>
                        </div>
                        <!-- End Bank currencies-->
                        
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tags (head)</label>
                            <div class="col-md-7">
                                <textarea type="text" name="tags_head" class="form-control input-lg">{{ $siteSettings ? $siteSettings->tags_head : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tags (body)</label>
                            <div class="col-md-7">
                                <textarea type="text" name="tags_body" class="form-control input-lg">{{ $siteSettings ? $siteSettings->tags_body : '' }}</textarea>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <div class="row">
                                <div class="col-md-9">
                                    <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all" data-update-success-text="{{ trans('general.updateSuccess') }}">{{ trans('general.fclbUpdate') }}</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @push('body.bottom')

        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

        {{-- <script src="{{ url('assets/nn_cms/custom/js/form-site-settings.js') }}" type="text/javascript"></script> --}}

        <!-- END UPDATE BY AJAX FORM.JS  -->

        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    @endpush

@stop