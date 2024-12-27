@foreach ($items as $item)
    <tr>
        <th scope="row" style="text-align: left;">{{$item->id}}</th>
        <td style="text-align: left;">
            <a href="{{fullUrl('job/maker/user/'.$item->id)}}" target="_blank">
                <img src="{{ url($item->profile_photo ? 'assets/nn_site/uploads/user/'.$item->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item->firstname}}" class="img-circle margin-right-10">
                {{$item->firstname}}&nbsp;{{$item->lastname}}
            </a>
        </td>
        <td style="text-align: left;">{{$item->email}}</td>
        <td style="text-align: left;">{{$item->phone}}</td>
        <td style="text-align: left;">
            <ul>
                @foreach ($item->categories as $cItem)
                    <li>{{ $cItem->name }}</li>
                @endforeach
            </ul>
        </td>
        <td style="text-align: left;">{{$item->rating}}</td>
        <td style="text-align: left;">{{$item->package_valid ? 'კი' : 'არა'}}</td>
        <td style="text-align: left;">{{$item->request_projects_count}}</td>
        <td style="text-align: left;">{{$item->package_valid ? $item->package_end_date : '-'}}</td>
    </tr>
@endforeach