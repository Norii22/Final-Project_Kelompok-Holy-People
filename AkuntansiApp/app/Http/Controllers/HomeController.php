<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Hash;
use Carbon\Carbon;
use DB;
use App\Models\Assets;
use App\Models\Transaction;

class HomeController extends Controller
{

    public function dashboardPage(){
        $user = Auth::user();
        $title = 'Dashboard';
        $list_asset = Assets::where('user_id',$user->id)->get();
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        $total_income = Transaction::where('tsc_detail2','LIKE','%Income%')->orWhere('tsc_category','LIKE','%Income%')->sum('tsc_amount');
        return view('dashboard',compact('title','list_asset','list_tsc','total_income'));
    }
    public function transactionPage(){
        $user = Auth::user();
        $title = 'Transactions';
        $list_asset = Assets::where('user_id',$user->id)->get();
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        return view('transaction',compact('title','list_tsc','list_asset'));
    }
    public function journalPage(){
        $user = Auth::user();
        $title = 'Journals';
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        foreach ($list_tsc as $tsc) {
            if(strpos($tsc->tsc_detail,"Pembelian properti") !== false){
                $city = str_replace("Pembelian properti di ","",$tsc->tsc_detail);
                $asset = Assets::where('user_id',$user->id)->where('asset_loc',$city)->get();
                // dd($asset);
                $tsc->land_price = $asset[0]->asset_land_price;
                $tsc->building_price = $asset[0]->asset_building_price;
            }
        }
        $total_tsc = $list_tsc->sum('tsc_amount');
        // dd($list_tsc);
        return view('journal',compact('title','list_tsc','total_tsc'));
    }
    public function generalLedgerPage(){
        $user = Auth::user();
        $title = 'General Ledger';
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        $list_asset = Assets::where('user_id',$user->id)->get();
        $list_liability = Transaction::where('user_id',$user->id)->where('tsc_detail2','Banks Loan')->get();
        $total_liability = $list_liability->sum('tsc_amount');
        $list_income = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','Income%')->get();
        $total_income = $list_income->sum('tsc_amount');
        $list_expenses = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','%Expense%')->get();
        $total_expenses = $list_expenses->sum('tsc_amount');
        return view('general_ledger',compact('title','list_tsc','list_asset','list_liability','total_liability','list_income','total_income','list_expenses','total_expenses'));
    }
    public function trialBalancePage(){
        $user = Auth::user();
        $title = 'Trial Balance';
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        $total_land = Assets::where('user_id',$user->id)->sum('asset_land_price');
        $total_building = Assets::where('user_id',$user->id)->sum('asset_building_price');
        $total_banksloan = Transaction::where('user_id',$user->id)->where('tsc_detail2','Banks Loan')->sum('tsc_amount');
        $total_income = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','Income%')->sum('tsc_amount');
        $total_expenses = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','%Expense%')->sum('tsc_amount');
        return view('trial_balance',compact('title','list_tsc','total_land','total_building','total_banksloan','total_income','total_expenses'));
    }
    public function balancePage(){
        $user = Auth::user();
        $title = 'Balance';
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        $total_land = Assets::where('user_id',$user->id)->sum('asset_land_price');
        $total_building = Assets::where('user_id',$user->id)->sum('asset_building_price');
        $total_banksloan = Transaction::where('user_id',$user->id)->where('tsc_detail2','Banks Loan')->sum('tsc_amount');
        $total_income = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','Income%')->sum('tsc_amount');
        $total_expenses = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','%Expense%')->sum('tsc_amount');
        return view('balance',compact('title','list_tsc','total_land','total_building','total_banksloan','total_income','total_expenses'));
    }
    public function financialStatementPage(){
        $user = Auth::user();
        $title = 'Financial Statement';
        $list_tsc = Transaction::where('user_id',$user->id)->get();
        $total_income = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','Income%')->sum('tsc_amount');
        $total_expenses = Transaction::where('user_id',$user->id)->where('tsc_detail2','LIKE','%Expense%')->sum('tsc_amount');
        $net_loss = ($total_income - $total_expenses);
        $end_balance = $list_tsc[0]->balance - $net_loss;
        $cash = $list_tsc[count($list_tsc) - 1]->balance;
        $total_land = Assets::where('user_id',$user->id)->sum('asset_land_price');
        $total_building = Assets::where('user_id',$user->id)->sum('asset_building_price');
        $total_asset = $cash + $total_land + $total_building;
        $total_banksloan = Transaction::where('user_id',$user->id)->where('tsc_detail2','Banks Loan')->sum('tsc_amount');
        $total_endequity = $end_balance + $total_banksloan;
        return view('finance_statement',compact('title','list_tsc','total_income','total_expenses','net_loss','end_balance',
                    'cash','total_land','total_building','total_asset','total_banksloan','total_endequity'));
    }

    public function updateEquity(Request $request){
        $user = Auth::user();
        $data = $request->all();
        DB::beginTransaction();
        try{
            User::where('id',$user->id)->update([
                'equity' => $data['equity'],
            ]);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','Update Equity Value Success');
    }
    public function addAsset(Request $request){
        $user = Auth::user();
        $data = $request->all();
        DB::beginTransaction();
        try{
            Transaction::create([
                'user_id' => $user->id,
                'tsc_type' => 'out',
                'tsc_amount' => $data['building_price'] + $data['land_price'],
                'tsc_category' => 'Land;Building',
                'tsc_detail' => 'Pembelian properti di '.$data['city'],
                'tsc_detail2' => 'Cash',
                'tsc_target' => 'Bank',
                'balance' => $user->equity,
            ]);
            Assets::create([
                'user_id' => $user->id,
                'asset_type' => 'own',
                'asset_name' => $data['name'],
                'asset_loc' => $data['city'],
                'asset_building_price' => $data['building_price'],
                'asset_land_price' => $data['land_price']
            ]);
            User::where('id',$user->id)->update([
                'equity' => $user->equity - ($data['building_price'] + $data['land_price'])
            ]);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','Success add new asset');
    }
    public function addTransaction(Request $request){
        $user = Auth::user();
        $data = $request->all();
        DB::beginTransaction();
        try {
            Transaction::create([
                'user_id' => $user->id,
                'tsc_type' => $data['tsc_type'],
                'tsc_amount' => $data['tsc_amount'],
                'tsc_category' => $data['tsc_category'],
                'tsc_detail' => $data['tsc_detail1'],
                'tsc_detail2' => $data['tsc_detail2'],
                'tsc_target' => $data['tsc_target'],
                'balance' => $user->equity,
            ]);
            if($data['tsc_type'] == 'out'){
                $amount = -1 * $data['tsc_amount'];
            }
            else {
                $amount = $data['tsc_amount'];
            }
            User::where('id',$user->id)->update([
                'equity' => $user->equity + $amount
            ]);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','Success add new transaction');
    }
    public function clearTransaction(){
        $user = Auth::user();
        DB::beginTransaction();
        try{
            Transaction::where('user_id',$user->id)->delete();
            Assets::where('user_id',$user->id)->delete();
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','Your transaction list has been cleared');
    }
}
