<!DOCTYPE html>
<html>

<head>
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

        .img_deg
        {
            height:100px;
            width: 150px;
            padding:10px;
        }
    </style>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
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
                    <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @include('admin.footer')
</body>

</html>