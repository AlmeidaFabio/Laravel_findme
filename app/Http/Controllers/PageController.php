<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Page;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index($slug) {
        $page = Page::where('slug', $slug)->first();

        if($page) {
            $bg = '#ffffff';
            switch($page->op_bg_type) {
                case 'image':
                    $bg = "url('".url('/media/uploads').'/'.$page->op_bg_value."')";
                break;
                
                case 'color':
                    $colors = explode(',', $page->op_bg_value);
                    $bg = 'linear-gradient(90deg,';
                    $bg .= $colors[0].',';
                    $bg .= !empty($colors[1]) ? $colors[1] : $colors[0];
                    $bg .= ')';
                break;    
            }

            $links = Link::where('id_page', $page->id)->where('status', 1)->orderBy('order')->get();

            $view = View::firstOrNew(
                ['id_page' => $page->id, 'view_date' => date('Y-m-d')]
            );
            $view->total++;
            $view->save();

            return view('page', [
                'font_color' => $page->op_font_color,
                'profile_image' => url('/media/uploads').'/'.$page->op_profile_image,
                'title' => $page->op_title,
                'description' => $page->op_description,
                'fb_pixel' => $page->op_fb_pixel,
                'bg' => $bg,
                'links' => $links,
            ]);
        } else {
            return view('notfound');
        }
    }

    public function newPage($id)
    {
        $user = Auth::user('id', $id);
        
        if ($user) {
            return view('editpage', [
                
            ]);
        } else {
            return redirect('/admin');
        }
    }

    public function newPageAction($id, Request $request)
    {
        $user = Auth::user('id', $id);
        
        if ($user) {
            $fields = $request->validate([
                'op_title' => ['required', 'min:2'],
                'op_description' => ['max:200'],
                'op_bg_value' => ['required', 'regex:/^[#][0-9A-F]{3,6}$/i'],
                'op_text_color' => ['required', 'regex:/^[#][0-9A-F]{3,6}$/i']
            ]);

            $newPage = new Page();
            $newPage->id_user = $id;
            $newPage->op_text_color = $fields['op_text_color'];
            $newPage->op_bg_value = $fields['op_bg_value'];
            $newPage->op_title = $fields['op_title'];
            $str = strtolower($fields['op_title']);
            $newPage->slug = preg_replace('/\s+/', '-', $str);
            $newPage->op_description = $fields['op_description'];
            
            $newPage->save();

            return redirect('/admin');
        } else {
            return redirect('/admin');
        }
    }
}
