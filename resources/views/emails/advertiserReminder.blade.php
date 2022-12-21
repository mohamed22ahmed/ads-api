<div>
    <h2>Hello Mr.{{ $ad->advertiser->name }}, </h2><h3>how are you?</h3><br><br>

    we sent to you just a reminder for your ad, it should start tomorrow,
    <br>this is your ad details:<br><br>
    <div>
        <span style="font-size:20px;font-weight: bold"> # </span>            {{ $ad->id }}  <br>
        <span style="font-size:20px;font-weight: bold"> type </span>          {{ $ad->type }}  <br>
        <span style="font-size:20px;font-weight: bold"> title </span>         {{ $ad->title }}  <br>
        <span style="font-size:20px;font-weight: bold"> description </span>   {{ $ad->description }}  <br>
        <span style="font-size:20px;font-weight: bold"> start_date </span>    {{ $ad->start_date }}  <br>
        <span style="font-size:20px;font-weight: bold"> created_at </span>    {{ $ad->created_at }}  <br>
    </div>
</div>
