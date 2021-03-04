<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv=”Content-Language” content=”th” />
    <meta http-equiv=”Content-Type” content="text/html" charset="utf-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap"
        rel="stylesheet">


    <style>
        body {
            margin: 0;
            padding: 0;
            border: 0;
            vertical-align: baseline;
            font-family: 'Sarabun';
            font-style: normal;
            background-color: #FFFFFF;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        span.h1 {
            font-size: 1.2rem;
        }

        p.test {
            width: 11em;
            border: 1px solid #000000;
            word-wrap: break-word;
        }

    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td align="center">หนังสือขออนุญาตลาหยุด</td>

        </tr>
    </table>
    <table width="100%">
        <tr>
            <td align="right">วันที่ {{ $data->date_now }}</td>
        </tr>
    </table><br>
    <table width="100%">
        <tr>
            <td colspan="2" align="left">เรื่องขอลา {{ $data->leave_type }}</td>
        </tr>
        <tr>
            <td colspan="2" align="left">เรียน ผู้บริหาร</td>
        </tr>
    </table><br><br>
    <table width="100%">
        <tr>
            <td colspan="2" align="left">ข้าพเจ้า {{ $data->profiles->name }}</td>
        </tr>
        <tr>
            <td colspan="2" align="left">พนักงานเเผนก {{ $data->profiles->groups->name }}</td>
        </tr>
        <tr>
            <td colspan="2" align="left">พนักงานตำเเหน่ง {{ $data->profiles->jobpositions->name }}</td>
        </tr>
        <tr>
            <td colspan="2" align="left" style="word-wrap: break-word;">
                ขออนุญาติลาเพื่อ {{ $data->annotation }}
            </td>
        </tr>
    </table> <br><br><br>
    <table width="100%">
        <tr>
            <td align="left">โดยเริ่มตั่งเเต่วันที่ {{ $data->date_start }}</td>
            <td align="left">จนถึ่งวันที่ {{ $data->date_end }}</td>
        </tr>
    </table><br><br><br><br><br>
    <table width="100%">
        <tr>
            <td align="right"> ลงชื่อ &nbsp;..........................................</td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td align="right"> </td>
            <td align=" right" style="text-right: center;padding-right: 13%;">
                (&nbsp;{{ $data->profiles->name }}&nbsp;)</td>

        </tr>
    </table><br><br><br><br><br><br>
    <table width="100%">
        <tr>
            <td align="left"> ผู้รับรอง &nbsp;{{ $data->endorser }}</td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td align=" left">(&nbsp;ตำเเหน่ง&nbsp;{{ $data->position_endorser }}&nbsp;)</td>
        </tr>
    </table><br><br><br>

</body>

</html>
