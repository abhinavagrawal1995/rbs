@extends('layouts.security')
@section('content')
    {{--{{$bookingsData}}--}}
    <div class="container" style="margin-top: 5%;">
        <h2>Booking Status</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Faculty Advisor</th>
                    <th>Student Welfare</th>
                    <th>Your Remark</th>
                    <th></th>
                </tr>



            </thead>
            <tbody>

                @foreach ($bookingsData as $booking)
                    <tr class="success" style="background:#CCFFB2;">
                        @if ($booking['associated_venue_room']['venue_id'] === 1)
                            <td> {{'NLH'}}</td>
                        @else
                            <td> {{'AB5'}}</td>
                        @endif
                        <td>{{$booking['associated_venue_room']['room']}}</td>
                        <td>{{$booking['associated_venue_room_slot']['date']}}</td>
                        @if ($booking['approved_by_fa'] === 1)
                            <td> {{'Approved'}}</td>
                        @else
                            <td> {{'In Progress'}}</td>
                        @endif

                        @if ($booking['approved_by_swf'] === 1)
                            <td> {{'Approved'}}</td>
                        @else
                            <td> {{'In Progress'}}</td>
                        @endif

                        @if ($booking['security_remarks'] == null)
                            <td> {{  '-' }}</td>
                        @else
                            <td> <strong>{{ $booking['security_remarks'] }}</strong></td>
                        @endif

                        <td><a href="/securityhistory/{{$booking['id']}}">Details</a></td>
                        <td><a href="/securityapprove/{{$booking['id']}}" onclick="javascript:return confirm('Are you sure to approve this booking ?')">Approve</a></td>
                        <td><a href="/securitydisapprove/{{$booking['id']}}" onclick="javascript:return confirm('Are you sure to disapprove this booking ?')">Disapprove</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop