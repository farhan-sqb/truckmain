<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .center {
            text-align: center;
            color: tomato;
        }

        .mainemail {
            border: 2px solid black;
            background: rgb(22, 22, 22);
            color: #ffffff;
        }

        .detailed {
            padding: 15px;
            border-bottom: 2px solid rgb(224, 224, 224);
        }

        .siteimg {
            width: 100%;
            height: auto;
            padding: 25px;
        }
    </style>
    <title>Email</title>
</head>

<body>


    <div class="centerdiv">

        <center>

            <img src="{{ $adminLink }}{{ $sitelogo }}" alt="" class="siteimg">

            <h1>Hello {{ $username }}, you have an email from - <i>{{ $sitename }} </i> </h1>
        </center>
        <hr>
        <hr>


        <div class="mainemail">
            <h4 class="center">
                Welcome to our website! For signing up proceed with this ONE TIME PASSWORD below. <br>
                Here's the OTP: <i>{{ $userotp }}</i> <br>
                Login Now!
            </h4>
        </div>


        <h3>
            Best Regards,
            <br>
            <b>
                {{ $sitename }}
            </b>
        </h3>

    </div>

</body>

</html>
