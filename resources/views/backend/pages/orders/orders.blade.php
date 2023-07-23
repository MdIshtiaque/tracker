@extends('backend.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Order Manage</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class=" float-right">
                            <a class="btn btn-sm btn-info create" data-toggle="modal" data-target="#showModal">
                                <i class="fa fa-plus"></i>
                                Create New Order
                            </a>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL</th>
                                        <th class="text-center">BL no.</th>

                                        <th class="text-center">Booking no.</th>
                                        <th class="text-center">Starting Point</th>
                                        <th class="text-center">Destination</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->bl_no }}</td>
                                            <td>{{ $order->booking_no }}</td>
                                            <td>{{ $order->starting_point }}</td>
                                            <td>{{ $order->destination }}</td>
                                            <td>{{ $order->status->first()->title ?? '' }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info status mb-2" data-toggle="modal"
                                                    data-target="#showModal2" data-id="{{ $order->id }}">
                                                    <i class="fa fa-blog"></i>
                                                    Change Status
                                                </a>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->

    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Create Orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card" style="width: 100%;" id="modal_body">
                        @include('backend.pages.orders.create')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal2 -->
    @foreach ($orders as $order)
        <div class="modal fade" id="showModal2" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel">Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="width: 100%;" id="modal_body">
                            <div class="modal-body2 py-4">
                                <form action="{{ route('status.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="orders_id" value="{{ $order->id }}" hidden>
                                        <input type="text" name="title" value="{{ old('title') }}" title="title"
                                            placeholder="Enter title" class="form-control input-style small-text-12 py-2" />
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="description" value="{{ old('description') }}"
                                            title="description" placeholder="Enter description"
                                            class="form-control input-style small-text-12 py-2" />
                                    </div>
                                    <div class="view-all-btn">
                                        <button type="submit"
                                            class="small-text-12 collect-btn w-100 result-entry-btn py-2 btn btn-sm btn-info show">
                                            Change
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script>
        $(document).on('click', '.create', function() {
            $('#modal_body').html(data);
        });
    </script>
    <script>
        $(document).on('click', '.status', function() {
            $('#modal_body2').html(data);
        });
    </script>
@endpush
