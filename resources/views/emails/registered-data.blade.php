@component('mail::message')

# Speed Runners 2020

## @lang('messages.hello') {{ $data['names'] }}


@lang('messages.information')
@component('mail::table')
| Laravel | Table | Image
| :------------- |:-------------| :-------------: |
|<b>@lang('messages.names'):</b>| {{ $data['names'] }} | <img class="img" src="{{asset('/img/adidas_runner.jpg')}}" alt=""> |
|<b>@lang('messages.last_names'):</b>| {{ $data['last_names'] }} |
|<b>@lang('messages.email'):</b>| {{ $data['email'] }} |
|<b>@lang('messages.genre'):</b>| {{ $data['genre'] }} |
|<b>@lang('messages.age'):</b>| {{ $data['age'] }} |
|<b>@lang('messages.shoes'):</b>| {{ $data['shoes'] }} |
|<b>@lang('messages.team'):</b>| {{ $data['team'] }} |
|<b>@lang('messages.city'):</b>| {{ $data['city'] }} |
|<b>@lang('messages.distance'):</b>| {{ $data['distance'] }} |
|<b>@lang('messages.best_time'):</b>| {{ $data['best_time'] }} |
@endcomponent

@component('mail::panel')
<div class="img-box">

<img class="img-inline" src="{{asset('/img/banner_1.jpg')}}" alt="">
<img class="img-inline" src="{{asset('/img/banner_2.jpg')}}" alt="">

</div>
@endcomponent

@endcomponent
