@extends('admin')
@section('reservation') active @endsection
@section('content')
<head>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
  
	<script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js" ></script>
</head>


    <div class="card">
    <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Guests</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <td>{{ $reservation->name }}</td>
            <td>{{ $reservation->phone }}</td>
            <td>{{ $reservation->email }}</td>
            <td>{{ $reservation->guest }}</td>
            <td>{{ $reservation->date }}</td>
            <td>{{ $reservation->time }}</td>
            <td>{{ $reservation->message }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Guests</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
        </tr>
    </tfoot>
</table>

    <script>new DataTable('#example', {
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        }
    }
});</script>
</div>
@endsection