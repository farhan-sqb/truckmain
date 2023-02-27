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
    </style>
    <title>Email</title>
</head>

<body>


    <div class="centerdiv">

        <center>
            <h1>Email from contact page - <i>{{ $sitename }} </i> </h1>
        </center>
        <hr>
        <hr>


        <div class="mainemail">
            <h4 class="center">
                You have an email by a visitor of {{ $sitename }} website. The details are below:
            </h4>

            <p class="detailed">
                User Full Name: {{ $username }}
            </p>
            <p class="detailed">
                User Contact Number: {{ $userphone }}
            </p>
            <p class="detailed">
                User Email: {{ $useremail }}
            </p>
            <p class="detailed">
                User Text: <i> {{ $usercomment }} </i>
            </p>

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
