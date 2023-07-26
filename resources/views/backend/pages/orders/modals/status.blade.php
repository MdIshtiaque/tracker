@foreach ($orders as $order)
    <div class="modal fade" id="methodModal-{{ $order->id }}" tabindex="-1"
         aria-labelledby="methodModalLabel-{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title dashboard-title" id="methodModalLabel-{{ $order->id }}">
                        Change Status
                    </h1>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body py-4">
                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="orders_id" value="{{ $order->id }}" hidden>
                            <input type="text" name="title" value="{{ old('title') }}" required title="title"
                                   placeholder="Enter title" class="form-control input-style small-text-12 py-2" />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="description" value="{{ old('description') }}" required
                                   title="description" placeholder="Enter description"
                                   class="form-control input-style small-text-12 py-2" />
                        </div>
                        <div class="mb-3">
                            <input type="date" name="time" value="{{ old('time') }}" required
                            placeholder="Select  Date"
                            class="form-control input-style small-text-12 py-2" id="on_board_date"/>
                        </div>
                        <div class="view-all-btn">
                            <button type="submit"
                                    class="small-text-12 collect-btn w-100 result-entry-btn py-2 btn btn-sm btn-info show bg-green-600  text-white hover:bg-green-700">
                                Change
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
