<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Front Page - {{$frontpage->id}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            border: solid 3px #000;
        }

        .logo {
            width: 100px;
            display: block;
            margin: 0px auto;
        }

    </style>
</head>

<body>

    <div class="row m-0 p-0 ">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: right;width: fit-content;block-size: fit-content;">
                <strong class="border border-dark p-2">{{$frontpage->file_no}}</strong>
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
            <h2 style="font-size:30pt;">DIVISIONAL SECRETARIAT</h2>
            <h2 style="font-size:21pt;">KORALAIPATTU WEST - ODDAMAVADI</h2>
        </div>
    </div>
    <br>
    <br>
    <div class="row m-0 p-0">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: center;">
                <span class="border border-dark rounded p-2" style="font-size:20pt">{{$frontpage->branch}}</span>
            </div>

        </div>
    </div>
    <br><br>
    <div class="row m-0 p-0">
        <div class="m-0 p-0">
            <div class="m-2 rounded" style="text-align: center; border:2px solid #000">
                <h1 class="" style="font-size:50pt">{{$frontpage->heading}}</h1>
                @if($frontpage->sub_heading)
                <h3 class="" style="font-size:30pt">{{$frontpage->sub_heading}}</h3>
                @endif
                @if($frontpage->year)
                <h3 class="" style="font-size:40pt">{{$frontpage->year}}</h3>
                @endif

            </div>

        </div>
    </div>
    <div class="m-0 p-0" style="position: absolute; bottom: 0; left:10px;">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: left;">
                <p style="font-size: 13pt;">
                    <i class="fa-solid fa-phone"></i> : 065 2257 716
                    <br>
                    <i class="fa-solid fa-envelope"></i> : moha.divi.koralaipattuwest@gmail.com
                    <br>
                    <i class="fa-solid fa-globe"></i> : koralaipattuwest.ds.gov.lk

                </p>
            </div>
        </div>
    </div>
    <div class="m-0 p-0" style="position: absolute; bottom: 0px; right:0px;">
        <div class="m-0 p-0">
            <div class="m-2" style="text-align: right;">
                <img style="height: 200px;" src="https://www.5stoday.com/content/images/custom/5S-wheel-diagram.jpg"
                    alt="" srcset="">
            </div>
        </div>
    </div>


</body>

</html>
