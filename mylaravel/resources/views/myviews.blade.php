<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
      background: linear-gradient(135deg,rgb(29, 228, 239),rgb(80, 211, 47));
    }
</style>

<body class="container mt-4">
    <div class="text-center mb-3">
        <h1>MY MULTIPLICATION TABLE</h1>
        <h3>myinput: {{ $myinput ?? 'N/A' }}</h3>
        <h3>myvalue: {{ $myvalue ?? 'N/A' }}</h3>
    </div>

    <form method="post" action="{{ url('/mycontroller') }}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="myinput" placeholder="สูตรคูณ" value="{{ old('myinput') }}">
            <button class="btn btn-outline-success" type="submit">Submit ➡️</button>
        </div>
    </form>

    @if (!empty($multiplicationTable))
        <div class="mt-4">
            <h2 class="text-center">Multiplication Table for {{ explode('*', $myinput)[0] }} </h2>
            <ul class="list-group">
                @foreach ($multiplicationTable as $row)
                    <li class="list-group-item">{{ $row }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
