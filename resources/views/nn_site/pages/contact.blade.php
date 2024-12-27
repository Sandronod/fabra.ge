@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header2')

    <section class="contact-page-section">
        <div class="contactus-main">
            <h1>{{$lang->getInTouch}}</h1>
            <div class="contact-us">
                <form class="forms" action="{{url(getCurrentLocale() == 'ka' ? '' : getCurrentLocale())}}/contact/send" method="POST">
                    @csrf
                    <div class="left-forms">
                        <div class="info-divs">
                            @if ($siteSettings->phone)
                                <div class="info-div">
                                    <img src="/assets/images/phone.svg" alt="Phone">
                                    <p class="info-p">{{$siteSettings->phone}}</p>
                                </div>
                            @endif
                            @if ($siteSettings->email)
                                <div class="info-div">
                                    <img src="/assets/images/email 1.svg" alt="Email">
                                    <p class="info-p">{{$siteSettings->email}}</p>
                                </div>
                            @endif
                            @if ((getCurrentLocale() == 'ka' && $siteSettings->address_ka) || (getCurrentLocale() == 'en' && $siteSettings->address_en))
                                <div class="info-div">
                                    <img src="/assets/images/map 1.svg" alt="Location">
                                    <p class="info-p">
                                        @if (getCurrentLocale() == 'ka')
                                            {{$siteSettings->address_ka}}
                                        @elseif (getCurrentLocale() == 'en')
                                            {{$siteSettings->address_en}}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="right-forms">
                        <div class="info-divs">
                            <div class="info-divs-item">
                                <label class="label required" for="first name">{{$lang->yourName}}</label>
                                <input size="30" type="text" class="input-inf" required name="name" placeholder="" value="{{old('name')}}">
                            </div>
                            <div class="info-divs-item">
                                <label class="label required" for="first name">{{$lang->yourEmail}}</label>
                                <input size="30" type="email" class="input-inf" placeholder="" required name="email" value="{{old('email')}}">
                            </div>
                            <div class="info-divs-item">
                                <label class="label" for="first name">{{$lang->subject}}</label>
                                <input size="30" type="text" class="input-inf" placeholder="" name="subject" value="{{old('subject')}}">
                            </div>
                        </div>
                        <div class="text-area">
                            <div class="textarea">
                                <label class="msg-label required" for="Message">{{$lang->message}}</label>
                                <textarea class="textares" name="message" id="sendMessage" cols="35" rows="10" placeholder="">{{old('message')}}</textarea>
                            </div>
                        <button class="send" id="sendMsg">{{$lang->send}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>    

@endsection