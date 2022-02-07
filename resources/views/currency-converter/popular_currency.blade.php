@extends('master')
@section('content')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h2>Most Popular Destination Currency is: {{$popular->destination_currency}}</h2>
            </div>
            <div class="col-md-12">
                <h2>Total Time of Converted: {{$popular->total_converted}}</h2> <br>
            </div>



        </div>
    </section>
    <!-- /.content -->
</div>

@endsection