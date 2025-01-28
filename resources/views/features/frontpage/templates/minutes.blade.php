<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Front Page - {{$frontpage->id}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        html, body{
            font-family:"Times New Roman";
            padding: 0px;
            margin: 0px;
        }
        .odd{
            margin:0.1in 0.1in 0.2in 0.7in;
        }
        .even{
            margin:0.1in 0.7in 0.2in 0.1in;
        }
    </style>
</head>

<body>
    <div class="odd">
    <div class="m-3 p-0">
    <table style="width:100%">
        <tr>
            <td style="width: 33.33%;"></td>
            <td style="width: 33.33%;"><div class="rounded text-center" style="font-weight:bold;border:solid 2px #000;font-size:14pt">Minutes Sheet</div></td>
            <td style="width: 33.33%; text-align: right;"> Tr. & Audit 141</td>
        </tr>
    </table>
</div>
<div class="mx-3 p-0">
    <table class="mt-0" style="width:100%">
        <tr>
            <td>File No : {{$frontpage->file_no}}</td>
            <td style="text-align: right;">Minute Sheet No : <span class="border p-2">   </span></td>
        </tr>
    </table>
</div>
<div class="mx-3 p-0 left-1-inch">
    <table class="mt-3" style="width:100%">
        <tr style="text-align: center;">
            <th style="width: 10%;border:1px solid #000;">S No.</th>
            <th style="width: 60%;border:1px solid #000;">Subject</th>
            <th style="width: 30%;border:1px solid #000;">Approval / Suggestion</th>
        </tr>
        <tr>
            <td style="border:1px solid #000;height: 96%;"></td>
            <td style="border:1px solid #000"></td>
            <td style="border:1px solid #000"></td>
        </tr>
    </table>
</div>
    </div>


    <div class="even">
    <div class="m-3 p-0">
    <table style="width:100%">
        <tr>
            <td style="width: 33.33%;"></td>
            <td style="width: 33.33%;"><div class="rounded text-center" style="font-weight:bold;border:solid 2px #000;font-size:14pt">Minutes Sheet</div></td>
            <td style="width: 33.33%; text-align: right;"> Tr. & Audit 141</td>
        </tr>
    </table>
</div>
<div class="mx-3 p-0">
    <table class="mt-0" style="width:100%">
        <tr>
            <td>File No : {{$frontpage->file_no}}</td>
            <td style="text-align: right;">Minute Sheet No : <span class="border p-2">   </span></td>
        </tr>
    </table>
</div>
<div class="mx-3 p-0 left-1-inch">
    <table class="mt-3" style="width:100%">
        <tr style="text-align: center;">
            <th style="width: 10%;border:1px solid #000;">S No.</th>
            <th style="width: 60%;border:1px solid #000;">Subject</th>
            <th style="width: 30%;border:1px solid #000;">Approval / Suggestion</th>
        </tr>
        <tr>
            <td style="border:1px solid #000;height: 96%;"></td>
            <td style="border:1px solid #000"></td>
            <td style="border:1px solid #000"></td>
        </tr>
    </table>
</div>
    </div>


</body>

</html>
