<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Auth;
use App\Models\User;

class WithdrawalController extends Controller
{
    public function withdrawal() {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->delete();

        return redirect()
                ->route('index');
    }
}
