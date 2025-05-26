@extends('layouts.app', ['title' => 'Data'])

@section('content')
<main>
  <div class="m-4">
    <h2 class="mb-4">Data</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ url('/delete-monitoring') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all data?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                Delete All Data
            </button>
        </form>
        <a href="{{ url('/export-monitoring') }}" class="btn btn-success">
            Download CSV
        </a>
    </div> 
    {{-- Table to Display Data --}}
    <div class="table-responsive">
        <table class="table table-striped bg-white" style="min-width: 1200px;">
            <thead>
                <tr>
                    <th scope="col">Cel1 (V)</th>
                    <th scope="col">Cel2 (V)</th>
                    <th scope="col">Cel3 (V)</th>
                    <th scope="col">Cel4 (V)</th>
                    <th scope="col">Total (V)</th>
                    <th scope="col">Current (A)</th>
                    <th scope="col">SOC (%)</th>
                    <th scope="col">Resistance (Ohm)</th>
                    <th scope="col">Temperature (°C)</th>
                    <th scope="col">Hasil Fuzzy</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $datas->cel1 }}</td>    
                        <td>{{ $datas->cel2 }}</td>
                        <td>{{ $datas->cel3 }}</td>
                        <td>{{ $datas->cel4 }}</td>
                        <td>{{ $datas->total }}</td>
                        <td>{{ $datas->current }}</td>
                        <td>{{ $datas->soc }}</td>
                        <td>{{ $datas->resistance }}</td>
                        <td>{{ $datas->temperature }}</td>
                        <td>{{ $datas->fuzzy }}</td>
                        <td>{{ $datas->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        {{-- Pagination --}}

        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
  </div>
</main>
@endsection