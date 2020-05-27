<?php

namespace PixelPenguin\PixelWebsite\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PixelPenguin\Admin\Models\Page;

class ContactController extends Controller
{
    public function index(){
		
		$page = Page::whereId(5)->first();
		
		//return view('website.contact', ['page' => $page]);
		return view('pixel-penguin-website::contact.contact1');
	}
}
