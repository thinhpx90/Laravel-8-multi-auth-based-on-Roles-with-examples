@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Experience')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            @include('dashboards.admins.alert')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Experience</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Experience</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên công việc</label>
                <input type="text" name="job_name" class="form-control"  placeholder="Nhập tên công việc">
            </div>

            <div class="form-group">
                <label for="menu">Ngày bắt đầu</label>
                <input type="text" name="start_time" class="form-control"  placeholder="Ngày bắt đầu">
            </div>

            <div class="form-group">
                <label for="menu">Ngày kết thúc</label>
                <input type="text" name="end_time" class="form-control"  placeholder="Ngày kết thúc">
            </div>

            <div class="form-group">
                <label for="menu">Tên công ty</label>
                <input type="text" name="company_name" class="form-control"  placeholder="Nhập tên công ty">
            </div>


            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control"></textarea>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm kinh nghiệm</button>
        </div>
        @csrf
    </form>


@endsection
