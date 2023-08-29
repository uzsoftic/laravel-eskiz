@extends('vendor.laravel-eskiz.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Eskiz SMS</a>
            </li>
            <li class="breadcrumb-item active">SMS Listing</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> SMS Listing ({{ $listing->total() }})</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Phone</th>
                            <th>User IP</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listing as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->phone }}</td>
                                <td>{{ $list->user_ip }}</td>
                                <td>{{ $list->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div>
                        {{ $listing->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
