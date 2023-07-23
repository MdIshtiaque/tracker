<div class="modal-body2 py-4">
    <form action="{{ route('status.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" value="{{ $orders->id }}" hidden>
            <input type="text" name="title" value="{{ old('title') }}" title="title"
                   placeholder="Enter title"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="description" value="{{ old('description') }}"
                   title="description" placeholder="Enter description"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="date" name="time" value="{{ now() }}" title="time"
                   placeholder="Select time" hidden
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="view-all-btn">
            <button type="submit"
                    class="small-text-12 collect-btn w-100 result-entry-btn py-2 btn btn-sm btn-info show">
                Change
            </button>
        </div>
    </form>
</div>
