<?php

namespace PixelPenguin\PixelWebsite\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use PixelPenguin\Admin\Models\Page;

class PageController extends Controller
{
   public function index($linkName){
		
		$page = Page::where('link_name', $linkName)->first();
		
		//dd($page);
		//dd($page->pageType);
		
		//echo $page->pageType->view_blade_name;
		//die();
		
		$parentPagesIds = $page->getParentsNames();
		
		$parentPagesIds = explode('||||', $parentPagesIds);
		
		$parentPages = array();
		
		foreach($parentPagesIds as $parentPage){
			$parentPages[] = Page::whereId($parentPage)->first(['id', 'name', 'link_name']);
		}
		
		// dd($parentPages);
		
		return view('pixel-penguin-website::'.$page->pageType->view_blade_name, ['page' => $page, 'parentPages' => $parentPages]);
	}
}
