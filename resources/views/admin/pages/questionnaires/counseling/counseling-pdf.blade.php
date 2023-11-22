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
            margin-bottom: 20px;
        }

        .header-img {
            max-width: 50%;
            height: auto;
            margin: 20px auto; /* Center image using margin */
            display: block;
        }

        hr {
            margin: 20px auto; /* Center hr */
            width: 50%;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .text-underline {
            text-decoration: underline;
            font-weight: 100;
        }

        .text-center {
            text-align: center;
        }

        .label {
            font-weight: bold;
        }

        .left-align {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ public_path('images/header.png') }}" alt="Header Photo" class="header-img">
        <hr>
        <p class="title">COUNSELING FORM</p>

        <table>
            <tr>
                <th>Name of Student:</th>
                <td class="text-underline">{{ $counseling->student_name }}</td>

            </tr>
            <tr>
                <th>Date:</th>
                <td class="text-underline">{{ $counseling->date }}</td>
                <th>Course and Year:</th>
                <td class="text-underline">{{ $counseling->course_year }}</td>

            </tr>
            <tr>
                <th>Department:</th>
                <td class="text-underline">{{ $counseling->department }}</td>
                <th>Contact number:</th>
                <td class="text-underline">{{ $counseling->contact_num }}</td>
            </tr>
        </table>

        <div class="left-align">
            <div class="label">Nature of Visit</div>
            {{ $counseling->visit_nature }}
        </div>
        <br>
        <div class="left-align">
            <div class="label">Problem(s)/Concern(s)</div>
            <div class="content">{{ $counseling->concern }}</div>
        </div>
        <br><br>
        <div class="left-align">
            <div class="label">Action Taken/Recommendation(s)</div>
            <div class="content">{{ $counseling->action_taken }}</div>
        </div>
        <br>
        <div class="left-align">
            <div class="label">Follow up Dates: {{ $counseling->followup_dates }}</div>
        </div>
        <br><br>
        <table>
            <tr>
                <td class="text-center">
                    @if ($counseling->counselee)
                        <u>{{ $counseling->counselee }}</u>
                    @else
                        <u>&nbsp;&nbsp;</u>
                    @endif
                </td>

                <td class="text-center">
                    @if ($counseling->counselor)
                        <u>{{ $counseling->counselor }}</u>
                    @else
                        <u>&nbsp;&nbsp;</u>
                    @endif
                </td>

            </tr>
            <tr>
                <th class="text-center">Counselee</th>
                <th class="text-center">Counselor</th>
            </tr>
        </table>
        <hr>
        <div class="border-dark">
            <p class="title">COUNSELING SLIP</p>
            <table>
                <tr>
                    <th>Name of Student:</th>
                    <td class="text-underline">{{ $counseling->student_name }}</td>
                    <th>Date:</th>
                    <td class="text-underline">{{ $counseling->date }}</td>
                </tr>
                <tr>
                    <th>Course and Year:</th>
                    <td class="text-underline">{{ $counseling->course_year }}</td>
                    <th>Department:</th>
                    <td class="text-underline">{{ $counseling->department }}</td>

                </tr>
                <tr>
                    <th>Contact number:</th>
                    <td class="text-underline">{{ $counseling->contact_num }}</td>
                    <th>Session Ended:</th>
                    <td class="text-underline">{{ $counseling->session_ended }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
