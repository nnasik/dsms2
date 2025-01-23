<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Personal File - {{$frontpage->id}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            border: solid 3px #000;
        }

        .logo {
            width: 70px;
            display: block;
            margin: 10px auto;
        }

    </style>
</head>

<body>

    <div class="row m-0 p-0 ">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: right;width: fit-content;block-size: fit-content;">
                <strong class="border border-dark p-2">File No : {{$frontpage->file_no}}</strong>
            </div>

        </div>
    </div>

    <div class="row m-0 p-0">
        <div class="" style="text-align: center;width: 100%; margin:0;padding:0">
            <img class="logo"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Emblem_of_Sri_Lanka.svg/800px-Emblem_of_Sri_Lanka.svg.png"
                alt="" srcset="">
            <br>
            <br>
            <h2 style="font-size:25pt;">DIVISIONAL SECRETARIAT</h2>
            <h2 style="font-size:17pt;">KORALAIPATTU WEST - ODDAMAVADI</h2>
        </div>
    </div>
    <br>
    <div class="row m-0 p-0">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: center;">
                <span class="border border-dark rounded p-2" style="font-size:20pt">{{$frontpage->branch}}</span>
            </div>

        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="m-0 p-0">
            <div class="m-2 rounded" style="text-align: center;">
                <h1 class="" style="font-size:30pt">{{$frontpage->heading}}</h1>
            </div>

        </div>
    </div>
    <div class="row m-0 p-0" style="text-align: center;">
        <div class="">
            <img src="https://t3.ftcdn.net/jpg/05/08/88/82/360_F_508888212_50sPZWAnDEe0IdZGwd5fb1CUDEFPNJgy.jpg" alt=""
                srcset="" height="100">
            <table class="content-justify"
                style="margin: 0 auto;font-family: 'Times New Roman', Times, serif;font-size: 16pt;">
                <tr>
                    <td><strong>Name of the Officer</strong></td>
                    <td>: {{$frontpage->name_of_the_officer}}</td>
                </tr>
                <tr>
                    <td><strong>Designation</strong></td>
                    <td>: {{$frontpage->designation}}</td>
                </tr>
                <tr>
                    <td><strong>Date of Birth</strong></td>
                    <td>: {{$frontpage->dob}}</td>
                </tr>
                <tr>
                    <td><strong>NIC No.</strong></td>
                    <td>: {{$frontpage->nic}}</td>
                </tr>
                <tr>
                    <td><strong>Date of Appointment</strong></td>
                    <td>: {{$frontpage->date_of_appointment}}</td>
                </tr>
                <tr>
                    <td><strong>Appoinment Letter No           </strong></td>
                    <td>: {{$frontpage->appoint_letter_no}}</td>
                </tr>
                <tr>
                    <td><strong>W&OP No.</strong></td>
                    <td>: {{$frontpage->wnop_no}}</td>
                </tr>
                <tr>
                    <td><strong>Date of Increment</strong></td>
                    <td>: {{$frontpage->date_of_increment}}</td>
                </tr>
                <tr>
                    <td><strong>Date of Retirement</strong></td>
                    <td>: {{$frontpage->date_of_retirement}}</td>
                </tr>
                <tr>
                    <td><strong>Private Address</strong></td>
                    <td>:@php
                        echo " ".nl2br($frontpage->private_address);
                        @endphp </td>
                </tr>
            </table>
        </div>

    </div>
    <div class="m-0 p-0" style="position: absolute; bottom: 0; left:10px;">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: left;">
                <p style="font-size: 13pt;">
                    <img height="20"
                        src="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_local_phone_48px-64.png"
                        alt="Phone"> : 065 2257 716
                    <br>
                    <img height="20" src="https://cdn0.iconfinder.com/data/icons/picons-social/57/67-gmail-64.png"
                        alt="Email"> : moha.divi.koralaipattuwest@gmail.com
                    <br>
                    <img height="20" src="https://cdn1.iconfinder.com/data/icons/material-core/20/language-64.png"
                        alt="Web">
                    : koralaipattuwest.ds.gov.lk

                </p>
            </div>
        </div>
    </div>
    <div class="m-0 p-0" style="position: absolute; bottom: 0px; right:0px;z-index: 0;">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: right;">
                <img style="height: 180px;" src="https://www.5stoday.com/content/images/custom/5S-wheel-diagram.jpg"
                    alt="" srcset="">
            </div>
        </div>
    </div>


</body>

</html>
