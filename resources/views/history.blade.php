<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Riwayat Kalkulator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center my-2">
            <h3>Riwayat Kalkulator</h3>
        </div>
        <div class="my-2 d-flex justify-content-center">
            <a href="/" class="btn btn-info">Kembali</a>
        </div>
        <div class="my-3">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 300px;">
                    <div class="card-body" style="background-color: #E5E5E5;">
                        <div class="row">
                            @foreach ($datas as $item)
                            <a href="{{ route('index-show', ['data' => $item->result]) }}">
                            <div class="col-6">
                                <p>
                                    Sintaks: {{ $item->syntax }}
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    Hasil: {{ $item->result }}
                                </p>
                            </div>
                        </a>
                                <hr>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>