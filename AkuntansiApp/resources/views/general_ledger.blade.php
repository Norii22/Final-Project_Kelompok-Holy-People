@extends('layouts/main')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>General Ledger</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        @if(count($list_tsc) > 0)
        <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>Asset</h2>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                    <h3 class="text-center">Cash</h3>
                     <table class="table">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold"> <span class="float-left">$</span><span class="float-right">{{number_format($list_tsc[0]->balance)}}</span></td>
                                <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                            </tr>
                            @foreach ($list_tsc as $tsc)                                
                                <tr>
                                    <td class="font-weight-bold"><span class="float-left">$</span> @if($tsc->tsc_type == 'in') <span class="float-right">{{number_format($tsc->tsc_amount)}}</span> @else <span class="float-right">0</span> @endif</td>
                                    <td class="font-weight-bold"><span class="float-left">$</span> @if($tsc->tsc_type == 'out') <span class="float-right">{{(number_format($tsc->tsc_amount))}}</span> @else <span class="float-right">0</span> @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><span class="float-left">$</span> <span class="float-right">{{number_format($list_tsc[count($list_tsc) - 1]->balance)}}</span></th>
                                <th class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></th>
                            </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <h3 class="text-center">Land</h3>
                        <table class="table">
                            <tbody>
                                <?php $ttl_asset = 0; ?>
                                @foreach ($list_asset as $tsc)                                
                                    <tr>
                                        <td class="font-weight-bold"><span class="float-left">$</span> <span class="float-right">{{number_format($tsc->asset_land_price)}}</span></td>
                                        <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                                    </tr>
                                    <?php $ttl_asset += $tsc->asset_land_price; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><span class="float-left">$</span> <span class="float-right">{{number_format($ttl_asset)}}</span></th>
                                    <th class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <h3 class="text-center">Building</h3>
                        <table class="table">
                            <tbody>
                                <?php $ttl_asset = 0; ?>
                                @foreach ($list_asset as $tsc)                                
                                    <tr>
                                        <td class="font-weight-bold"><span class="float-left">$</span> <span class="float-right">{{number_format($tsc->asset_building_price)}}</span> </td>
                                        <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                                    </tr>
                                    <?php $ttl_asset += $tsc->asset_building_price; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><span class="float-left">$</span> <span class="float-right">{{number_format($ttl_asset)}}</span></th>
                                    <th class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>Liability</h2>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                    <h3 class="text-center">Bank's Loan</h3>
                     <table class="table">
                        <tbody>
                            @foreach ($list_liability as $tsc)                                
                                <tr>
                                    <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                                    <td class="font-weight-bold"><span class="float-left">$</span> <span class="float-right">{{$tsc->tsc_amount}}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th><span class="float-left">$</span> <span class="float-right">{{number_format($total_liability)}}</span></th>
                            </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>Equity</h2>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                    <h3 class="text-center">Equity</h3>
                     <table class="table">
                        <tbody>                            
                            <tr>
                                <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                                <td class="font-weight-bold"><span class="float-left">$</span> <span class="float-right">{{number_format($list_tsc[0]->balance)}}</span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th><span class="float-left">$</span> <span class="float-right">{{number_format($list_tsc[0]->balance)}}</span></th>
                            </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>Income</h2>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <h3 class="text-center">Income</h3>
                        <table class="table">
                            <tbody>    
                                @foreach ($list_income as $tsc)
                                    <tr>
                                        <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                                        <td class="font-weight-bold"><span class="float-left">$</span> <span class="float-right">{{number_format($tsc->tsc_amount)}}</span></td>
                                    </tr>
                                @endforeach                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th><span class="float-left">$</span> <span class="float-right">{{number_format($total_income)}}</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>Expenses</h2>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                    <div class="table-responsive-sm">
                        <h3 class="text-center">Expenses</h3>
                        <table class="table">
                            <tbody>
                                @foreach ($list_expenses as $tsc)
                                    <tr>
                                        <td class="font-weight-bold"><span class="float-left">$</span><span class="float-right">0</span></td>
                                        <td class="font-weight-bold"><span class="float-left">$</span> <span class="float-right">{{number_format($tsc->tsc_amount)}}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th><span class="float-left">$</span> <span class="float-right">{{number_format($total_expenses)}}</span></th>
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