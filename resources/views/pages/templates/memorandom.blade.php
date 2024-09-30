<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memorandom of Agreement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%; /* Full width for the container */
        }
        table {
            width: 100%; /* Full width for the table */
            border-collapse: collapse; /* Collapse borders */
        }
        .column1 {
            width: 20%; /* Each column takes half the width */
            padding-left: 25px;
            padding-right: 25px;
            border: 1px solid black; /* Solid black border */
        }

        .column2 {
            width: 60%; /* Each column takes half the width */
            border: 1px solid black; /* Solid black border */
        }

        .column3 {
            width: 20%; /* Each column takes half the width */
            border: 1px solid black; /* Solid black border */
        }

        .column4 {
            width: 70%; /* Each column takes half the width */
        }

        .column5 {
            width: 30%; /* Each column takes half the width */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .table1 {
            width: 100%; /* Full width for the table */
            border-collapse: collapse; /* Collapse borders */
            border-left: solid 1px;
            border-right: solid 1px;
            border-bottom: solid 1px;
        }
  
        .form-check-input {
    display: inline-block;
    margin: 0; /* Reset default margin */
}

            .uli-box {
            width: 18px; 
            height: 30px; 
            font-size: 18px;
            padding: 0;
            margin: 0;
            outline: none; 
            /* Add display: inline-block to remove the default space  */
            display: inline-block;
            border: solid 1px; 
            border-right: none;
            }

            .agreement {
            width: 70%;
            margin: 0 auto;
        }
        ol {
            list-style-type: none; /* Remove numbering from outer list */
            counter-reset: section;
        }
        .nested-ol {
            list-style: none;
            margin-left: 20px;
            padding-left: 40px;
            counter-reset: subsection;
        }
        .nested-ol > li {
            counter-increment: subsection;
            display: block;
            margin-bottom: 10px;
        }
        .nested-ol > li:before {
            content: "1." counter(subsection) ". ";
            position: absolute;
            margin-left: -30px; /* Adjust to ensure numbering doesn't overlap */
        }
        .nested-ol li {
            list-style-position: inside; /* Ensure the content is aligned next to the numbers */
            font-size: small;
        }

     


        .nested-ol1 {
            list-style: none;
            margin-left: 20px;
            padding-left: 40px;
            counter-reset: subsection;
        }
        .nested-ol1 > li {
            counter-increment: subsection;
            display: block;
            margin-bottom: 10px;
        }
        .nested-ol1 > li:before {
            content: "2." counter(subsection) " . ";
            position: absolute;
            margin-left: -30px; /* Adjust to ensure numbering doesn't overlap */
        }
        .nested-ol1 li {
            list-style-position: inside; /* Ensure the content is aligned next to the numbers */
            font-size: small;
        }

    


    </style>
</head>
<body>
    <div class="container">
        <center><h3>MEMORANDOM OF AGREEMENT</h3></center><br>

        <span style="font-size: 14px;padding-left:5%">KNOW ALL PERSONS BY THESE PRESENTS:</span><br><br><br>

        <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">This AGREEMENT is made and entered into by and between : Bohol Island State University, a state university established by virtue of RA 9722, with official business address at <b>{{ @$campus->location }}</b> Bohol duty represented in this instance by <b>{{ @$campus->oic }}</b> Campus Director, hereinafter reffered to as the FIRST PARTY;</span>
        <br><br>
        <span style="font-size: small;"><center> - and - </center></span>

        <table style="padding-left:5%;padding-right:5%;font-size:small">
            <tr>
                <td style="width: 40%;">__________________________</td>
                <td style="width: 60%;">(cooperating agency) with business address at</td>
            </tr>
            <tr>
                  <td style="width: 40%;">__________________________</td>
                <td style="width: 60%;"><span style="padding: 10%;">duly</span><span style="padding: 10%;">represented</span><span style="padding: 10%;">by</span></td>
            </tr>
            <tr>
                  <td style="width: 40%;">__________________________</td>
                <td style="width: 60%;">hereinafter reffered to as the SECONDARY PARTY</td>
            </tr>
        </table>
        <br><br>


        <span style="font-size: small;"><center><strong>WITNESSETH:</strong></center></span>
        <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">WHEREAS, the FIRST PARTY is offering <strong>Bachelor of Science in Information Technology</strong>
            and the <strong>INTERN</strong> is enrolled with the FIRST PARTY on the above-said course for Midyear Break 2023;
        </span>
        <br><br>

        <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">WHEREAS, part of the curriculum of <strong>Bachelor of Science in Information Technology</strong>
            is a completion of an Internship for a period of at least 720 hours:
        </span>

        <br><br>
        <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">
            WHEREAS, the SECOND PARTY accepts, cooperates and trains the <strong>INTERN.</strong>
        </span>

        <br><br>
        <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">
            NOW THEREFORE , premises considered, the PARTIES agree to the following:
        </span>

        <ol>
            <li><strong>The FIRST PARTY shall</strong>
                <ol class="nested-ol">
                    <li>orient the INTERN on the requirements, procedures and related information prior to deployment;</li>
                    <li>assign the INTERN to the SECOND PARTY for internship, which is to be done;</li>
                    <li>coordinate with the SECOND PARTY regarding the performance of the INTERN and for the improvement of the Internship Program;</li>
                    <li>monitor the conduct of Internship of the INTERN to evaluate student's progress and to discuss training problems;</li>
                    <li>conduct exit conference with the SECOND PARTY;</li>
                    <li>send INTERN's Rating Sheet to SECOND PARTY for grading purposes; and</li>
                    <li>blacklist Host Training Establishments if found to have committed the violations of the guidelines stipulated in the CMO 104 s 2017.</li>
                </ol>
            </li>
<br>
            <li><strong>The SECOND PARTY shall</strong>
                <ol class="nested-ol1">
                    <li>conduct orientation/briefing on the work environment, nature of INTERN's participation and the company's rules and regulations;</li>
                    <li>equip the INTERN the necessary in-plant/company training related to the intern's field of specialization which will not be less than 
                        <span class="underline">_________</span> hours for the <span class="underline">_________</span> Semester/s of A.Y. 
                        <span class="underline">_________</span>, which is from <span class="underline">_________</span> to <span class="underline">_________</span>;</li>
                    <li>provide the best mentors for the INTERN;</li>
                    <li>allow the FIRST PARTY to monitor the activities of the INTERN;</li>
                    <li>assign an immediate supervisor who will monitor and evaluate the performance of the INTERN;</li>
                    <li>notify the FIRST PARTY on the performance and conduct of the INTERN; and</li>
                    <li>issue a Certificate of Training indicating the total number of hours rendered for Internship by the INTERN;</li>
                    <li>shall abide with the rules and regulations, policies and responsibilities as stipulated in the CMO 104 s 2017;</li>
                    <li>report to the FIRST PARTY any case of accidents or problems encountered by the INTERN during the internship; and</li>
                    <li> &nbsp;ensure a safe and conducive working environment for the INTERN.</li>
                </ol>
            </li>
        </ol>  
        
        

        <div class="centered">
        <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">This AGREEMENT shall take effect immediately upon signing by all parties concerned and shall remain enforced unless sooner terminated by mutual consent by serving a written notice of any party to the other two parties at least fifteen (15) working days before the actual date of termination, stating the reasons thereof.</span>
        </div>

        <div class="centered"><br>
            <span  style="text-align: justify;display: inline-block;padding-left:5%;padding-right:5%;font-size:small;">IN WITNESS WHEREOF, the parties have hereunto affix their signatures this <span class="underline">_________</span> day of <span class="underline">_________</span>, 20<span class="underline">_____</span> at <span class="underline">_________</span></span>
        </div>
<br><br>

        <div style="padding-left:5%;padding-right:5%;">
            <table>
                <tr>
                    <td style="width:50%;">
                    <div class="row">
                        <span style="font-size: small;"><center><strong>BOHOL ISLAND STATE UNIVERSITY </strong>  <br> {{ @$campus->location }}</center> </span>
                    </div>
                    </td>
                    <td style="width:50%;">
                        <center><span class="signature-line" style="font-size:small;">________________________________ <br> (Name of Cooperating Agency)</span></center>
                    </td>
                </tr>
            </table>
        </div>

        <br><br>
        <div style="padding-left:5%;padding-right:5%;">
            <table>
                <tr>
                    <td style="width:50%;">
                    <div class="row">
                        <span style="font-size: small;"><center><strong>{{ @$campus->president }}</strong>  <br>  Campus Director  <br>  <strong> FIRST PARTY</strong> </center> </span>
                    </div>
                    </td>
                    <td style="width:50%;">
                        <center><span class="signature-line" style="font-size:small;">________________________________ <br> Representative of Cooperating Agency </span></center>
                    </td>
                </tr>
            </table>
        </div>
<br><br>
        <div style="padding-left:5%;padding-right:5%;">
            <table>
                <tr>
                    <td style="width:50%;">
                 
                    </td>
                    <td style="width:50%;">
                        <center><span class="signature-line" style="font-size:small;">________________________________ <br> Designation <br>  <strong>SECOND PARTY</strong> </span></center>
                    </td>
                </tr>
            </table>
        </div>



 





        <div style="padding-left:5%;padding-right:5%;">
         <p>Signed in the presence of:<br>
    </div>


    <div style="padding-left:5%;padding-right:5%;">
        <table>
            <tr>
                <td style="width:50%;">
                <div class="row">
                    <span style="font-size: small;"><strong>BENJAMIN N. OMAMALIN, PhD.</strong>  <br>&nbsp;&nbsp;&nbsp;Dean, CTAS </span>
                </div>
                </td>
                <td style="width:50%;">
                    <center><span class="signature-line" style="font-size:small;">________________________________ <br> Witness</span></center>
                </td>
            </tr>
        </table>
    </div>

    <div style="padding-left:5%;padding-right:5%;font-size:small;"><br>
        <center><span style="font-size: small;"><strong>ACKNOWLEDGEMENT</strong></span></center><br>
        <strong><span style="font-size: small;">REPUBLIC OF THE PHILIPPINES >  </strong> <br> <span class="signature-line">__________________________ ></span> </span> S.S.<br><br>
        This <span class="signature-line">__________</span> day of <span class="signature-line">______</span>, 20<span class="signature-line">_______</span> at the <span class="signature-line">____________________</span> personally appeared before me</p>
    </div>

    <div style="padding-left:5%;padding-right:5%;font-size:small;"><br>
        <table class="id-table">
            <tr>
                <td style="width: 25%;font-weight:bold">NAME</td>
                <td style="width: 25%;font-weight:bold">VALID ID No.</td>
                <td style="width: 25%;font-weight:bold">Issued by</td>
                <td style="width: 25%;font-weight:bold">Valid until</td>
            </tr>
            <tr>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
            </tr>

            <tr>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
            </tr>

            <tr>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
                <td style="width: 25%;"><span class="signature-line">__________________</span></td>
            </tr>
        </table>
    </div>

    <div  style="padding-left:5%;padding-right:5%;font-size:small;">
    <br><br>
    <span>All known to me the same persons who executed the foregoing instrument and they acknowledged to <br> me that the same is their free and voluntary deed.</span>
    <br><br>
    </div>
    <div class="centered">
        <p><strong>WITNESS MY HAND AND SEAL</strong> on the date and at the place first above written.</p>
    </div>
    </div>
</body>
</html>