@extends('layouts/main')

@section('content')
<style>
    .table .num {
        vertical-align: middle;
        text-align: center;
    }
</style>
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Journal</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        @if(count($list_tsc) > 0)
        <table class="table bg-dark">
            <thead>
                <tr class="bg-dark">
                    <th colspan="4">
                        <h1 class="text-center text-white">Journal</h1>
                    </th>
                </tr>
                <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <tr>
                    <td rowspan="2" class="num">0</td>
                    <td>Cash</td>
                    <td>$ {{number_format($list_tsc[0]->balance)}}</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td class="pl-5">Equity</td>
                    <td>$ 0</td>
                    <td>$ {{number_format($list_tsc[0]->balance)}}</td>
                </tr>
                <?php $i = 1; ?>
                @foreach ($list_tsc as $tsc)
                    @for($j = 0; $j < count(explode(';',$tsc->tsc_category)) + 1; $j++)
                        <?php $ct = explode(';',$tsc->tsc_category) ;?>
                        <tr>
                            @if($j == 0)
                                <td class="num" rowspan="{{count(explode(';',$tsc->tsc_category)) + 1}}">
                                    {{$i}}
                                </td>
                                @if(count($ct) == 1)
                                    <td>{{$tsc->tsc_category}}</td>
                                    <td>$ {{number_format($tsc->tsc_amount)}}</td>
                                    <td>$ 0</td>
                                @endif
                            @endif
                            @if($j < count(explode(';',$tsc->tsc_category)) && count($ct) > 1)
                                <td>{{$ct[$j]}}</td>
                                @if($ct[$j] == 'Land') 
                                    <td>
                                        $ {{number_format($tsc->land_price)}} 
                                    </td>
                                    <td>$ 0</td>
                                @elseif($ct[$j] == 'Building') 
                                    <td>
                                        $ {{number_format($tsc->building_price)}}
                                    </td>
                                    <td>$ 0</td>
                                @endif
                            @endif
                        </tr>
                        @if($j == $j < count(explode(';',$tsc->tsc_category)) && count($ct) > 1)
                            <tr>
                                <td class="pl-5">{{$tsc->tsc_detail2}}</td>
                                {{-- <td>{{$tsc->amount}}</td> --}}
                                <td>$ 0</td>
                                <td>$ {{number_format($tsc->tsc_amount)}}</td>
                            </tr>
                        @elseif (count($ct) == 1 && $j == 0)
                            <tr>
                                <td class="pl-5">{{$tsc->tsc_detail2}}</td>
                                <td>$ 0</td>
                                <td>$ {{number_format($tsc->tsc_amount)}}</td>
                            </tr>
                        @endif
                    @endfor
                    <?php $i++; ?>
                @endforeach
            </tbody>
            <tfoot class="text-white">
                <tr>
                    <th colspan="2" class="text-center">Total</th>
                    <th>$ {{number_format($list_tsc[0]->balance + $total_tsc)}}</th>
                    <th>$ {{number_format($list_tsc[0]->balance + $total_tsc)}}</th>
                </tr>
            </tfoot>
        </table>
        @else
        <div class="col-lg-12">
            <h3 class="text-center">There are no transaction. Please make a new one</h3>
        </div>
        @endif
    </div>
@endsection