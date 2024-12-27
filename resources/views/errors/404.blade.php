@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header2')
    
    <main>
        <div class="page-404">
            @if(isset($exception) && $exception->getStatusCode() == 404)
                <h1>{{$lang->page404Title}}</h1>
                <div>{{$lang->page404Descr}}, <a href="{{fullUrl()}}">{{$lang->page404LinkTitle}}</a></div>
            @endif
        </div>
    </main>

@endsection

 