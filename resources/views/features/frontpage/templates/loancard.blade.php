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
            padding: 0.2in;
            margin: 0px;
            margin-left: 0.1in;
        }
    </style>
</head>

<body>
    <div class="odd">
        <div class="m-3 p-0">
            <table style="width:100%">
                
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Page No : <span class="border p-2 mt-2">    </span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align:right" class="pt-2">P.File No.: <b>{{$frontpage->file_no}}</b></td>
                </tr>
                <tr>
                    <td style="width: 33.33%;"></td>
                    <td style="width: 33.33%;"><div class="rounded text-center" style="font-weight:bold;font-size:16pt;text-decoration:underline;">LOAN CARD</div></td>
                    <td style="width: 33.33%; text-align: right;"></td>
                </tr>
                <tr>

                    <td colspan="3"><div class="rounded text-center" style="font-weight:bold;font-size:14pt;text-decoration:underline;">Divisional Secretariat, Koralaipattu West - Oddamavadi</div></td>
                </tr>
            </table>
        </div>
        <div class="mx-3 p-0">
            <table class="mt-0" style="text-align:left;font-size:12.5pt">
                <tr>
                    <td>Full Name of the Officer</td>
                    <td style="font-weight:bold"> : {{$frontpage->name_of_the_officer}}</td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td style="font-weight:bold"> : {{$frontpage->designation}}</td>
                </tr>
                <tr>
                    <td>Class Grade : </td>
                    <td style="font-weight:bold"> : </td>
                </tr>
                <tr>
                    <td>Date of Appointment</td>
                    <td style="font-weight:bold"> : {{$frontpage->date_of_appointment}}	</td>
                </tr>
                <tr>
                    <td>Accounts Branch Loan File Reference No</td>
                    <td style="font-weight:bold"> : </td>
                </tr>
            </table>
        </div>
        <div class="mt-3 p-0" style="text-align: center;font-size:16pt;font-weight:bold;text-decoration:underline;">
            Particulars of Loan Granted
        </div>
        <div class="mx-3 p-0">
            <table class="mt-3" style="width:100%">
                <tr style="text-align: center;">
                    <th style="width: 20%;border:1px solid #000;">Date of Authorization of Loan</th>
                    <th style="width: 25%;border:1px solid #000;">Type of Loan</th>
                    <th style="width: 10%;border:1px solid #000;">Initial of Admin Branch Subject Officer</th>
                    <th style="width: 10%;border:1px solid #000;">Date of Payment of Loan</th>
                    <th style="width: 15%;border:1px solid #000;">Amount</th>
                    <th style="width: 10%;border:1px solid #000;">Initial of Accounts Branch Subject Officer</th>
                    <th style="width: 10%;border:1px solid #000;">Remarks & Accountant Signature</th>
                </tr>
                @foreach(range(1,15) as $row )
                <tr>
                    <td style="height: 5%;border:1px solid #000"></td>
                    <td style="border:1px solid #000"></td>
                    <td style="border:1px solid #000"></td>
                    <td style="border:1px solid #000"></td>
                    <td style="border:1px solid #000"></td>
                    <td style="border:1px solid #000"></td>
                    <td style="border:1px solid #000"></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
