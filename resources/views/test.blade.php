<html>

<head>
    <title>Barcode_Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
    <div class="card">
        <div class="card-body">
            <div id="qr-reader" style="width:500px"></div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id="qr-reader-results"></div>
            <table class="table" id="myTable">
                
            </table>
        </div>
    </div>

    <script src="html5-qrcode.min.js"></script>
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
                    var table = document.getElementById("myTable");

                    // Create an empty <tr> element and add it to the 1st position of the table:
                    var row = table.insertRow(0);

                    // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                    var cell1 = row.insertCell(0);
                    // var cell2 = row.insertCell(1);

                    // Add some text to the new cells:
                    cell1.innerHTML = decodedText;
                    // cell2.innerHTML = "NEW CELL2";

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