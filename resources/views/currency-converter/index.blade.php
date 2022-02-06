@extends('master')
@section('content')

<h1>Currency Converter Page!</h1>

<div class="box-body">

    <form action="{{route('currency.convert')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group row">
                    <h5 class="col-md-12">Amount</h5>
                    <div class="col-md-10">
                        <input class="form-control" value="{{ @session('amount') }}" type="text" name="amount"
                            placeholder="1.00">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="my-10">From</h5>
                <select name="from" class="selectpicker">
                    @foreach($codes as $code => $value)
                    <option {{$code == @session('from') || $code == 'EUR' ? 'selected' : ''}}>{{$code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <h5 class="my-10">To</h5>
                <select name="to" class="selectpicker">
                    @foreach($codes as $code => $value)
                    <option {{$code == @session('to') || $code == 'USD' ? 'selected' : ''}}>{{$code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="clearfix">
                    <button type="submit" class="btn btn-success mb-5"><i class="fa fa-check"></i>Convert</button>
                </div>
            </div>
        </div>

        <!-- <div class="box">
            <div class="box-body">
                <div class="clearfix">
                    <button type="button" class="btn btn-success mb-5"><i class="fa fa-check"></i> Success</button>
                </div>
            </div>
        </div> -->

    </form>

    @if(session('conversion'))
    <div class="">
        {{session('conversion')}}
    </div>
    @elseif($errors->any())
    @foreach($errors->all() as $error)
    <div>
        {{ $error }}
    </div>
    @endforeach
    @endif

</div>

@endsection