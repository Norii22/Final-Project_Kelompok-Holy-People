@extends('layouts/main')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-hand-holding-usd yellow_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no">$ {{number_format($total_income)}}</p>
                    <p class="head_couter">Income</p>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-landmark blue1_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no">{{$list_asset->count()}}</p>
                    <p class="head_couter">Assets</p>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-file green_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no">{{$list_tsc->count()}}</p>
                    <p class="head_couter">Transactions</p>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6 col-lg-3">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-money-check red_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no">$ {{number_format(Auth::user()->equity)}}</p>
                    <p class="head_couter">Balance</p>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row column1 social_media_section">
        <div class="col-md-6 col-lg-6">
            <div class="full socile_icons fb margin_bottom_30">
                <div class="social_icon">
                    <i class="fa fa-money-check"></i>
                    <h5 class="text-light">Equity</h5>
                </div>
                <div class="social_cont">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <h3>
                                $ {{number_format(Auth::user()->equity)}}
                            </h3>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#equityModal">
                            Edit Equity
                        </button>
                        <div class="modal fade" id="equityModal" tabindex="-1" role="dialog" aria-labelledby="equityModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="equityModalLabel">Set Equity</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{url('/set_equity')}}">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="equity" class="col-sm-4 col-form-label font-weight-bold">Equity Nominal</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="equity" name="equity" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="full socile_icons tw margin_bottom_30">
                <div class="social_icon">
                    <i class="fa fa-landmark"></i>
                    <h5 class="text-light">Assets</h5>
                </div>
                <div class="social_cont">
                    <div class="white_shd full margin_bottom_30">
                        <div class="table_section px-5">
                           <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>City</th>
                                        <th>Land</th>
                                        <th>Building</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cnt = 1;?>
                                        @foreach ($list_asset as $asset)
                                            <tr>
                                                <td>{{$cnt}}</td>
                                                <td>{{$asset->asset_loc}}</td>
                                                <td>$ {{$asset->asset_land_price}}</td>
                                                <td>$ {{$asset->asset_building_price}}</td>
                                            </tr>
                                            <?php $cnt++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                           </div>
                        </div>
                     </div>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assetModal">
                        Add New Asset
                    </button>
                    <div class="modal fade" id="assetModal" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assetModalLabel">Add Assets</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{url('/add_asset')}}">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="equity" class="col-sm-4 col-form-label font-weight-bold">Asset Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="equity" class="col-sm-4 col-form-label font-weight-bold">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="equity" class="col-sm-4 col-form-label font-weight-bold">Land Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="land_price" name="land_price" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="equity" class="col-sm-4 col-form-label font-weight-bold">Building Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="building_price" name="building_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection