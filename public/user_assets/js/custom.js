function previewImage() {
    websiteImage.src = URL.createObjectURL(event.target.files[0]);
}



function editContibuter(passedId) {

    $.ajax({
        url: "/show-details-of-user-" + passedId,
        success: function (result) {
            $("#waitingModal").html(result);
            $(".modal").modal('show');
        }
    });

}





function doAction(rowVal) {
    let actionDataId = (rowVal.getAttribute('data-id'));
    let actionValue = (rowVal.value);

    $.ajax({
        url: "/change-creator/" + actionValue + '/' + actionDataId,
        success: function (result) {
            location.reload();
        }
    });

}





function askToDelete(passedVal) {
    $(".modal").modal('show');
    $("#deletingId").val(passedVal);
}

function deletePermantly() {
    let deletingVal = ($("#deletingId").val());
    $(".modal").modal('hide');

    $.ajax({
        url: "/delete-news-no/" + deletingVal,
        success: function (result) {
            window.location.href = "/admin/all-contents-news";
        }
    });
}






function deleteRss(passedVal) {
    $(".modal").modal('show');
    $("#deletingId").val(passedVal);
}

function deleteConfirm() {
    let deletingVal = ($("#deletingId").val());
    $(".modal").modal('hide');

    $.ajax({
        url: "/deleterss/" + deletingVal,
        success: function (result) {
            if (result == 'deleted') {
                window.location.href = "/admin/create-publishers";
            }
            else {
                alert("Could not delete! Try again later");
            }
        }
    });
}









function editItem(passedVal) {

    $.ajax({
        url: "/getrsseditpopupval/" + passedVal,
        success: function (result) {
            $("#grabbedForm").html(result);
            $("#rssFeedEdit").modal("show");
        }
    });

}





function deleteCatagory(passedVal) {
    $(".modal").modal('show');
    $("#deletingId").val(passedVal);
}


function deleteFinallyCatagory() {
    let deletingVal = ($("#deletingId").val());
    $(".modal").modal('hide');

    $.ajax({
        url: "/deletecatagory/" + deletingVal,
        success: function (result) {
            window.location.href = "/admin/catagories";
        }
    });
}





















function provideMailPass() {
    let tokenVal = $("#csrfToken").val();
    let adminmail = $("#adminmail").val();
    let adminpass = $("#adminpass").val();
    $("#loader").removeClass("d-none");
    $("#alertScs").addClass("d-none");



    $.post('/check-admin-old-mail-pass',
        {
            _token: tokenVal,
            oldmail: adminmail,
            oldPwd: adminpass,
        }).done(function (response) {
            $("#loader").addClass("d-none");

            if (response == 'mailunmatch') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Mail Not Matched!");
            } else if (response == 'passunmatch') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Passwords Not Matched!");
            } else if (response == 'tryagain') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Could not send mail. Try again!");
            } else {
                $("#alertdngr").addClass("d-none");
                $(".commonPart").addClass("d-none");
                $("#submitOtp").removeClass("d-none");
            }
        });

}











function checkMailChangeOTP() {
    let tokenVal = $("#csrfToken").val();
    let askingOtp = $("#otp").val();
    $("#loader").removeClass("d-none");
    $("#alertdngr").addClass("d-none");
    $("#alertScs").addClass("d-none");


    // same url as forget passwords otp checking url ----- 
    $.post('/check-admin-otp',
        {
            _token: tokenVal,
            askingOtp: askingOtp,
        }).done(function (response) {
            $("#loader").addClass('d-none');
            if (response == 'proceed') {
                $(".commonPart").addClass('d-none');
                $("#newEmail").removeClass('d-none');
            }
            else if (response == 'expires') {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("OTP time expired! Try again!...");
                $(".commonPart").addClass('d-none');
                $("#mailPart").removeClass('d-none');
            }
            else {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("OTP did not match!...");
            }
        });
}











function changeNewMail() {
    let newmail = $("#newmail").val();
    let tokenVal = $("#csrfToken").val();
    $("#loader").removeClass("d-none");



    $.post('/set-new-admin-mail',
        {
            _token: tokenVal,
            setnewmail: newmail,
        }).done(function (response) {
            $("#loader").addClass("d-none");
            if (response == 'success') {
                $("#alertScs").removeClass("d-none");
                $(".successMsg").html("Mail Changed Successfully!");
                setInterval(() => {
                    window.location.href = '/admin/change-admin-email';
                }, 1000);
            } else {
                $("#alertdngr").removeClass("d-none");
                $(".alertTxt").html("Could not update mail. Try again!");
                $(".commonPart").addClass("d-none");
                $("#mailPart").removeClass("d-none");
            }
        });
}









// setting up tinymce fulldescription 
tinymce.init({
    selector: 'textarea.pageTinymce',
    plugins: 'advlist autolink lists link image charmap preview anchor pagebreak lists',
    toolbar_mode: 'floating',
    toolbar: 'numlist bullist'
});








function modifyBlog(passedVal) {

    $("#blogsIdNum").val(passedVal);

    $.ajax({
        url: "/check-blog-data-" + passedVal,
        success: function (result) {
            $('#edit_selected_author option[value="' + result[0].author + '"]').attr("selected", "selected");
            $(".blogImage").attr("src", result[0].thumbnail);
            $('input[name="edit_blogTitle"]').val(result[0].blogtitle);
            $("#pageContent2").text(result[0].content);
            tinyMCE.get('pageContent2').setContent(result[0].content);
            console.log(result[0].content);
            $("#blogdatapopup").modal('show');
        }
    });


}






// show image on change 
function AddNewImage(passedVal) {
    const file = passedVal.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (event) {
            $(".addBlogImage").attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }
}






function showImage(passedVal) {

    const file = passedVal.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (event) {
            $(".blogImage")
                .attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }

}








function showVehicle(passedVal) {

    const file = passedVal.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (event) {
            $(".vehicleUpImage")
                .attr("src", event.target.result);
        };
        reader.readAsDataURL(file);
    }

}







// show page data
function pullPageData(passedVal) {
    var selectedVal = $(passedVal).val();

    $.ajax({
        url: "/get-page-data-" + selectedVal,
        success: function (result) {
            $("#pickedPageContent").text(result[0].pagecontent);
            tinyMCE.get('pickedPageContent').setContent(result[0].pagecontent);
        }
    });
}








function activateForm(passedId) {
    $(".labels").removeClass("activated");
    $("." + passedId).addClass("activated");

    $(".dashboardForm").addClass("d-none");
    $("#" + passedId).removeClass("d-none");
}







function autoFillAction(passedThis) {
    if ($(passedThis).is(':checked')) {
        $("#garaging_mailaddr").val(($("#mailaddr").val()).trim());
        $("#garaging_city").val(($("#city").val()).trim());
        $("#garaging_state").val(($("#state").val()).trim());
        $("#garaging_zipcode").val(($("#zipcode").val()).trim());
        $("#garaging_country").val(($("#country").val()).trim());
    } else {
        alert("Unchecked");
    }
}







function pickTruckName(passed) {
    $(".truckDiv").removeClass("outlined");
    $(passed).addClass("outlined");

    let passedName = $(passed).data("id");
    $(".vehicletype").html(passedName);
}



function switchTo(passedValue) {
    $(".transportType").val(passedValue);
    $(".transportname").html(passedValue);
    $(".cmn_truck_div").addClass("d-none");
    $(".all_" + passedValue).removeClass("d-none");
}





