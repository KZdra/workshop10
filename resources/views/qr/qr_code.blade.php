@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Connect') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {{-- <div class="alert alert-info">

                    </div> --}}

                    <div class="card">
                        <div class="card-body p-3">
                            @if (isset($qr))
                            <img src="data:image/png;base64,{{ $qr }}" alt="QR Code">
                        @else
                            <p>{{ $message }}</p>
                        @endif
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
