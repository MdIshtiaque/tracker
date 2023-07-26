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
                            <button class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white
                                                             bg-cyan-700 rounded-lg border border-cyan-700 hover:bg-cyan-800 focus:ring-4
                                                              focus:outline-none focus:ring-cyan-300" data-toggle="modal" data-target="#showModal">
                                <i class="fa fa-plus" style="padding: 2px 5px"></i>
                                Create New Order
                            </button>
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
                                    <th class="text-center">Current Port</th>
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
                                        <td>
                                            @if (empty($order->status->first()->title))
                                                <button type="button" class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white
                                                             bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4
                                                              focus:outline-none focus:ring-red-300" disabled>No Status</button>
                                            @else
                                                <button type="button" class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white
                                                             bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4
                                                              focus:outline-none focus:ring-green-300" disabled>{{ $order->status->first()->title }}</button>

                                            @endif
                                        </td>
                                        <td>
                                            @if (empty($order->currentPort->current_port))
                                                <button type="button" class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white
                                                             bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4
                                                              focus:outline-none focus:ring-red-300" disabled>Please Set a Port</button>
                                            @else
                                                <button type="button" class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white
                                                             bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4
                                                              focus:outline-none focus:ring-green-300" disabled>{{ $order->currentPort->current_port }}</button>

                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#methodModal-{{ $order->id }}"
                                                        class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white
                                                             bg-cyan-700 rounded-lg border border-cyan-700 hover:bg-cyan-800 focus:ring-4
                                                              focus:outline-none focus:ring-cyan-300 "
                                                        style="padding: 2px 8px">
                                                    <i class="bi bi-pencil-square"></i>
                                                    Change Status
                                                </button>
                                                <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#portModal-{{ $order->id }}"
                                                        class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white
                                                             bg-cyan-700 rounded-lg border border-cyan-700 hover:bg-cyan-800 focus:ring-4
                                                              focus:outline-none focus:ring-cyan-300 "
                                                        style="padding: 2px 8px">
                                                    <i class="bi bi-pencil-square"></i>
                                                    Set Port
                                                </button>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            title="Delete"
                                                            class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white
                                                             bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4
                                                              focus:outline-none focus:ring-red-300">
                                                        <i class="fa fa-trash" style="padding: 2px 5px"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->

                        </div>
                    </div>
                            @if ($orders->hasPages())
                                <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                                    {{ $orders->links() }}
                                </div>
                            @endif
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->

    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
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
    @include('backend.pages.orders.modals.status')
    @include('backend.pages.orders.modals.port')
@endsection
@push('js')
    <script>
        $(document).on('click', '.create', function () {
            $('#modal_body').html(data);
        });
    </script>
    <script>
        $(document).on('click', '.status', function () {
            $('#modal_body2').html(data);
        });
    </script>
@endpush
