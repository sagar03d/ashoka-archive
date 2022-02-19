<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if(!function_exists('user_email'))
{
    function user_email()
    {
        $user = Auth::user();
        return $user->email;
    }

    function community_breadcrumb($communityid)
    {
        $htmlarr = session()->exists('community_breadcrumb') ? session('community_breadcrumb') : '';
        $community = \App\Models\Community::find($communityid);
        $newobj = new \stdClass;
        $newobj->community_id = $communityid;
        
        $htmlarr = '<li class="breadcrumb-item active" aria-current="page">'.$community->name.'</li>';
        
        session()->put('community_breadcrumb', $htmlarr);
        return session('community_breadcrumb');
        // $str = str_repeat('community.', 100);
        // $community = \App\Models\Community::with('community.'.$str)->find($communityid);
        // $parents = 
        // $html = '<li class="breadcrumb-item active" aria-current="page">'.$community->name.'</li>';
        // for($i = 1; $i <= 100; $i++) 
        // {
        //     if(isset($community->{str_repeat('community', $i)}->name)) {
        //         $html .= '<li class="breadcrumb-item active" aria-current="page">'.$community->community->name.'</li>';
        //     }
        //     else {
        //         break;
        //     }
        // }
        // return $html;
    }
}