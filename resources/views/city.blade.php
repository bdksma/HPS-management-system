<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Export Excell</title>
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <h2>City List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $item->name }}</td>
                    <td>{{ optional($item->country)->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 d-flex justify-content-end">
            <a href="/city-export">Export</a>
        </div>
    </div>
</body>
</html>
