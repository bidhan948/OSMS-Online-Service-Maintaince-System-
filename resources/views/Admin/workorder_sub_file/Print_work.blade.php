<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap css  -->
    <link rel="stylesheet" href="{{ asset('../CSS/bootstrap.min.css') }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('../CSS/all.min.css') }}">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- CUTSOM CSS -->
    <link rel="stylesheet" href="{{ asset('../CSS/custom.css') }}">

    <title>Print Page</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="mt-5 <?php if (isset($result[0]->req_id)) {
                echo 'jumbotron';
            } ?>">
                <table class="table">
                    <tbody>
                        @if (isset($result[0]->req_id))
                            <tr>
                                <th scope="row">Request ID :</th>
                                <td class="float-left">{{ $result[0]->req_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Request info</th>
                                <td>{{ $result[0]->request_info }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Request Description</th>
                                <td>{{ $result[0]->req_desc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $result[0]->request_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address Line 1</th>
                                <td>{{ $result[0]->request_add1 }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address Line 2</th>
                                <td>{{ $result[0]->request_add2 }}</td>
                            </tr>
                            <tr>
                                <th scope="row">city</th>
                                <td>{{ $result[0]->request_city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">State</th>
                                <td>{{ $result[0]->request_state }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile</th>
                                <td>{{ $result[0]->request_mobile }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Zip</th>
                                <td>{{ $result[0]->request_zip }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $result[0]->request_email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Assigned Date</th>
                                <td>{{ $result[0]->request_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Technician Name</th>
                                <td>{{ $result[0]->technician }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Customer Sign</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Technician Sign</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button class="btn btn-danger d-print-none" onclick="window.print()">Print</button>
                                <a href="{{url('Admin/WorkOrder')}}" class="btn btn-secondary d-print-none">Close</a>
                                </th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<body>

    <!-- botstrap js -->
    <script src="{{ asset('../JS/jquery.min.js') }}"></script>
    <script src="{{ asset('../JS/popper.min.js') }}"></script>
    <script src="{{ asset('../JS/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../JS/all.min.js') }}"></script>

</body>

</html>
