@extends('userpages.userlayouts.app')

@section('title')
    Users Dashboard
@endsection

@section('content')
    <div class="main-content">

        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">
                        <h2 class="mb-2 mb-md-4 text-center title">
                            Welcome To {{ $loggerFullName }}
                        </h2>
                    </div>
                </div>
                <div class="row mb-3">



                    <div id="formLabels" class="col-md-12">
                        <div class="labels activated Overview" onclick="activateForm('Overview')">
                            Overview
                        </div>
                        <div class="labels Company" onclick="activateForm('Company')">
                            Company
                        </div>
                        <div class="labels Drivers" onclick="activateForm('Drivers')">
                            Drivers
                        </div>
                        <div class="labels Vehicles" onclick="activateForm('Vehicles')">
                            Vehicles
                        </div>
                        <div class="labels Freight" onclick="activateForm('Freight')">
                            Freight
                        </div>
                        <div class="labels Policy" onclick="activateForm('Policy')">
                            Policy
                        </div>
                    </div>


                    <div class="col-12 col-md-12 mt-3 allAlerts">
                        @if (session()->has('alertMsg'))
                            <div class="alert {{ session()->get('type') }} alert-dismissible text-center fade show"
                                role="alert">
                                {{ session()->get('alertMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>



                    <div id="mainForm" class="col-12">

                        <form action="/users/add-new-insurance" method="post" name="insuranceinfo"
                            onsubmit="return requiredForm(this);" enctype="multipart/form-data">
                            @csrf

                            <div id="errors" class="alert alert-danger text-center d-none" role="alert">
                                This field is required! Enter the exact values here.
                            </div>


                            <div id="Overview" class="dashboardForm">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="pb-2">Welcome!</h5>
                                        <h3 class="font-weight-bold pb-2">
                                            Let's figure out your best <br>
                                            insurance policy by adding <br>
                                            information.
                                        </h3>
                                        <p>Press continue button to start adding drivers you want covered.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <button class="btn btn-primary btn-lg px-5 mt-5"
                                                onclick="activateForm('Company')">
                                                Continue
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </div>




                            <div id="Company" class="dashboardForm d-none">

                                <h3 class="font-weight-light mb-3">General Business Info</h3>


                                <div class="row">
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="YOUR FIRST NAME"
                                            name="usersfname">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="YOUR LAST NAME"
                                            name="userslname">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="BUSINESS NAME"
                                            name="compname">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="MC NUMBER" name="mcnumber">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="YEARS IN BUSINESS"
                                            name="businessyears">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="CITY" name="city">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="ZIP NUMBER"
                                            name="zipnumber">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="PHONE NUMBER"
                                            name="phnNumber"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="text" class="form-control" placeholder="DBA (DOING BUSINESS AS)"
                                            name="dba">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <input type="email" class="form-control" placeholder="EMAIL" name="userEmail">
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <textarea class="form-control" id="addressline" rows="3" name="useraddress" placeholder="COMPANY ADDRESS"></textarea>
                                    </div>
                                    <div class="col-md-6 col-12 form-group">
                                        <textarea class="form-control" id="addressline" rows="3" name="garageaddr" placeholder="GARAGING ADDRESS"></textarea>
                                    </div>

                                </div>


                            </div>




                            <div id="Drivers" class="dashboardForm d-none">
                                <h3 class="font-weight-light mb-3 text-center">Drivers Info</h3>


                                <div id="driversInfo">
                                    <div class="row">
                                        <div class="col-md-6 col-12 form-group">
                                            <input type="text" class="form-control" placeholder="First Name"
                                                name="driverfname">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <input type="text" class="form-control" placeholder="Last Name"
                                                name="driverlname">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Driver License Number" name="licenseNumber">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" class="form-control" placeholder="Date Of Birth"
                                                name="driverbirthdate">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <label for="">Issue Date</label>
                                            <input type="date" class="form-control" placeholder="Issue Date"
                                                name="issueDate">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <label for="">Expiration Date</label>
                                            <input type="date" class="form-control" placeholder="Expiration date"
                                                name="expireDate">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <input type="text" class="form-control" placeholder="Issuing State"
                                                name="issuingstatus">
                                        </div>

                                        <div class="col-md-6 col-12 form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Residence Address"
                                                name="residenceaddr"></textarea>
                                        </div>

                                    </div>
                                </div>


                                <div class="btn btn-primary px-3" onclick="addAnotherDriver(this)">Add Another Driver
                                </div>
                            </div>




                            <div id="Vehicles" class="dashboardForm d-none">
                                <h3 class="font-weight-light mb-3 text-center">Tell Us About Your <span
                                        class="transportname">vehicle</span></h3>
                                <p class="text-mute text-center">Choose the <span class="transportname">vehicle</span> you
                                    mostly use.</p>


                                <div id="allTruckOptions" class="cmn_truck_div all_vehicle">

                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id="Truck Tractor">
                                        <img src="{{ asset('assets/images/trucktor.jpg') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Truck Tractor</p>
                                    </div>
                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Box Truck'>
                                        <img src="{{ asset('assets/images/boxtruck.jpg') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Box Truck</p>
                                    </div>
                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Pickup Truck'>
                                        <img src="{{ asset('assets/images/pickup.webp') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Pickup Truck</p>
                                    </div>
                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Flatbed Truck'>
                                        <img src="{{ asset('assets/images/flatbed.jpg') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Flatbed Truck</p>
                                    </div>
                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Cargo Van'>
                                        <img src="{{ asset('assets/images/cargovan.png') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Cargo Van</p>
                                    </div>

                                    <div class="truckDiv">
                                        <center>
                                            <div class="btn btn-danger px-3" onclick="switchTo('trailer')">
                                                Add a trailer Instead
                                            </div>
                                        </center>
                                    </div>

                                </div>


                                <div id="allTruckOptions" class="cmn_truck_div all_trailer d-none">

                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Dry Freight Trailer'>
                                        <img src="{{ asset('assets/images/dryfreight.png') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Dry Freight Trailer</p>
                                    </div>

                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Flatbed Trailer'>
                                        <img src="{{ asset('assets/images/flatbed.png') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Flatbed Trailer</p>
                                    </div>

                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Utility Trailer'>
                                        <img src="{{ asset('assets/images/utility.jpg') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Utility Trailer</p>
                                    </div>

                                    <div class="truckDiv" onclick="pickTruckName(this)" data-id='Dump Body Trailer'>
                                        <img src="{{ asset('assets/images/dumpbody.jpg') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Dump Body Trailer</p>
                                    </div>

                                    <div class="truckDiv" onclick="pickTruckName(this)"
                                        data-id='Refrigerated Dry Freight'>
                                        <img src="{{ asset('assets/images/refregerated.jpg') }}" alt="Truck"
                                            class="truckImage">
                                        <p class="truckName">Refrigerated Dry Freight</p>
                                    </div>




                                    <div class="truckDiv">
                                        <center>
                                            <div class="btn btn-danger px-3" onclick="switchTo('vehicle')">
                                                Add a vehicle Instead
                                            </div>
                                        </center>
                                    </div>



                                </div>


                                <div id="restVehicleForm" class="p-4 row">

                                    <div class="border col-12 mb-3">

                                        <center>
                                            <img src="" alt="Vehicle Image" class="vehicleUpImage">
                                        </center>

                                        <div class="form-group">
                                            <label for="">Vehicle Image </label>
                                            <input type="file" class="form-control" name="vehicleimage"
                                                onchange="showVehicle(this)" accept="image/*">
                                        </div>

                                    </div>


                                    <div class="border col-md-4 mb-3">
                                        <h3 class="font-weight-bold"><span class="transportname">vehicle</span> Type</h3>
                                        <input type="hidden" name="transportType" class="transportType"
                                            value="vehicle">
                                    </div>
                                    <div class="border col-md-8 mb-3 text-center">
                                        <span class="vehicletype font-weight-bold"></span>
                                        <span class="btn btn-primary px-3 ml-3" onclick="editVehicleType()">
                                            Edit <span class="transportname">vehicle</span> Type
                                        </span>
                                    </div>

                                    <div class="border col-md-12">
                                        <div class="form-group">
                                            <label for=""><span class="transportname">vehicle</span>
                                                Identification
                                                Number (VIN) [Optional*] </label>
                                            <input type="text" class="form-control" name="vin">
                                        </div>
                                        <h4 class="text-center font-weight-bold">OR,</h4>
                                    </div>

                                    <div class="border col-md-4">
                                        <div class="form-group">
                                            <label for="">Year</label>
                                            <select name="year" id="" class="form-control">
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="border col-md-4">
                                        <div class="form-group">
                                            <label for="">Make</label>
                                            <input type="text" class="form-control" name="make">
                                        </div>
                                    </div>

                                    <div class="border col-md-4">
                                        <div class="form-group">
                                            <label for="">Model</label>
                                            <input type="text" class="form-control" name="model">
                                        </div>
                                    </div>

                                    <div class="border col-md-6">
                                        <div class="form-group">
                                            <label for="">Zip Code where <span
                                                    class="transportname">vehicle</span> is
                                                located</label>
                                        </div>
                                    </div>

                                    <div class="border col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="zipcode">
                                        </div>
                                    </div>

                                    <div class="border col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                Farthest one-way distance this <span class="transportname">vehicle</span>
                                                typically travels
                                                (90% or more of the time)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="border col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="farthestdistance">
                                        </div>
                                    </div>

                                    <div class="border col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                What is the gross <span class="transportname">vehicle</span> weight?
                                            </label>
                                            <input type="text" class="form-control" name="grossweight">
                                        </div>
                                    </div>

                                    <div class="border col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                Who is the <span class="transportname">vehicle</span> registered to?
                                            </label>
                                            <input type="text" class="form-control" name="registeredperson">
                                        </div>
                                    </div>

                                    <div class="border col-md-4">
                                        <h5 class="font-weight-bold">
                                            Is there a loan or lease on the <span class="transportname">vehicle</span>?
                                        </h5>
                                    </div>

                                    <div class="border col-md-8 pl-5">
                                        <div class="form-group">
                                            <input type="radio" name="loanorlease" id="lease"
                                                class="form-check-input" value="lease">
                                            <label class="form-check-label" for="lease">Yes, I have a loan</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" name="loanorlease" id="loan"
                                                class="form-check-input" value="loan">
                                            <label class="form-check-label" for="loan">Yes, I have a loan</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" name="loanorlease" id="noleaseloan"
                                                class="form-check-input" value="no">
                                            <label class="form-check-label" for="noleaseloan">No</label>
                                        </div>
                                    </div>
                                </div>


                            </div>




                            <div id="Freight" class="dashboardForm d-none">
                                <div class="form-check labeledFreights">
                                    <input class="form-check-input" type="radio" name="freights" id="Freights1"
                                        value="A" checked>
                                    <label class="form-check-label" for="Freights1">
                                        A - General Merchandise (new and used)
                                    </label>
                                </div>

                                <div class="form-check labeledFreights">
                                    <input class="form-check-input" type="radio" name="freights" id="Freights2"
                                        value="B" checked>
                                    <label class="form-check-label" for="Freights2">
                                        B - Personal effects/household goods (prof.packed), fragile goods
                                        (glass/ceramic/marble/granite/tiles/pottery & other goods deemed to be breakable,
                                        non-perishable food/beverages/commodities)
                                    </label>
                                </div>

                                <div class="form-check labeledFreights">
                                    <input class="form-check-input" type="radio" name="freights" id="Freights3"
                                        value="C" checked>
                                    <label class="form-check-label" for="Freights3">
                                        C - Laptops/cellphones/PDAs/iPads/tablets/ Notebooks & Gaming System
                                    </label>
                                </div>

                                <div class="form-check labeledFreights">
                                    <input class="form-check-input" type="radio" name="freights" id="Freights4"
                                        value="D" checked>
                                    <label class="form-check-label" for="Freights4">
                                        D - Wine & Beer
                                    </label>
                                </div>

                                <div class="form-check labeledFreights">
                                    <input class="form-check-input" type="radio" name="freights" id="Freights5"
                                        value="E" checked>
                                    <label class="form-check-label" for="Freights5">
                                        E - Hazardous, Restricted Or Controlled Items
                                    </label>
                                </div>

                                <div class="form-check labeledFreights">
                                    <input class="form-check-input" type="radio" name="freights" id="Freights6"
                                        value="other" checked>
                                    <label class="form-check-label" for="Freights6">
                                        All Other Commodities - Upon Request
                                    </label>
                                </div>

                                <center>
                                    <button type="submit" class="mt-4 px-5 btn btn-info btn-lg">Complete
                                        Submission</button>
                                </center>

                            </div>



                            <div id="Policy" class="dashboardForm d-none">
                                <h2 class="text-center font-weight-bold text-primary">We will response soon...</h2>
                            </div>


                        </form>

                    </div>




                </div>
            </div>
        </div>


        {{--  --}}
    </div>
    <script>
        $(".dashboard").addClass("active");
    </script>
@endsection
