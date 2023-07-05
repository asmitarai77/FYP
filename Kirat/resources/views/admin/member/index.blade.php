@extends('admin.includes.app')
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
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Created At</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $key => $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>


                                <td>{{ $item->user->name }}
                                </td>
                                <td>{{ $item->user->email }}
                                </td>
                                <td>{{ $item->address }}
                                </td>
                                <td>{{ $item->phone }}
                                </td>
                                <td>{{ $item->member_id }}
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
