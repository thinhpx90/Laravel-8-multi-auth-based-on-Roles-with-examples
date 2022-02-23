@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','List File')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            @include('dashboards.admins.alert')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Văn Bản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Văn Bản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <table class="table" >
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên File</th>
            <th>Đường dẫn</th>s
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::fileUpload($files) !!}
        </tbody>
    </table>


@endsection
