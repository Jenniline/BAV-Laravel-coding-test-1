<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use config\onesignal;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusChangedMail;
use App\Jobs\NotifyOnOrderStatusChangedjob;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAllUsers()
    {
        $user_type = auth()->user()->type;
        if($user_type === "user"){
            return response()->json([
                'success' => false,
                'message' => 'Only super admins are allowed'
            ],401);
        }
        $users = User::all();
        return $users;
    }

    public function toggelUserStatus(Request $request)
    {
        $user_type = auth()->user()->type;
        if($user_type === "user"){
            return response()->json([
                'success' => false,
                'message' => 'Only super admins or admins are allowed'
            ],401);
        }
        $user = User::findOrFail($request->id);
        $user->status = $user->status === 1 ? 0 : 1;
        $user->save();
        $changed_value =  $user->status === 1 ? 'banned' : 'unbanned' ;
        return response()->json([
            'success' => true,
            'message' => "You successfully $changed_value $user->name"
        ],200);
    }
    
    public function deleteUser(User $user)
    {
        $user_type = auth()->user()->type;
        if($user_type === "user"){
            return response()->json([
                'success' => false,
                'message' => 'Only super admins or admins are allowed'
            ],401);
        }
        $user_orders = Order::where('user_id',$user->id)->get();
        if(count($user_orders)>0){
            return response()->json([
                'success' => false,
                'message' => "This user cannot be deleted because user has orders, can only ban the user."
            ],403);
        }
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => "You successfully Deleted user"
        ],200);
    }

    public function updateOrderStatus(Request $request, Order $order, User $user)
    {
        $this->validate($request,[
            'status' => 'required|in:new,ontheway,processing,delivered,cancelled'
        ]);

        $user_type = auth()->user()->type;
        

        if ($user_type === "user" && $request->status !== 'cancelled') {  

            return response()->json([
                'success' => false,
                'message' => "Only super admins or admins are allowed", 
             ], 400);
        }

        $order->status = $request->status;
        $order->save();

        // Mail::to(auth()->user()->email)->send(new OrderStatusChangedMail($order));

        try{
            dispatch((new NotifyOnOrderStatusChangedjob($order, 'new'))->onQueue('api'));
         }catch(\Exception $e){
           Log::error('Something went wrong with when notifying user of order - ' . $order->id, [$e->getMessage()]);
         }

        return response()->json([
            'success' => true,
            'message' => "You successfully changed status to $order->status"
        ],200);
    }
}
