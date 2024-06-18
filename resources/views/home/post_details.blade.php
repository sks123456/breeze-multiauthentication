<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

    </div>
    <div style="text-align:center" class="col-md-12">
        <div><img src="/postimage/{{$post->image}}" class="services_img"></div>
        <h3><b>{{$post->title}}</b></h3>
        <h4>{{$post->description}}</h4>
        <p>Post by <b>{{$post->name}}</b></p>
    </div>
    <!-- header section end -->
    <!-- footer section start -->
    @include('home.footer')
</body>

</html>