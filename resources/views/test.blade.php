<html>

<head>
    <title>Barcode_Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
@if (Session::has('success'))
    <div class="alert alert-success">
        Data has been saved successfully
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        Data has been saved successfully
    </div>
@endif
    <div class="card">
        <div class="card-body text-center" style="text-align: center; margin:auto">
            <div id="qr-reader" style="width:500px; height: 500px"></div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body" style="text-align: center; margin:auto">

            <table class="table" id="myTable">

            </table>
            <form action="{{route('save-results')}}" method="post">
                @csrf
                <div id="qr-reader-results"></div>
                <button style="display: none" type="submit" id="btn-submit" class="btn btn-primary">Save Results</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <!-- <script src="html5-qrcode.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.0.3/html5-qrcode.min.js" integrity="sha512-uOj9C1++KO/GY58nW0CjDiUjLKWQG4yB/NJMj3PtJNmFA52Hg56lojRtvBpLgQyVByUD+1M3M/1tKdoGDKUBAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script src="{{asset('dist/html5-qrcode.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader",
        { fps: 15, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
        Html5Qrcode.getCameras().then(devices => {
        /**
         * devices would be an array of objects of type:
         * { id: "id", label: "label" }
         */
        if (devices && devices.length) {
            var cameraId = devices[0].id;
            // .. use this to start scanning.
            // console.log(cameraId+'html5QrcodeScanner');
        }
        }).catch(err => {
        // handle err
        });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    </script>
</body>


</html>
