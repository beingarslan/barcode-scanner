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
@endsection
