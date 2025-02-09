
@php
 $ogTypes = ["title", "description", "image"];
@endphp
@foreach($ogTypes as $type)
   <meta name="{{$type}}" content="{{$metaData[$type]}}" />
   <meta name="og:{{$type}}" content="{{$metaData[$type]}}" />
@endforeach
<meta name="author" content="orien" />
<meta name="website" content="fabra.ge" />
<meta name="url" content="{{request()->fullUrl()}}" />
<meta name="og:url" content="{{request()->fullUrl()}}" />
<meta name="Version" content="v1.0.0" />
