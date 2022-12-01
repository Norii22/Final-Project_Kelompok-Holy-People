@extends('layouts/main')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Trial Balance</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        @if(count($list_tsc) > 0)
        <div class="col-md-6">
            <div class="white_shd full margin_bottom_30">
                <h3 class="text-center pt-5">Trial Balance</h3>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <th class="text-center font-weight-bold">Account</th>
                                <th class="text-center font-weight-bold">Debit</th>
                                <th class="text-center font-weight-bold">Credit</th>
                            </thead>
                            <?php 
                                $deb = 0; $cred = 0;
                            ?>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Cash</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$list_tsc[count($list_tsc) - 1]->balance}}</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <?php $deb += $list_tsc[count($list_tsc) - 1]->balance;?>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Land</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$total_land}}</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Building</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$total_building}}</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <?php $deb += ($total_land + $total_building + $total_expenses);?>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Bank's Loan</td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$total_banksloan}}</span></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Equity</td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$list_tsc[0]->balance}}</span></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Income</td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$total_income}}</span></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Expenses</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{$total_expenses}}</span></td>
                                    <td><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <?php $cred += $total_banksloan + $list_tsc[0]->balance + $total_income;?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Total</th>
                                    <th><span class="float-left">$</span> <span class="float-right">{{$deb}}</span></th>
                                    <th><span class="float-left">$</span> <span class="float-right">{{$cred}}</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-12">
            <h3 class="text-center">There are no transaction. Please make a new one</h3>
        </div>
        @endif
    </div>
@endsection