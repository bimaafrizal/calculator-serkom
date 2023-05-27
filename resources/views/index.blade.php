<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kalkulator</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center my-2">
            <h3>Kalkulator</h3>
        </div>
        <div class="my-3">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-body" style="width: 300px">
                        <div class="my-1">
                            <input type="text" class="form-control" id="total" @if ($hasil == null)
                                value="0"
                            @else
                                value="{{ $hasil }}"
                                
                            @endif  value="0" readonly>
                        </div>
                        <div class="d-grid d-md-block mt-2">
                            <button class="btn btn-light" onclick="reset()"  style="width:23%" type="button">C</button>
                            <button class="btn btn-light" onclick="hapus()" style="width:23%" type="button"><</button>
                            <button class="btn btn-light" onclick="modulo()" style="width:23%" type="button">%</button>
                            <button class="btn btn-light" style="width:23%" type="button" onclick="bagi()">÷</button>
                        </div>
                        <div class="d-grid d-md-block mt-2">
                            <button class="btn btn-light" onclick="insertAngka(7)"  style="width:23%" type="button">7</button>
                            <button class="btn btn-light" onclick="insertAngka(8)" style="width:23%" type="button">8</button>
                            <button class="btn btn-light" onclick="insertAngka(9)" style="width:23%" type="button">9</button>
                            <button class="btn btn-light" onclick="kali()" style="width:23%" type="button">x</button>
                        </div>
                        <div class="d-grid d-md-block mt-2">
                            <button class="btn btn-light" onclick="insertAngka(4)"  style="width:23%" type="button">4</button>
                            <button class="btn btn-light" onclick="insertAngka(5)" style="width:23%" type="button">5</button>
                            <button class="btn btn-light" onclick="insertAngka(6)" style="width:23%" type="button">6</button>
                            <button class="btn btn-light" onclick="kurang()" style="width:23%" type="button">-</button>
                        </div>
                        <div class="d-grid d-md-block mt-2">
                            <button class="btn btn-light" onclick="insertAngka(1)"  style="width:23%" type="button">1</button>
                            <button class="btn btn-light" onclick="insertAngka(2)" style="width:23%" type="button">2</button>
                            <button class="btn btn-light" onclick="insertAngka(3)" style="width:23%" type="button">3</button>
                            <button class="btn btn-light" onclick="tambah()" style="width:23%" type="button">+</button>
                        </div>
                        <div class="d-grid d-md-block mt-2">
                            <a href="{{ route('history') }}">
                                <button class="btn btn-light" onclick=""  style="width:23%" type="button">H</button>
                            </a>
                            <button class="btn btn-light" onclick="insertAngka(0)" style="width:23%" type="button">0</button>
                            <button class="btn btn-light" onclick="koma()" style="width:23%" type="button">,</button>
                            <button class="btn btn-light" onclick="hasil()" style="width:23%" type="button">=</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //untuk menambahkan angka ke dalam form input
        function insertAngka(input) {
            let hasil = document.getElementById("total");
            let valueHasil = hasil.value;
            let lengthHasil = hasil.length;
            if(valueHasil == 0) {
                valueHasil = "";
            }
            hasil.value = valueHasil.toString() + input.toString();
        }

        // untuk mereset form input hasil
        function reset() {
            $('#total').val(0);
        }

        //untuk menghapus karakter dalam form input
        function hapus() {
            let hasil = document.getElementById("total");
            let valueHasil = hasil.value;
            let convertString = valueHasil.toString();
            
            hasil.value = convertString.slice(0, -1);
        }
        
        //untuk menambah operator tambah pada  ke dalam form input
        function tambah() {
            let total = $('#total').val();
            let length = total.length;

            if(total[length - 1] !== '+') {
                $('#total').val(total.toString() + '+');
            }
        }

        //untuk menambah operator kurang pada  ke dalam form input
        function kurang() {
            let total = $('#total').val();
            let length = total.length;

            if(total[length - 1] !== '-') {
                $('#total').val(total.toString() + '-');
            }
        }

        //untuk menambah operator bagi pada  ke dalam form input
        function bagi() {
            let total = $('#total').val();
            let length = total.length;

            if(total[length - 1] !== '/') {
                $('#total').val(total.toString() + '/');
            }
        }
        
        //untuk menambah operator kali pada  ke dalam form input
        function kali() {
            let total = $('#total').val();
            let length = total.length;

            if(total[length - 1] !== '*') {
                $('#total').val(total.toString() + '*');
            }
        }

        //untuk menambah operator modulo pada  ke dalam form input
        function modulo() {
            let total = $('#total').val();
            let length = total.length;

            if(total[length - 1] !== '%') {
                $('#total').val(total.toString() + '%');
            }
        }

        //untuk menambah koma pada ke dalam form input
        function koma() {
            let total = $('#total').val();
            let length = total.length;

            if(total[length - 1] !== '.') {
                $('#total').val(total.toString() + '.');
            }
        }

        //untuk menghitung hasil dari operator dan mengirim data ke controller
        function hasil() { 
            let syntax = $('#total').val();
            $('#total').val(eval(syntax));
            let hasil = $('#total').val();
            
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(function () {
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('store-calculate') }}",
                        data: {
                            syntax: syntax,
                            result: hasil
                        },
                        cache: false,

                        success: function (msg) {
                            console.log(msg);
                        },
                        error: function (data) {
                            console.log('error: ', data)
                        }
                    });
                })
            });
         }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>