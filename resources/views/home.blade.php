@extends('layouts.app')

@section('content')

    <?php
    $mytime = Carbon\Carbon::now();
    $mydate = $mytime->format('Y-m-d');
    $mytime = $mytime->format('H:i');
    ?>
    <div class="container">
        <div class="row justify-content-center">


            {{--@include('pcb.leader')--}}

            {{--@include('pcb.production_name')--}}
            <div class="col-md-2" style="margin:10px 0px">
                <label class="control-label" style="display: inline-block;">Sec Time</label><br>
                <input type="text" name="sectime" class="form-control">

            </div>
            @include('pcb.timetable')


        </div>
    </div>
    </div>
    </div>
    </div>


    <script type="text/javascript">
        function findTotalHourAch() {
            var arr = document.getElementsByName('hourach');
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('total_hourach').value = tot;
        }
    </script>


<script src="">
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

                    // // Create an empty <tr> element and add it to the 1st position of the table:
                    var row = table.insertRow(0);

                    // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                    var cell1 = row.insertCell(0);
                    // var cell2 = row.insertCell(1);

                    // Add some text to the new cells:
                    cell1.innerHTML = decodedText;
                    // cell2.innerHTML = "NEW CELL2";
                    $('#qr-reader-results').append('<input type="hidden" value="'+decodedText+'"" name="value[]"/>');
                    $('#btn-submit').show();
                }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 15,
                    qrbox: { width: 250, height: 250 }  // Optional, if you want bounded box UI
                }, true);
            html5QrcodeScanner.render(onScanSuccess);
        });
</script>
@endsection
