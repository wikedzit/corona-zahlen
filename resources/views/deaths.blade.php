@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="row g-3" method="POST" action="{{ url('/') }}">
                @csrf
                <div class="col-auto">
                    <label for="days" class="visually-hidden">Days</label>
                    <input type="number" class="form-control" id="days" name="days" placeholder="# of Days Back">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Fetch Data</button>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Deaths</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->deaths }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
