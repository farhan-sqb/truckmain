<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IinsuranceController extends Controller
{






    public function addNewInsurance(Request $request)
    {
        $up_usersfname = $request->usersfname;
        $up_userslname = $request->userslname;
        $up_compname = $request->compname;
        $up_mcnumber = $request->mcnumber;
        $up_businessyears = $request->businessyears;
        $up_city = $request->city;
        $up_zipnumber = $request->zipnumber;
        $up_phnNumber = $request->phnNumber;
        $up_dba = $request->dba;
        $up_userEmail = $request->userEmail;
        $up_useraddress = $request->useraddress;
        $up_garageaddr = $request->garageaddr;

        $up_driverfname = $request->driverfname;
        $up_driverlname = $request->driverlname;
        $up_licenseNumber = $request->licenseNumber;
        $up_driverbirthdate = $request->driverbirthdate;
        $up_issueDate = $request->issueDate;
        $up_expireDate = $request->expireDate;
        $up_issuingstatus = $request->issuingstatus;
        $up_residenceaddr = $request->residenceaddr;

        $up_sec_driverfname = $request->sec_driverfname;
        $up_sec_driverlname = $request->sec_driverlname;
        $up_sec_licenseNumber = $request->sec_licenseNumber;
        $up_sec_driverbirthdate = $request->sec_driverbirthdate;
        $up_sec_issueDate = $request->sec_issueDate;
        $up_sec_expireDate = $request->sec_expireDate;
        $up_sec_issuingstatus = $request->sec_issuingstatus;
        $up_sec_residenceaddr = $request->sec_residenceaddr;

        $up_transportType = $request->transportType;
        $blobimg = file_get_contents($_FILES["vehicleimage"]["tmp_name"]);

        $up_vin = $request->vin;
        $up_year = $request->year;
        $up_make = $request->make;
        $up_model = $request->model;
        $up_zipcode = $request->zipcode;
        $up_farthestdistance = $request->farthestdistance;
        $up_grossweight = $request->grossweight;
        $up_registeredperson = $request->registeredperson;
        $up_loanorlease = $request->loanorlease;

        $up_freights = $request->freights;


        $userId = DB::table('users')->where('email', (Cookie::get('loggerEmail')))->value('id');

        $count = DB::table('user_insurance_data')->where('vehicle_zip', $up_zipcode)->count();


        if ($count > 0) {
            return Redirect::back()->with('alertMsg', 'Zip Code where vehicle is located is already filled up. This vehicle is already filled. Try different one.')->with('type', 'alert-danger');
        } else {


            // if ($file = $request->file('vehicleimage')) {
            //     $image_name = md5(rand(1000, 10000));
            //     $ext = strtolower($file->getClientOriginalExtension());
            //     $image_full_name = $image_name . '.' . $ext;
            //     $upload_path = 'vehicles/'; // localhost
            //     // $upload_path = 'public/vehicles/'; // live server
            //     $image_url = $upload_path . $image_full_name;
            //     $file->move($upload_path, $image_full_name);
            // }

            $insert = DB::table('user_insurance_data')->insert([
                'userid' => $userId,
                'user_email' => (Cookie::get('loggerEmail')),
                'user_fname' => $up_usersfname,
                'user_lname' => $up_userslname,
                'company_name' => $up_compname,
                'city' => $up_city,
                'zip_number' => $up_zipnumber,
                'phone_number' => $up_phnNumber,
                'contact_email' => $up_userEmail,
                'comp_address' => $up_useraddress,
                'driver_fname' => $up_driverfname,
                'driver_lname' => $up_driverlname,
                'driver_license_num' => $up_licenseNumber,
                'driver_birth_date' => $up_driverbirthdate,
                'issue_date' => $up_issueDate,
                'expiration_date' => $up_expireDate,
                'issue_state' => $up_issuingstatus,
                'residence_addr' => $up_residenceaddr,
                'driver_fname_2' => $up_sec_driverfname,
                'driver_lname_2' => $up_sec_driverlname,
                'driver_license_num_2' => $up_sec_licenseNumber,
                'driver_birth_date_2' => $up_sec_driverbirthdate,
                'issue_date_2' => $up_sec_issueDate,
                'expiration_date_2' => $up_sec_expireDate,
                'issue_state_2' => $up_sec_issuingstatus,
                'residence_addr_2' => $up_sec_residenceaddr,
                'vehicle_type' => $up_transportType,


                'vehicle_Image' => $blobimg,


                'vin' => $up_vin,
                'year' => $up_year,
                'make' => $up_make,
                'model' => $up_model,
                'vehicle_zip' => $up_zipcode,
                'distance' => $up_farthestdistance,
                'weight' => $up_grossweight,
                'register_to' => $up_registeredperson,
                'loan_lease' => $up_loanorlease,
                'freight' => $up_freights,

                'mcnumber' => $up_mcnumber,
                'businessinyears' => $up_businessyears,
                'dba' => $up_dba,
                'garaging_addr' => $up_garageaddr,
            ]);

            if ($insert) {
                return Redirect::back()->with('alertMsg', 'Insurance Form Has Been Submitted Successfully!')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('alertMsg', 'Could not submit from. Try later.')->with('type', 'alert-danger');
            }
        }
    }
















    public function myInsurances()
    {
        $insurance_data = DB::table('user_insurance_data')->where('user_email', (Cookie::get('loggerEmail')))->get();
        return view('userpages.insurances', compact('insurance_data'));
    }













    public function particularInsurance($insuranceNo)
    {
        $insuranceData = DB::table('user_insurance_data')->where('id', $insuranceNo)->where('user_email', (Cookie::get('loggerEmail')))->get();
        return view('userpages.particularInsurance', compact('insuranceData'));
    }




    //
}
