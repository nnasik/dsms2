<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Front Page - {{$frontpage->id}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            border: solid 3px #000;
            font-family: "Times New Roman";
        }

        .logo {
            width: 100px;
            display: block;
            margin: 10px auto;
        }

    </style>
</head>

<body>

    <div class="row m-0 p-0">
        <div class="" style="text-align: center;width: 100%; margin:0;padding:0">
            <img class="logo"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Emblem_of_Sri_Lanka.svg/800px-Emblem_of_Sri_Lanka.svg.png"
                alt="" srcset="">
            <br>
            <h2 style="font-size:26pt;">DIVISIONAL SECRETARIAT</h2>
            <h2 style="font-size:18pt;">KORALAIPATTU WEST - ODDAMAVADI</h2>
        </div>
    </div>
    <br>
    <div class="row m-0 p-0">
        <div class="m-0 p-0">
            <div class="m-0" style="text-align: center;">
                <span class="border border-dark rounded p-2" style="font-size:20pt">{{$frontpage->branch}}</span>
            </div>

        </div>
    </div>
    <br>
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
    <br>
    <div class="m-0 p-0">
        <div class="mx-2 p-0">
            <table class="table table-bordered" style="font-size:16pt">
                <tr>
                    <td style="border:solid 3px #000; width:50%"><h3>Number of Sheets</h3></td>
                    <td style="border:solid 3px #000"><h3>{{$request->no_of_sheets}} ({{ucwords($no_of_sheets_in_words)}})</h3> </td>
                </tr>
                <tr>
                    <td style="border:solid 3px #000; width:50%"><h3>No. of Name list sheets :</h3></td>
                    <td style="border:solid 3px #000"><h3>{{$request->no_of_name_list_sheets}} ({{ucwords($no_of_name_list_sheets_in_words)}})</h3> </td>
                </tr>
                <tr>
                    <td style="border:solid 3px #000; width:50%"><h3>No. of Total sheets : </h3></td>
                    <td style="border:solid 3px #000"><h3>{{$request->no_of_total_sheets}} ({{ucwords($no_of_total_sheets_words)}})</h3></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="mt-1 p-2">
        <h4>Prepared by : {{$request->prepared_by}}</h4>
        <br>
        <h4>Checked by : {{$request->checked_by}}</h4>
        <br>
        <h4>Certified by : {{$request->certified_by}}</h4>
    </div>


</body>

</html>
