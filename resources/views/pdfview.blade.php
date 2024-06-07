<!-- In pdf_template.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <style>
        /* Add your CSS styles for the PDF content */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 10px;
        }
       
    </style>
</head>
<body>
    
<div style="text-align: left;">
<img src = "data:image/png; base64, '.base64_encode(file_get_contents($imagePath)).'" >
    </div>
    <div style = "text-align: center">
    <p>Republic of the Philippines <br>NATIONAL POLICE COMMISSION<br><b>PHILIPPINE NATIONAL POLICE</b><br><b>POLICE REGIONAL OFFICE 13</b> </p> <br><br>
    </div>

    <h><b>MEMORANDUM</b></h>
    <pre>
    TO        :       See Distribution
    FROM      :       C, ROD<
    SUBJECT   :       <b>Full Alert Status</b>
    DATE      :       {{$reports->Date}} 
    </pre>
    <hr>
    <br>
    <pre>
        
    1. Reference: incident recorded in Patrol Section incident Logbook with 
       Entry No.2020-403, Dated {{$reports->Date}}.

    2. Please be informed that on or about {{$reports->Date}}, a 
       {{$reports->TypeOfAccident}} transpired in front of Mabuhay Elementary 
       School located in {{$reports->location}}.
    
    3. For your information and reference.
    </pre>
    <br>
    <br>
<div style="text-align: right;">
<p>Police Captain <br> Acting Chief of Police</p>

    </div>
       
        <p>{{ $reports->Description }}</p>
        <!-- Add more content as needed -->
    </div>
</body>
</html>
