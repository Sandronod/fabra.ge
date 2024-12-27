@foreach ($items as $item)
    <tr>
        <th scope="row" style="text-align: left;">{{$item->id}}</th>
        <td style="text-align: left;">
            <div style="display: flex;align-items: center;">
                @if (isset($item['sender_user']))
                <span class="text-primary d-inline-block margin-right-10">ID: {{$item->user_id}}</span>&nbsp;
                    <a href="{{fullUrl('job/maker/user/'.$item['sender_user']->id)}}" target="_blank">
                        <img src="{{ url($item['sender_user']->profile_photo ? 'assets/nn_site/uploads/user/'.$item['sender_user']->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['sender_user']->firstname}}" class="img-circle margin-right-10" style="object-fit: cover;">
                        {{$item['sender_user']->firstname}}&nbsp;{{$item['sender_user']->lastname}}
                    </a>
                @elseif (isset($item['sender_company']))
                    <span class="text-primary d-inline-block margin-right-10">ID: {{$item['sender_company']->id}}</span>&nbsp;
                    <a href="{{fullUrl('companies/details/'.$item['sender_company']->id)}}" target="_blank">
                        <img src="{{ url($item['sender_company']->logo ? 'assets/nn_site/uploads/company/'.$item['sender_company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['sender_company']->firstname}}" class="img-circle margin-right-10" style="object-fit: cover;">
                        {{$item['sender_company']->name}}
                    </a>
                @endif
            </div>
        </td>
        <td style="text-align: left;">
            {{$item->package_id}} / {{$item['package_name']}}
        </td>
        <td style="text-align: left;">
            @if ($item->status == 0)
                <span class="text-warning">მიმდინარე</span>
            @elseif ($item->status == 1)
                <span class="text-success">დარიცხული</span>
            @elseif ($item->status == 2)
                <span class="text-danger">მოხდა შეცდომა დარიცხვისას</span>
            @endif
        </td>
        <td style="text-align: left;">{{$item->created_at}}</td>
    </tr>
@endforeach