@extends('layouts/main')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Financial Statement</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        @if(count($list_tsc) > 0)
        <div class="col-md-6">
            <div class="white_shd full margin_bottom_30">
                <h3 class="text-center pt-5">Income Statement</h3>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Income</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{number_format($total_income)}}</span></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-5">Expense</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{number_format($total_expenses)}}</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Net Loss</th>
                                    <th>$</span><span class="float-right">{{number_format($net_loss)}}</span></th>
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
    <div class="row column1">
        @if(count($list_tsc) > 0)
        <div class="col-md-6">
            <div class="white_shd full margin_bottom_30">
                <h3 class="text-center pt-5">Change Of Equity Statement</h3>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Equity, beginning balance</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{number_format($list_tsc[0]->balance)}}</span></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold pl-5">Loss</td>
                                    <td><span class="float-left">$</span><span class="float-right">{{number_format($net_loss)}}</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Equity, end balance</th>
                                    <th>$</span><span class="float-right">{{number_format($end_balance)}}</span></th>
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
    <div class="row column1">
        @if(count($list_tsc) > 0)
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <h3 class="text-center pt-5">Statement Of Financial Position</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table_section padding_infor_info">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        <th colspan="2" class="text-center font-weight-bold">ASSET</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Cash</td>
                                            <td><span class="float-left">$</span><span class="float-right">{{number_format($cash)}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Land</td>
                                            <td><span class="float-left">$</span><span class="float-right">{{number_format($total_land)}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Building</td>
                                            <td><span class="float-left">$</span><span class="float-right">{{number_format($total_building)}}</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>TOTAL ASSET</th>
                                            <th>$</span><span class="float-right">{{number_format($total_asset)}}</span></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table_section padding_infor_info">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        <th colspan="2" class="text-center font-weight-bold">LIABILITY</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Bank's Loan</td>
                                            <td><span class="float-left">$</span><span class="float-right">{{number_format($total_banksloan)}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <thead>
                                        <th colspan="2" class="text-center font-weight-bold">EQUITY</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Equity</td>
                                            <td><span class="float-left">$</span><span class="float-right">{{number_format($end_balance)}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold pl-5">TOTAL LIABILITY + EQUITY</td>
                                            <td><span class="float-left">$</span><span class="float-right">{{number_format($total_endequity)}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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