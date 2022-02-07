@extends('master')
@section('content')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            From Currency Table
                            <!-- <small class="subtitle">More than 400+ new members</small> -->
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Amount</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Currency</span>
                                        </th>
                                        <th style="min-width: 100px"><span class="text-fade">Destiantion Currency</span>
                                        </th>
                                        <th style="min-width: 150px"><span class="text-fade">Converted Corrency</span>
                                        </th>
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($currencies as $currency)
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#"
                                                        class="text-white font-weight-600 hover-primary mb-1 font-size-16">
                                                        {{$currency->amount}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$currency->from_currency}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$currency->destination_currency}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$currency->converted_amount}}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection