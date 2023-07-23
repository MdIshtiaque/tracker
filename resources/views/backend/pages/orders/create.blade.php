<div class="modal-body py-4">
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="bl_no" value="{{ old('bl_no') }}" title="BL NO" placeholder="Enter BL no."
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="booking_no" value="{{ old('booking_no') }}" title="Booking No"
                   placeholder="Enter Booking no."
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="starting_point" value="{{ old('starting_point') }}" title="Starting Point"
                   placeholder="Enter Starting Point"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="destination" value="{{ old('destination') }}" title="Destination"
                   placeholder="Enter Destination"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="vessel_voy_no" value="{{ old('vessel_voy_no') }}" title="Vessel Voy No"
                   placeholder="Enter Vessel Voy No."
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="no_of_packages" value="{{ old('no_of_packages') }}" title="No. of Packages"
                   placeholder="Enter No. of Packages"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="date" name="on_board_date" value="{{ old('on_board_date') }}" title="On Board Date"
                   placeholder="Select On Board Date"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="gross_cargo_weight" value="{{ old('gross_cargo_weight') }}"
                   title="Gross Cargo Weight" placeholder="Enter Gross Cargo Weight"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="no_of_containers" value="{{ old('no_of_containers') }}"
                   title="No. of Containers" placeholder="Enter No. of Containers"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="measurement" value="{{ old('measurement') }}"
                   title="Measurement" placeholder="Enter Measurement"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="service_requirement" value="{{ old('service_requirement') }}"
                   title="Service Requirement" placeholder="Enter Service Requirement"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="progress1" value="{{ old('progress1') }}"
                   title="progress 1" placeholder="Enter progress 1 (optional)"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="mb-3">
            <input type="text" name="progress2" value="{{ old('progress2') }}"
                   title="Service Requirement" placeholder="Enter progress 2 (optional)"
                   class="form-control input-style small-text-12 py-2"/>
        </div>
        <div class="view-all-btn">
            <button type="submit"
                    class="small-text-12 collect-btn w-100 result-entry-btn py-2 btn btn-sm btn-info show">
                Save
            </button>
        </div>
    </form>
</div>
