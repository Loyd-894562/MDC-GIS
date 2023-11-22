<!DOCTYPE html>
<html>

<head>
    <title>GUIDANCE OFFICE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
            background-color: #fff;
            text-align: center;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .text-underline {
            text-decoration: underline;
            font-weight: 100;
        }

        label {
            display: inline-block;
            margin-right: 15px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .text-center {
            text-align: center;
        }

        .header-img {
            max-width: 50%;
            height: auto;
            margin: 10px auto;
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ public_path('images/header.png') }}" alt="Header Photo" class="header-img">
        <hr>
        <p class="title">READMISSION FORM</p>

        <p>To the teacher:</p><br>
        <p>This is to inform that Mr./Ms. <u> {{ $readmission->student_name }} </u> &nbsp; enrolled in
            <u>{{ $readmission->course_year }} </u> has incurred the following absences:</p>
        <hr>

        <table>
            <tr>
                <th>Date</th>
                <th>Reason</th>
                <th>Contact number</th>
            </tr>
            <tr>
                <td>{{ $readmission->date1 }}</td>
                <td>{{ $readmission->reason1 }}</td>
                <td>{{ $readmission->subject_affected1 }}</td>
            </tr>
            <tr>
                <td>{{ $readmission->date2 }}</td>
                <td>{{ $readmission->reason2 }}</td>
                <td>{{ $readmission->subject_affected2 }}</td>
            </tr>
            <tr>
                <td>{{ $readmission->date3 }}</td>
                <td>{{ $readmission->reason3 }}</td>
                <td>{{ $readmission->subject_affected3 }}</td>
            </tr>
        </table>

        <p class="text-center">Because of the reasons presented, the student is hereby granted:</p>

        <div class="text-center">
            <label>
                <input type="checkbox" name="granted" value="1" {{ $readmission->granted === 1 ? 'checked' : '' }}>
                RE-ADMISSION
            </label>
            <label>
                <input type="checkbox" name="granted" value="0"
                    {{ $readmission->granted === 0 ? 'checked' : '' }}>
                NON-RE-ADMISSION TO CLASSES
            </label>
        </div>
        <br>
        <table>
            <tr>
                <td>
                    Signed by: <br><br><br>
                    @if ($readmission->guidance_sig)
                        <u>{{ $readmission->guidance_sig }}</u><br>
                        <span class="label">Guidance Counselor</span>
                    @else
                        <u>&nbsp;&nbsp;</u><br>
                        <span class="label">Guidance Counselor</span>
                    @endif
                </td>
                <td>
                    Noted by: <br><br><br>
                    @if ($readmission->osad_sig)
                        <u>{{ $readmission->osad_sig }}</u><br>
                        <span class="label">OSAD Coordinator</span>
                    @else
                        <u>&nbsp;&nbsp;</u><br>
                        <span class="label">OSAD Coordinator</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
