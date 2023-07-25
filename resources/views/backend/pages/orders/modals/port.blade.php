@foreach ($orders as $order)
    <div class="modal fade" id="portModal-{{ $order->id }}" tabindex="-1"
         aria-labelledby="portModalLabel-{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title dashboard-title" id="portModalLabel-{{ $order->id }}">
                        Change Status
                    </h1>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body py-4">
                    <form action="{{ route('set.port') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="orders_id" value="{{ $order->id }}" hidden>
                            <select name="current_port" class="form-control input-style small-text-12 py-2">
                                <option value="" selected disabled>Select a title</option>
                                <option value="{{ $order->starting_point }}" >{{ $order->starting_point }}</option>
                                <option value="{{ $order->progress1 }}">{{ $order->progress1 }}</option>
                                <option value="{{ $order->progress2 }}">{{ $order->progress2 }}</option>
                                <option value="{{ $order->destination }}">{{ $order->destination }}</option>
                                <!-- Add more options as needed -->
                            </select>
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
