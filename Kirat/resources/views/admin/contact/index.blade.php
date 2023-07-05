@extends('admin.includes.app')
<style>
    .alert {
        color: red;
    }

    .thumb-image {
        float: left;
        width: 100px;
        position: relative;
        padding: 5px;
        height: 100px;
    }
</style>
@section('main-content')
    <div class="content-wrapper">


        <!-- /.card-header -->
        <!-- form start -->
        <div class="card">
            <div class="card-header">


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Created At</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>


                                <td>{{ $item->name }}
                                </td>
                                <td>{{ $item->email }}
                                </td>
                                <td>{{ $item->subject }}
                                </td>
                                <td>{{ $item->message }}
                                </td>

                                <td>{{ $item->created_at }}
                                </td>


                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
