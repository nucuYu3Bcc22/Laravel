<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $post = Profile::all()->sortByDesc('updated_at')->first();

       

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('profile.index', ['post' => $post]);
    }
}
