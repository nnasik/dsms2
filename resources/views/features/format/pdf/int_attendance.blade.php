<!DOCTYPE html>
<html>
    <head>
        <style>
            html, body{
                margin: 0in;

            }
            .border tr td, .border tr th{
                border: 1px solid black;
                padding: 5px;
                height: 38px;
            }
            header {
                position: fixed;
                left: 0.5in;
                right: 0.5in;
                top:0.2in;
            }
            .content{
                margin:0.5in;
                margin-top: 1.9in;
            }
        </style>
    </head>
    <body>
        <header>
        <table style="width: 100%;">
            <tr>
                <td style="text-align: center;">
                <img class="logo"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Emblem_of_Sri_Lanka.svg/800px-Emblem_of_Sri_Lanka.svg.png"
                alt="" style="height: 50px;">
                </td>
            </tr>
            <tr>
                <td style="font-family: 'Times New Roman';font-size:14pt;text-align:center;">DIVISIONAL SECRETARIAT, KORALAIAPTTU WEST - ODDAMAVADI</td>
            </tr>
            <tr>
                <td style="font-family: 'Times New Roman';font-size:16pt;font-weight:bold;text-align:center;">@if(isset($program_name)) {{$program_name}}@endif</td>
            </tr>
            <tr>
                <td style="font-family: 'Times New Roman';font-size:12pt;text-align:center;">@if(isset($header_line)) {{$header_line}}@endif</td>
            </tr>
        </table>
        <table style="width: 100%;">
        <tr>
                <td style="">Venue : @if(isset($venue)) {{$venue}}@endif</td>
                <td style="text-align:left">Time : @if(isset($time)) {{$time}}@endif</td>
                <td style="text-align:right">Date : @if(isset($date)) {{$date}}@endif</td>
            </tr>
        </table>
        </header>

        <div class="content">
        <table style="width: 100%;" class="border" cellspacing="0">
            <tr>
                <th style="width: 05%;">S.No</th>
                <th style="width: 30%">Officer's Name</th>
                <th style="width: 15%">Designation</th>
                <th style="width: 20%">Branch</th>
                <th style="width: 15%">Signature</th>
            </tr>
            @foreach(range(1, $no_of_participants) as $row)
                @if(($row - 1) % 10 == 0 && $row != 1)
                <div style="height: 1.9in;"></div>
                    <tr>
                        <th style="width: 05%;">S.No</th>
                        <th style="width: 30%">Participant's Name</th>
                        <th style="width: 15%">Designation</th>
                        <th style="width: 20%">Branch</th>
                        <th style="width: 15%">Signature</th>
                    </tr>
                @endif
                <tr>
                    <td style="text-align:center">@if($numbered=='true') {{ sprintf("%02d", $row) }} @endif</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
        </tr>
    @endforeach
            
        </table>
        </div>

        


    </body>
</html>