<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style>
        .title_deg {
            font-size: 30px;
            text-align: center;
            color: white;
            padding: 30px;
        }

        .table_deg {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 70px;
        }

        .th_deg {
            background-color: lightblue;
        }

        .img_deg {
            height: 100px;
            width: 150px;
            padding: 10px;
        }
    </style>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

        </div>

        @endif
        <h1 class="title_deg">All Post</h1>
        <table class="table_deg">
            <tr class="th_deg">
                <th>Post title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post Status</th>
                <th>User Type</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            @foreach($post as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                @if($post->usertype == '1')
                <td>Super Admin</td>
                @elseif($post->usertype == '2')
                <td>Admin</td>
                @elseif($post->usertype == '3')
                <td>Normal User</td>
                @else
                <td>N/A</td>
                @endif
                <td>
                    <img class="img_deg" src="postimage/{{$post->image}}">
                </td>

                <td>
                    <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                </td>
                <td>
                    <a href="{{url('update_post',$post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @include('admin.footer')
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure to Delete this post",
                    text: "You will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {



                        window.location.href = urlToRedirect;

                    }


                });


        }
    </script>
</body>

</html>