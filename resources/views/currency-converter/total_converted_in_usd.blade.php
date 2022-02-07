@extends('master')
@section('content')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h2>Total amount converted in USD: {{$totalConvertedUSD->total_converted_usd}}</h2>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection