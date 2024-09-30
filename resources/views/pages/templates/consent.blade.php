<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent's Consent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .consent-section {
            margin: 20px 0;
        }
        .signature {
            margin-top: 10px;
            text-align: right;
        }
        .witnesses {
            margin-top: 10px;
        }
        .witnesses p {
            margin: 1px 0;
        }
        .line {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td style="width:20%;">
                <center style="padding-right:60px;padding-left:50px">
                <img class="img-radius" src="{{ asset('assets/images/images.png') }}" alt="User-Profile-Image" style="width: 110px; height:100px;">
                </center>
            </td>
            <td style="width:80%;padding-left:1%">
            <div class="header">
                <span style="font-size: small;">Republic of the Philippines</span><br>
                <span style="font-size: medium;"><strong>Bohol Island State University</strong></span><br>
                <span style="font-size: small;">Balilihan Campus</span><br>
                <span style="font-size: small;">Magsija, Balilihan Bohol</span><br>
                <span style="font-size: small;">Tel: (035) 416-0797</span>
            </div>
            </td>
        </tr>
    </table>


    <span style="font-size: small;"><center><strong>PARENT'S CONSENT</strong></center></span>
    <span style="float:right;font-size:small"> __________________</span><br>
    <span style="float:right;font-size:small;padding-right:60px;"> Date</span>
    <div class="consent-section">
        <span style="font-size:small;font-weight:bold">TO WHOM IT MAY CONCERN:</span>

        
        <p style="font-size:small;text-align: justify;display: inline-block;">
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;We  <span><span class="signature-line" style="border-bottom: solid 1px;"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{ ucwords(@$user->mname) }}, {{ ucwords(@$user->fname) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> guardian/parents</span>,
        &nbsp; &nbsp;&nbsp;&nbsp;of  <span><span class="signature-line"  style="border-bottom: solid 1px;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{ ucwords(@$user->first_name) }}, {{ ucwords(@$user->middle_name) }}, {{ ucwords(@$user->last_name) }}&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</span>, a student of {{ @$campus->location }} and a resident of
        <span class="signature-line">__________________________________________</span>granted her/him permission to undergo On-the-Job Training at the <span class="signature-line">___________________________________</span>,
        This training is necessary and part of the curriculum of the school.  
        </span>,
        </p>

        <br>
        <p style="font-size:small;text-align: justify;display: inline-block;">
            &nbsp; We, affirm that the {{ @$campus->location }} and the <span><span class="signature-line">___________________________________________________________</span> are in no way responsible for any accident, harm, injury that may be caused on her/his person during the training and that this student will undergo actual On-the-Job Training with or without compensation from both the {{ @$campus->location }} and the 
            <span class="signature-line">_____________________________________________________</span>.
        </span>,
        </p>


        <p style="font-size:small;text-align: justify;display: inline-block;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I/We, further affirm that he/she shall be liable for any loss or damage sustained by the equipment or property and injuries or losses by employees and officers of 
            <span class="signature-line">__________________________________</span> caused by the deliberate act of negligence of the student.
        </span>,
        </p>

        <p style="font-size:small;text-align: justify;display: inline-block;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certifies that she has on her own free will signified to me her/his decision to undergo On-the-Job Training as evidenced by her/his signature affixed below together with our signature.
        </p>

        <div class="signature" style="padding-right: 30px;font-size:small">
          <span class="signature-line" style="font-size:small;border-bottom:solid 1px;padding-left:50px;padding-right:50px;">{{ ucwords(@$user->mname) }}, {{ ucwords(@$user->fname) }} </span><br> Parent/Guardian<br><br>
          <span class="signature-line" style="font-size: small;border-bottom:solid 1px;padding-left:50px;padding-right:50px;">{{ ucwords(@$user->first_name) }}, {{ ucwords(@$user->middle_name) }}, {{ ucwords(@$user->last_name) }}</span><br>  Student/Trainee
        </div>
    </div>

    <div class="witnesses" style="font-size:small">
        <p>Witnesses:</p>
        <p style="padding-left: 100px;"><strong>{{ @$program->oic }}</strong><br> <span style="padding-left: 60px;"> Dean, CTAS </span></p><br>
        <p style="padding-left: 100px;"><strong>{{ @$program->oic }}</strong><br> <span style="padding-left: 0px;"> OJT Coordinator – Dean of CCIS </span></p><br>
    </div>
</body>
</html>
