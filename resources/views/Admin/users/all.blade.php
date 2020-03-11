@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="container">
            <form>
                <div class="col-sm-12">
                    <table id="productsTable" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" role="grid" aria-describedby="example_info">
                        <select id="action-list">
                            <option value="0" selected disabled>Actions</option>
                            <option value="1">Edit</option>
                            <option value="2" class="delete">Delete</option>
                        </select>
<!--                        <input id="save" type="submit" value="Save">-->
                        <button type="submit" onclick="editelement()" id="apply" class="hidden">Apply</button>
                        <div class="clearfix"></div>
                        <thead>
                            <tr role="row">
                                <th class="text-center delete select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 12px; position: relative;"></th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Username</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">name</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">email</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">address</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">phone</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">role</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">state</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"></th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr role="row">
                                <td></td>
                                <td class="sorting_1" >
                                   {{$user->username}}
                                </td>
                                <td class="sorting_1" >
                                   {{$user->name}}
                                </td>
                                <td class="sorting_1" >
                                   {{$user->email}}
                                </td>
                                <td class="sorting_1" >
                                   {{$user->address}}
                                </td>
                                <td class="sorting_1" >
                                   {{$user->phone}}
                                </td>
                                <td class="sorting_1" >
                                   {{$user->privilege}}
                                </td>
                                <td class="sorting_1" >
                                    @if($user->privilege == 'user')
                                    @if ($user->active == '1')
                                        <form></form>
                                        <form method="POST"  action="{{ route('update_user',$user->id) }}">
                                            {{method_field('PUT')}}
                                            @csrf
                                            <input hidden name="active" value="0">
                                            <button type="submit" class="btn btn-danger">Deactivete</button>
                                        </form>

                                    @else
                                        <form></form>
                                        <form method="POST"  action="{{ route('update_user',$user->id) }}">
                                            {{method_field('PUT')}}
                                            @csrf
                                            <input hidden name="active" value="1">
                                            <button type="submit" class="btn btn-primary">activete</button>
                                        </form>
                                    @endif
                                    @endif
                                </td>
                                <td><a href="{{route('edit_user',$user->id)}}"> <button type="button" class="btn btn-primary">Update</button> </a></td>

                                <td>
                                    <form method="POST"  action="{{ route('delete_user',$user->id) }}">
                                        {{method_field('DELETE')}}
                                        @csrf
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
