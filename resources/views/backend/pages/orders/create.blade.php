<div class="modal-body py-4">
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4 mb-3">
                <label for="bl_no" class="form-label">BL NO</label>
                <input type="text" name="bl_no" value="{{ old('bl_no') }}" required placeholder="Enter BL no."
                       class="form-control input-style small-text-12 py-2" id="bl_no"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="booking_no" class="form-label">Booking No</label>
                <input type="text" name="booking_no" value="{{ old('booking_no') }}" required placeholder="Enter Booking no."
                       class="form-control input-style small-text-12 py-2" id="booking_no"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="starting_point" class="form-label">Starting Point</label>
                <input type="text" name="starting_point" value="{{ old('starting_point') }}" required
                       placeholder="Enter Starting Point"
                       class="form-control input-style small-text-12 py-2" id="starting_point"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" name="destination" value="{{ old('destination') }}" required placeholder="Enter Destination"
                       class="form-control input-style small-text-12 py-2" id="destination"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="vessel_voy_no" class="form-label">Vessel Voy No</label>
                <input type="text" name="vessel_voy_no" value="{{ old('vessel_voy_no') }}" required
                       placeholder="Enter Vessel Voy No."
                       class="form-control input-style small-text-12 py-2" id="vessel_voy_no"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="no_of_packages" class="form-label">No. of Packages</label>
                <input type="text" name="no_of_packages" value="{{ old('no_of_packages') }}" required
                       placeholder="Enter No. of Packages"
                       class="form-control input-style small-text-12 py-2" id="no_of_packages"/>
            </div>

            <div class="col-md-4 mb-3">
                <label for="on_board_date" class="form-label">On Board Date</label>
                <input type="date" name="on_board_date" value="{{ old('on_board_date') }}" required
                       placeholder="Select On Board Date"
                       class="form-control input-style small-text-12 py-2" id="on_board_date"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="gross_cargo_weight" class="form-label">Gross Cargo Weight</label>
                <input type="text" name="gross_cargo_weight" value="{{ old('gross_cargo_weight') }}" required
                       placeholder="Enter Gross Cargo Weight"
                       class="form-control input-style small-text-12 py-2" id="gross_cargo_weight"/>
            </div>

            <div class="col-md-4 mb-3">
                <label for="no_of_containers" class="form-label">No. of Containers</label>
                <input type="text" name="no_of_containers" value="{{ old('no_of_containers') }}" required
                       placeholder="Enter No. of Containers"
                       class="form-control input-style small-text-12 py-2" id="no_of_containers"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="measurement" class="form-label">Measurement</label>
                <input type="text" name="measurement" value="{{ old('measurement') }}" required placeholder="Enter Measurement"
                       class="form-control input-style small-text-12 py-2" id="measurement"/>
            </div>


            <div class="col-md-4 mb-3">
                <label for="service_requirement" class="form-label">Service Requirement</label>
                <input type="text" name="service_requirement" value="{{ old('service_requirement') }}" required
                       placeholder="Enter Service Requirement"
                       class="form-control input-style small-text-12 py-2" id="service_requirement"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="progress1" class="form-label">Progress 1 (Optional)</label>
                <input type="text" name="progress1" value="{{ old('progress1') }}" required
                       placeholder="Enter progress 1 (optional)"
                       class="form-control input-style small-text-12 py-2" id="progress1"/>
            </div>


            <div class="col-md-4 mb-3">
                <label for="progress2" class="form-label">Progress 2 (Optional)</label>
                <input type="text" name="progress2" value="{{ old('progress2') }}" required
                       placeholder="Enter progress 2 (optional)"
                       class="form-control input-style small-text-12 py-2" id="progress2"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="Container No" class="form-label">Container No</label>
                <input type="text" name="container_no" value="{{ old('container_no') }}" required
                       placeholder="Enter progress Container No"
                       class="form-control input-style small-text-12 py-2" id="progress1"/>
            </div>


            <div class="col-md-4 mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" name="size" value="{{ old('size') }}" required
                       placeholder="Enter Size"
                       class="form-control input-style small-text-12 py-2" id="size"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" value="{{ old('type') }}" required
                       placeholder="Enter Type"
                       class="form-control input-style small-text-12 py-2" id="type"/>
            </div>


            <div class="col-md-4 mb-3">
                <label for="seal_no" class="form-label">Seal No</label>
                <input type="text" name="seal_no" value="{{ old('seal_no') }}" required
                       placeholder="Enter Seal No"
                       class="form-control input-style small-text-12 py-2" id="seal_no"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="moveType" class="form-label">Move Type</label>
                <input type="text" name="moveType" value="{{ old('moveType') }}" required
                       placeholder="Enter Move Type"
                       class="form-control input-style small-text-12 py-2" id="moveType"/>
            </div>


            <div class="col-md-4 mb-3">
                <label for="latest_event" class="form-label">Latest Event</label>
                <input type="text" name="latest_event" value="{{ old('latest_event') }}" required
                       placeholder="Enter Latest Event"
                       class="form-control input-style small-text-12 py-2" id="latest_event"/>
            </div>
            <div class="col-md-4 mb-3">
                <label for="place" class="form-label">Place</label>
                <input type="text" name="place" value="{{ old('place') }}" required
                       placeholder="Enter Place"
                       class="form-control input-style small-text-12 py-2" id="place"/>
            </div>


            <div class="col-md-4 mb-3">
                <label for="vgm" class="form-label">VGM</label>
                <input type="text" name="vgm" value="{{ old('vgm') }}" required
                       placeholder="Enter VGM"
                       class="form-control input-style small-text-12 py-2" id="vgm"/>
            </div>

        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="fd-flex align-items-center mb-4">
{{--                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">--}}
{{--                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 ">You are agreed to our terms and conditions</label>--}}
            </div>

            <button type="submit" class="bg-green-600  px-4 text-white hover:bg-green-700 rounded-lg py-2 float-right">Save</button>

        </div>
    </form>
</div>

{{--<div class="modal-body py-4">--}}
{{--    <form action="{{ route('orders.store') }}" required method="POST">--}}
{{--        @csrf--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="bl_no" value="{{ old('bl_no') }}" required title="BL NO" placeholder="Enter BL no."--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="booking_no" value="{{ old('booking_no') }}" title="Booking No"--}}
{{--                   placeholder="Enter Booking no."--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="starting_point" value="{{ old('starting_point') }}" title="Starting Point"--}}
{{--                   placeholder="Enter Starting Point"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="destination" value="{{ old('destination') }}" title="Destination"--}}
{{--                   placeholder="Enter Destination"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="vessel_voy_no" value="{{ old('vessel_voy_no') }}" title="Vessel Voy No"--}}
{{--                   placeholder="Enter Vessel Voy No."--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="no_of_packages" value="{{ old('no_of_packages') }}" title="No. of Packages"--}}
{{--                   placeholder="Enter No. of Packages"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="date" name="on_board_date" value="{{ old('on_board_date') }}" title="On Board Date"--}}
{{--                   placeholder="Select On Board Date"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="gross_cargo_weight" value="{{ old('gross_cargo_weight') }}"--}}
{{--                   title="Gross Cargo Weight" placeholder="Enter Gross Cargo Weight"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="no_of_containers" value="{{ old('no_of_containers') }}"--}}
{{--                   title="No. of Containers" placeholder="Enter No. of Containers"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="measurement" value="{{ old('measurement') }}"--}}
{{--                   title="Measurement" placeholder="Enter Measurement"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="service_requirement" value="{{ old('service_requirement') }}"--}}
{{--                   title="Service Requirement" placeholder="Enter Service Requirement"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="progress1" value="{{ old('progress1') }}"--}}
{{--                   title="progress 1" placeholder="Enter progress 1 (optional)"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <input type="text" name="progress2" value="{{ old('progress2') }}"--}}
{{--                   title="Service Requirement" placeholder="Enter progress 2 (optional)"--}}
{{--                   class="form-control input-style small-text-12 py-2"/>--}}
{{--        </div>--}}
{{--        <div class="view-all-btn clearfix">--}}

{{--            <button type="submit"--}}
{{--                    class="small-text-12 collect-btn w-100 result-entry-btn float-right py-2 btn btn-sm btn-info show">--}}
{{--                Save--}}
{{--            </button>--}}
{{--        </div>--}}
{{--<div class="d-flex justify-content-between align-items-center">--}}
{{--<div class="fd-flex align-items-center mb-4">--}}
{{--    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">--}}
{{--    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 ">You are agreed to our terms and conditions</label>--}}
{{--</div>--}}

{{--    <button type="button" class="bg-green-600  px-4 text-white hover:bg-green-700 rounded-lg py-2 float-right">Save</button>--}}

{{--</div>--}}
{{--    </form>--}}
{{--</div>--}}


