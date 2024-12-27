@foreach ($items as $item)
    <tr>
        <th scope="row" style="text-align: left;">{{$item->id}}</th>
        <td style="text-align: left;">
            <a href="{{fullUrl('companies/details/'.$item->id)}}" target="_blank">
                <img src="{{ url($item->logo ? 'assets/nn_site/uploads/company/'.$item->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item->firstname}}" class="img-circle margin-right-10" style="object-fit: cover;">
                {{$item->name}}
            </a>
        </td>
        <td style="text-align: left;">
            <ul>
                @foreach ($item->categories as $cItem)
                    <li>{{ $cItem->name }}</li>
                @endforeach
            </ul>
        </td>
        <td style="text-align: left;">{{$item->rating}}</td>
        <td style="text-align: left;">{{$item->package_valid ? 'კი' : ''}}</td>
        <td style="text-align: left;">{{$item->add_projects_count}}</td>
        <td style="text-align: left;">{{$item->request_projects_count}}</td>
        <td style="text-align: left;">{{$item->tasks_count}}</td>
        <td style="text-align: left;">{{$item->package_end_date}}</td>
        <td>
            <div class="list-group">
                @foreach ($item['jobs'] as $jItem)
                    <li class="list-group-item">
                        <h4>პროექტი</h4> 
                        <a href="{{fullUrl('jobs/details/'.$jItem->id.'?show_job=1')}}" target="_blank">{{$jItem->name}}</a>
                        <hr>
                        <h4>შემსრულებელი</h4>
                        @if (isset($jItem['user']))
                            <img src="{{ url($jItem['user']->profile_photo ? 'assets/nn_site/uploads/user/'.$jItem['user']->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$jItem['user']->firstname}}" class="img-circle">
                            <h5><a href="{{fullUrl('company/job/maker/user/'.$jItem['user']->id)}}" target="_blank">{{$jItem['user']->firstname}}&nbsp;{{$jItem['user']->lastname}}</a></h5>
                        @elseif (isset($jItem['company']))
                            <img src="{{ url($jItem['company']->logo ? 'assets/nn_site/uploads/company/'.$jItem['company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$jItem['company']->name}}" class="img-circle">
                            <h5><a href="{{fullUrl('companies/details/'.$jItem['company']->id)}}" target="_blank">{{$jItem['company']->name}}</a></h5>
                        @endif
                        <hr>
                        @if ($jItem->paid)
                            <h4 class="text-success">თანხა სრულად გადახდილია</h4>
                        @else
                            <h4 class="text-danger">დარჩენილი თანხა: {{$jItem->user_left_budget}} ₾</h4>
                        @endif
                    </li>
                @endforeach
            </div>
        </td>
    </tr>
@endforeach