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
                            Particular Insurance Data
                        </h2>
                    </div>
                </div>
                <div class="row mb-3">


                    <div class="col-12 bg-light p-5">

                        <div class="row">

                            @forelse ($insuranceData as $key => $item)
                                <div class="col-md-12">
                                    <div class="insurancecard px-5">


                                        <div class="companyaddr linehr">
                                            <h3 class="text-center text-light mt-3">Business General Info</h3>

                                            <div class="details">
                                                <span class="keytype">Business Name:</span>
                                                <span class="valueType">{{ $item->company_name }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Business City:</span>
                                                <span class="valueType">{{ $item->city }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Years In Business:</span>
                                                <span class="valueType">{{ $item->businessinyears }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">MC Number:</span>
                                                <span class="valueType">{{ $item->mcnumber }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Business Zip:</span>
                                                <span class="valueType">{{ $item->zip_number }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Business Phone Number:</span>
                                                <span class="valueType">{{ $item->phone_number }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Business Email:</span>
                                                <span class="valueType">{{ $item->contact_email }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Do Business As:</span>
                                                <span class="valueType">{{ $item->dba }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Business Address:</span>
                                                <span class="valueType">{{ $item->comp_address }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Garaging Address:</span>
                                                <span class="valueType">{{ $item->garaging_addr }}</span>
                                            </div>
                                        </div>





                                        <div class="drivers linehr">
                                            <h3 class="text-center text-light mt-3">First Drivers Info</h3>

                                            <div class="details">
                                                <span class="keytype">First Name:</span>
                                                <span class="valueType">{{ $item->driver_fname }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Last Name:</span>
                                                <span class="valueType">{{ $item->driver_lname }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Driver License Number:</span>
                                                <span class="valueType">{{ $item->driver_license_num }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Date Of Birth:</span>
                                                <span class="valueType">{{ $item->driver_birth_date }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Issue Date:</span>
                                                <span class="valueType">{{ $item->issue_date }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Expiration Date:</span>
                                                <span class="valueType">{{ $item->expiration_date }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Issuing State:</span>
                                                <span class="valueType">{{ $item->issue_state }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Residence Address:</span>
                                                <span class="valueType">{{ $item->residence_addr }}</span>
                                            </div>
                                        </div>




                                        @if ($item->driver_fname_2)
                                            <div class="drivers linehr">
                                                <h3 class="text-center text-light mt-3">Second Drivers Info</h3>

                                                <div class="details">
                                                    <span class="keytype">First Name:</span>
                                                    <span class="valueType">{{ $item->driver_fname_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Last Name:</span>
                                                    <span class="valueType">{{ $item->driver_lname_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Driver License Number:</span>
                                                    <span class="valueType">{{ $item->driver_license_num_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Date Of Birth:</span>
                                                    <span class="valueType">{{ $item->driver_birth_date_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Issue Date:</span>
                                                    <span class="valueType">{{ $item->issue_date_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Expiration Date:</span>
                                                    <span class="valueType">{{ $item->expiration_date_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Issuing State:</span>
                                                    <span class="valueType">{{ $item->issue_state_2 }}</span>
                                                </div>
                                                <div class="details">
                                                    <span class="keytype">Residence Address:</span>
                                                    <span class="valueType">{{ $item->residence_addr_2 }}</span>
                                                </div>
                                            </div>
                                        @else
                                        @endif






                                        <div class="vehicles linehr">

                                            <h3 class="text-center text-light mt-3">Vehicle/Trailer Information</h3>

                                            <div class="details">
                                                <center>
                                                    <img src="{{ $websiteurl }}/{{ $item->vehicle_Image }}"
                                                        alt="" class="vehicleUpImage">
                                                </center>
                                            </div>

                                            <div class="details">
                                                <span class="keytype">vehicle Type:</span>
                                                <span class="valueType">{{ $item->vehicle_type }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">VIN:</span>
                                                <span class="valueType">{{ $item->vin }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Year:</span>
                                                <span class="valueType">{{ $item->year }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Make:</span>
                                                <span class="valueType">{{ $item->make }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Model:</span>
                                                <span class="valueType">{{ $item->model }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Zip Code where vehicle is located:</span>
                                                <span class="valueType">{{ $item->vehicle_zip }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Farthest one-way distance this vehicle typically
                                                    travels
                                                    (90% or more of the time)
                                                    :</span>
                                                <span class="valueType">{{ $item->distance }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">What is the gross vehicle weight? </span>
                                                <span class="valueType">{{ $item->weight }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Who is the vehicle registered to? </span>
                                                <span class="valueType">{{ $item->register_to }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Is there a loan or lease on the vehicle? </span>
                                                <span class="valueType">{{ $item->loan_lease }}</span>
                                            </div>
                                        </div>


                                        <div class="details linehr">
                                            <span class="keytype">Freight</span>
                                            <span class="valueType">{{ $item->freight }}</span>
                                        </div>




                                        <div class="laststep linehr">
                                            <h3 class="text-center text-light mt-3">Policy Information</h3>
                                            <div class="details">
                                                <span class="keytype">Policy Number</span>
                                                <span class="valueType">{{ $item->policy_num }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Insurance Company</span>
                                                <span class="valueType">{{ $item->insurance_company }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Effective Date </span>
                                                <span class="valueType">{{ $item->effective_date }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Expiration Date </span>
                                                <span class="valueType">{{ $item->policy_expiration_date }}</span>
                                            </div>
                                            <div class="details">
                                                <span class="keytype">Policy Status</span>
                                                <button class="btn btn-danger px-5 valueType">{{ $item->status }}</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            @empty
                                <div class="col-md-12">
                                    <h3 class="text-center font-weight-bold text-danger">No Insurance Form Filled Up
                                        Yet!
                                    </h3>
                                </div>
                            @endforelse

                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{--  --}}
    </div>
    <script>
        $(".insurances").addClass("active");
    </script>
@endsection