function addAnotherDriver(me) {
    var information = '<div id="newDriver">' +
        '<h4 class="font-weight-bold text-dark mb-3 text-center">New Drivers Info</h4>' +
        '<div class="row">' +
        '<div class="col-md-6 col-12 form-group">' +
        '<input type="text" class="form-control" placeholder="First Name"' +
        'name="sec_driverfname" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        '<input type="text" class="form-control" placeholder="Last Name"' +
        'name="sec_driverlname" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        '<input type="text" class="form-control"' +
        'placeholder="Driver License Number" name="sec_licenseNumber" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        ' <label for="">Date Of Birth</label>' +
        '<input type="date" class="form-control" placeholder="Date Of Birth"' +
        'name="sec_driverbirthdate" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        ' <label for="">Issue Date</label>' +
        '<input type="date" class="form-control" placeholder="Issue Date"' +
        'name="sec_issueDate" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        ' <label for="">Expiration Date</label>' +
        '<input type="date" class="form-control" placeholder="Expiration date"' +
        'name="sec_expireDate" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        '<input type="text" class="form-control" placeholder="Issuing State"' +
        'name="sec_issuingstatus" required>' +
        '</div>' +
        '<div class="col-md-6 col-12 form-group">' +
        '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Residence Address"' +
        'name="sec_residenceaddr" required></textarea>' +
        '</div>' +
        '</div>' +
        '<div class="btn btn-danger px-3" onclick="removeDriver(this)">Remove</div>' +
        '</div>';
    $("#driversInfo").append(information);
    $(me).remove();
}


function removeDriver() {
    $("#newDriver").remove();
    $("#Drivers").append('<div class="btn btn-primary px-3" onclick="addAnotherDriver(this)">Add Another Driver</div>');
}























function requiredForm(form) {
    $(".dashboardForm").addClass("d-none");
    $(".labels").removeClass("activated");

    if (form.usersfname.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.usersfname.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.userslname.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.userslname.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.compname.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.compname.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.mcnumber.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.mcnumber.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.businessyears.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.businessyears.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.city.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.city.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.zipnumber.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.zipnumber.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.phnNumber.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.phnNumber.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.dba.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.dba.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.userEmail.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.userEmail.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.useraddress.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.useraddress.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.garageaddr.value.length < 1) {
        $("#Company").removeClass("d-none");
        $(".Company").addClass("activated");
        form.garageaddr.focus();
        $("#errors").removeClass("d-none");
        return false;
    }






    // first driver 
    if (form.driverfname.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.driverfname.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.driverlname.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.driverlname.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.licenseNumber.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.licenseNumber.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.driverbirthdate.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.driverbirthdate.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.issueDate.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.issueDate.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.expireDate.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.expireDate.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.issuingstatus.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.issuingstatus.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.residenceaddr.value.length < 1) {
        $("#Drivers").removeClass("d-none");
        $(".Drivers").addClass("activated");
        form.residenceaddr.focus();
        $("#errors").removeClass("d-none");
        return false;
    }




    // second driver 
    if ($('#mainForm').find("input[name='sec_driverfname']").length > 0) {
        console.log("It Has");

        if (form.sec_driverfname.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_driverfname.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_driverlname.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_driverlname.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_licenseNumber.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_licenseNumber.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_driverbirthdate.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_driverbirthdate.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_issueDate.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_issueDate.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_expireDate.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_expireDate.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_issuingstatus.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_issuingstatus.focus();
            $("#errors").removeClass("d-none");
            return false;
        }

        if (form.sec_residenceaddr.value.length < 1) {
            $("#Drivers").removeClass("d-none");
            $(".Drivers").addClass("activated");
            form.sec_residenceaddr.focus();
            $("#errors").removeClass("d-none");
            return false;
        }
    }







    // Vehicles 
    if (form.vehicleimage.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.vehicleimage.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.transportType.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.transportType.focus();
        $("#errors").removeClass("d-none");
        return false;
    }



    if (form.vin.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.vin.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.year.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.year.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.make.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.make.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.model.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.model.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.zipcode.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.zipcode.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.farthestdistance.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.farthestdistance.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.grossweight.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.grossweight.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.registeredperson.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.registeredperson.focus();
        $("#errors").removeClass("d-none");
        return false;
    }

    if (form.loanorlease.value.length < 1) {
        $("#Vehicles").removeClass("d-none");
        $(".Vehicles").addClass("activated");
        form.loanorlease.focus();
        $("#errors").removeClass("d-none");
        return false;
    }






    // freight 
    if (form.freights.value.length < 1) {
        $("#Freight").removeClass("d-none");
        $(".Freight").addClass("activated");
        form.freights.focus();
        $("#errors").removeClass("d-none");
        return false;
    }




    return true;
}





