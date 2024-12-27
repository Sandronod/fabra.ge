@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header2')

    <section class="terms-section1">
        <div class="terms-parent">
            <h1>{{$item->name}}</h1>
            <div class="terms-part">
                {!!$item->body!!}
            </div>
        </div>
    </section>

@endsection