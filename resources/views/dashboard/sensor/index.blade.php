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
                        <li class="breadcrumb-item active">Sensor</li>
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
                            <h3 class="card-title">Daftar Sensor</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Waktu-Tanggal</th>
                                        <th>Nilai ph</th>
																				<th>Nilai kelembaban</th>
																				<th>Node</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Device as $device)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
																				<td>{{ $device->created_at }}</td>
                                        <td>{{ $device->sensor_ph }}</td>
                                        <td>{{ $device->sensor_moisture }}</td>
																				<td>{{ $device->device_id }}</td>



                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
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

@push('modal')
<!-- Modal -->
<div class="modal fade" id="modalKunjungan" tabindex="-1" role="dialog" aria-labelledby="modalKunjunganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKunjunganLabel">Laporan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/dashboard/kunjungan/export_excel">
                <div class="modal-body">
                    @csrf
                    <div class="form-group d-flex justify-content-start">
                        <div class="col-md-6">
                            <label for="">Dari Tanggal</label>
                            <input type="date" name="awal" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Sampai Tanggal</label>
                            <input type="date" name="akhir" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endpush
