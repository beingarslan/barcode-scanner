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
            <div id="qr-reader" style="width:500px; height: auto"></div>
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
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        // function onScanSuccess(decodedText, decodedResult) {
        //     // handle the scanned code as you like, for example:
        //     console.log(`Code matched = ${decodedText}`, decodedResult);
        //     var table = document.getElementById("myTable");
        //     if (decodedText !== lastResult) {
        //         ++countResults;
        //         lastResult = decodedText;
        //         // Handle on success condition with the decoded message.
        //         // console.log(`Scan result ${decodedText}`, decodedResult);
        //         // alert(decodedText);
        //         // console.log(decodedText);
        //         // console.log(decodedResult);
        //         // Find a <table> element with id="myTable":
        //         var table = document.getElementById("myTable");

        //         // // Create an empty <tr> element and add it to the 1st position of the table:
        //         var row = table.insertRow(0);

        //         // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        //         var cell1 = row.insertCell(0);
        //         // var cell2 = row.insertCell(1);

        //         // Add some text to the new cells:
        //         cell1.innerHTML = decodedText;
        //         // cell2.innerHTML = "NEW CELL2";
        //         $('#qr-reader-results').append('<input type="hidden" value="' + decodedText + '"" name="value[]"/>');
        //         $('#btn-submit').show();
        //     }
        // }

        // function onScanFailure(error) {
        //     // handle scan failure, usually better to ignore and keep scanning.
        //     // for example:
        //     console.warn(`Code scan error = ${error}`);
        // }

        // let html5QrcodeScanner = new Html5QrcodeScanner(
        //     "qr-reader", {
        //         fps: 15,
        //         qrbox: {
        //             width: 450,
        //             height: 450
        //         }
        //     },
        //     /* verbose= */
        //     false);
        // html5QrcodeScanner.getCameras().then(devices => {
        //     /**
        //      * devices would be an array of objects of type:
        //      * { id: "id", label: "label" }
        //      */
        //     if (devices && devices.length) {
        //         var cameraId = devices[0].id;
        //         // .. use this to start scanning.
        //         console.log(cameraId + 'html5QrcodeScanner');
        //     }
        // }).catch(err => {
        //     // handle err
        // });
        // $('#qr-reader__dashboard_section_swaplink').hide();
        // html5QrcodeScanner.render(onScanSuccess, onScanFailure);

        const html5QrCode = new Html5Qrcode("qr-reader");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            if (decodedText !== lastResult) {
                        ++countResults;
                        lastResult = decodedText;
                        // Handle on success condition with the decoded message.
                        // console.log(`Scan result ${decodedText}`, decodedResult);
                        // alert(decodedText);
                        // console.log(decodedText);
                        // console.log(decodedResult);
                        // Find a <table> element with id="myTable":
                        var table = document.getElementById("myTable");

                        // // Create an empty <tr> element and add it to the 1st position of the table:
                        var row = table.insertRow(0);

                        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                        var cell1 = row.insertCell(0);
                        // var cell2 = row.insertCell(1);

                        // Add some text to the new cells:
                        cell1.innerHTML = decodedText;
                        // cell2.innerHTML = "NEW CELL2";
                        $('#qr-reader-results').append('<input type="hidden" value="' + decodedText + '"" name="value[]"/>');
                        $('#btn-submit').show();
                    }
        };
        const config = { fps: 10, qrbox: { width: 250, height: 250 } };

        // If you want to prefer front camera
        html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback);

        // // If you want to prefer back camera
        // html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);

        // // Select front camera or fail with `OverconstrainedError`.
        // html5QrCode.start({ facingMode: { exact: "user"} }, config, qrCodeSuccessCallback);

        // // Select back camera or fail with `OverconstrainedError`.
        // html5QrCode.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);

        

        
    </script>
</body>


</html>