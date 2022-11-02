@extends('admin.layouts.app')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">SEO</h3>
                                <div class="card-tools">
                                    <a class="btn btn-green" href="{{url('admin/seo_titles/create')}}" role="button">Create</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('success.success')
                                @include('errors.error')
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">S.N.</th>
                                        <th class="text-center">SEO Title</th>
                                        <th class="text-center">SEO Description</th>
                                        <th class="text-center">SEO Type</th>
                                        {{--                                        <th class="text-center">Description</th>--}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <th scope="row" class="text-center">{{$setting->seo_title}}</th>
                                            <td class="text-center">{!! $setting->seo_description !!}</td>
                                            <td class="text-center">{{config('custom.seo_types')[$setting->seo_type]}}</td>

                                            <!-- <td class="text-center">
                                                <a class="btn btn-info btn-sm" href="{{url('admin/seo_titles/'.$setting->id.'/edit')}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
{{--                                                <a class="btn btn-info btn-danger" href="{{url('admin/seo_titles_delete/'.$setting->id)}}" onclick="return confirm('Are you sure want to delete?')">--}}
{{--                                                    <i class="fas fa-pencil-alt">--}}
{{--                                                    </i>--}}
{{--                                                    Delete--}}
{{--                                                </a>--}}
                                            </td> -->

                                            <td class="d-flex justify-content-center action-icons">
                                                <a href="{{url('admin/seo_titles/'.$setting->id.'/edit')}}" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                <a href="{{url('admin/seo_titles/'.$setting->id.'/edit')}}" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="view">
                                                    <i class="fas fa-folder"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="pagination-default" style="margin-top: 10px;">
                                                                        {!! $settings->links() !!}
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script>
        const exampleEl = document.getElementById('example')
        const tooltip = new bootstrap.Tooltip(exampleEl, options)
    </script>

@endsection
