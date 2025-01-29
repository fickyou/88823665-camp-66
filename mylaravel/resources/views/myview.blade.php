<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, rgb(255, 228, 225), rgb(255, 240, 245));
    }
</style>

<body class="container mt-4">
    <div class="text-center mb-3">
        <h1>< My Controller ></h1>
        <h3>myinput: {{ $myinput ?? 'N/A' }}</h3>
        <h3>myvalue: {{ $myvalue ?? 'N/A' }}</h3>
    </div>

    <form method="post" action="{{ url('/mycontroller') }}" class="mt-4">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="myinput" placeholder="ใส่สูตรคูณ เช่น 1*1" value="{{ old('myinput') }}">
                <button class="btn btn-success" type="submit">คำนวณ</button>
            </div>
        </form>

    @if (!empty($multiplicationTable))
        <div class="mt-4">
            <h2 class="text-center">📚 ตารางสูตรคูณของ ( {{ explode('*', $myinput)[0] }} )</h2>
            <ul class="list-group">
                @foreach ($multiplicationTable as $row)
                <li class="list-group-item d-flex justify-content-between align-items-center shadow-sm rounded-pill bg-light-pink">
                    <span>🔢 {{ $row }}</span>
                    <span class="badge bg-pink text-white rounded-pill">✔️</span>
                </li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
