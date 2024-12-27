@foreach ($items as $item)
    <tr>
        <th scope="row" style="text-align: left;">{{$item->id}}</th>
        <td style="text-align: left;">
            <div style="display: flex;align-items: center;">
                <span class="text-primary d-inline-block margin-right-10">ID: {{$item->company_id}}</span>&nbsp;
                <a href="{{fullUrl('companies/details/'.$item['company']->id)}}" target="_blank">
                    <img src="{{ url($item['company']->logo ? 'assets/nn_site/uploads/company/'.$item['company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['company']->firstname}}" class="img-circle margin-right-10">
                    {{$item['company']->name}}
                </a>
            </div>
        </td>
        <td style="text-align: left;">
            <div style="display: flex;align-items: center;">
                @if (isset($item['receiver_user']))
                <span class="text-primary d-inline-block margin-right-10">ID: {{$item->user_id}}</span>&nbsp;
                    <a href="{{fullUrl('job/maker/user/'.$item['receiver_user']->id)}}" target="_blank">
                        <img src="{{ url($item['receiver_user']->profile_photo ? 'assets/nn_site/uploads/user/'.$item['receiver_user']->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['receiver_user']->firstname}}" class="img-circle margin-right-10">
                        {{$item['receiver_user']->firstname}}&nbsp;{{$item['receiver_user']->lastname}}
                    </a>
                @elseif (isset($item['receiver_company']))
                    <span class="text-primary d-inline-block margin-right-10">ID: {{$item['receiver_company']->id}}</span>&nbsp;
                    <a href="{{fullUrl('companies/details/'.$item['receiver_company']->id)}}" target="_blank">
                        <img src="{{ url($item['receiver_company']->logo ? 'assets/nn_site/uploads/company/'.$item['receiver_company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['receiver_company']->firstname}}" class="img-circle margin-right-10">
                        {{$item['receiver_company']->name}}
                    </a>
                @endif
            </div>
        </td>
        <td style="text-align: left;"><span class="text-primary">{{$item->iban}}</span></td>
        <td style="text-align: left;">{{$item->user_offered_budget}}</td>
        <td style="text-align: left;">{{$item->payment_budget}}</td>
        <td style="text-align: left;">{{$item->user_offered_left_budget}}</td>
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