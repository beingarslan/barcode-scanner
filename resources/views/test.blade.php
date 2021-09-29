<html>

<head>
    <title>Barcode_Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
    <div class="card">
        <div class="card-body">
            <div id="qr-reader" style="width:500px; height: 500px"></div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <form action="{{route('save-results')}}" method="post">
                <div id="qr-reader-results"></div>
                <button style="display: block" type="submit" class="btn btn-primary">Save Results</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <!-- <script src="html5-qrcode.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.0.3/html5-qrcode.min.js" integrity="sha512-uOj9C1++KO/GY58nW0CjDiUjLKWQG4yB/NJMj3PtJNmFA52Hg56lojRtvBpLgQyVByUD+1M3M/1tKdoGDKUBAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" ||
                document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                    // console.log(`Scan result ${decodedText}`, decodedResult);
                    // alert(decodedText);
                    // console.log(decodedText);
                    // console.log(decodedResult);
                    // Find a <table> element with id="myTable":
                    // var table = document.getElementById("myTable");

                    // // Create an empty <tr> element and add it to the 1st position of the table:
                    // var row = table.insertRow(0);

                    // // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                    // var cell1 = row.insertCell(0);
                    // // var cell2 = row.insertCell(1);

                    // // Add some text to the new cells:
                    // cell1.innerHTML = decodedText;
                    // cell2.innerHTML = "NEW CELL2";
                    $('#qr-reader-results').append('<input type="text" value="'+decodedText+'"" name="value[]"/>');

                }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
</body>


</html>
