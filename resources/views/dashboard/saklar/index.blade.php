@extends('dashboard.layouts.main')

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pompa Air</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Saklar </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

													<div class="row">
														<div class="col-md-3">
															<label for="WaterPum1">Waterpum 1</label><br>
															<input id="chkToggle1" type="checkbox" data-toggle="toggle">
														</div>
														<div class="col-md-3">
															<label for="WaterPum2">Waterpum 2</label><br>
															<input id="chkToggle1" type="checkbox" data-toggle="toggle">
														</div>
														<div class="col-md-3">
															<label for="MOV1">MOV 1</label><br>
															<input id="chkToggle1" type="checkbox" data-toggle="toggle">
														</div>
														<div class="col-md-3">
															<label for="MOV2">MOV 2</label><br>
															<input id="chkToggle1" type="checkbox" data-toggle="toggle">
														</div>
													</div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
