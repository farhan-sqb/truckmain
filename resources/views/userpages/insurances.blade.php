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
                            My Insurances
                        </h2>
                    </div>
                </div>
                <div class="row mb-3">


                    <div class="col-12 bg-light p-5">

                        <div class="row">

                            @forelse ($insurance_data as $key => $item)
                                <div class="col-md-6">
                                    <a class="insurancecard" href="/users/insurance-no-{{ $item->id }}">

                                        <table class="table text-light">
                                            <tr>
                                                <td>Business Name:</td>
                                                <td>{{ $item->company_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Business Zip:</td>
                                                <td>{{ $item->zip_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Business Address:</td>
                                                <td>{{ $item->comp_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Type:</td>
                                                <td>{{ $item->vehicle_type }}</td>
                                            </tr>
                                            <tr>
                                                <td>Zip Code where vehicle is located:</td>
                                                <td>{{ $item->vehicle_zip }}</td>
                                            </tr>
                                            <tr>
                                                <td>Activity Status:</td>
                                                <td>
                                                    @if ($item->status == 'active')
                                                        <button class="btn btn-success valueType uppercased px-4 btn-sm">
                                                            {{ $item->status }}
                                                        </button>
                                                    @endif
                                                    @if ($item->status == 'pending')
                                                        <button class="btn btn-info valueType uppercased px-4 btn-sm">
                                                            {{ $item->status }}</button>
                                                    @endif
                                                    @if ($item->status == 'canceled')
                                                        <button class="btn btn-danger valueType uppercased px-4 btn-sm">
                                                            {{ $item->status }}</button>
                                                    @endif
                                                </td>
                                            </tr>

                                        </table>

                                    </a>
                                </div>

                            @empty
                                <div class="col-md-12">
                                    <h3 class="text-center font-weight-bold text-danger">No Insurance Form Filled Up Yet!
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
