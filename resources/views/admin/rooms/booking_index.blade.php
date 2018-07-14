@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/rooms">Rooms list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Booking info</li>
                </ol>
            </nav>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Имя клиента</th>
                        <th>Телефон</th>
                        <th>День, на который бронируется</th>
                        <th>Время бронирования</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                    @foreach($room->clients as $client)
                        <tr>
                            <td>{{ $room->number }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->pivot->period_from }} - {{ $client->pivot->period_to }}</td>
                            <td>{{ $room->created_at }}</td>
                        </tr>
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>


    </div>

@endsection