<?php

namespace PixelPenguin\PixelWebsite\Http\Controllers;

use App\Http\Controllers\Controller;

use PixelPenguin\Admin\Models\Product;
use PixelPenguin\Admin\Models\ProductPrice;
use PixelPenguin\Admin\Models\ProductCategory;

use DB;

class ProductController extends Controller
{
	
	public function directory($category = 'all'){
		
		$parentPages = array();
		
		$parentPages[] = new \stdClass();
		$parentPages[0]->name = 'Products';		
		
		if($category == 'all'){
				
		}
		else{
			$productCategory = ProductCategory::whereId($category)->first();
			//echo $category;
			//die();
			$parentPagesIds = $productCategory->getParentsNames();

			$parentPagesIds = explode('||||', $parentPagesIds);

			//dd($parentPagesIds);

			foreach($parentPagesIds as $parentPage){
				$parentPages[] = ProductCategory::whereId($parentPage)->first(['id', 'name', 'link_name']);
			}
		}
		
		
		
		
		
				
		return view('pixel-penguin-website::product.product-directory1', ['parentPages' => $parentPages, 'category' => $category]);
	}
	
	public function jsonDirectory($category = 'all', $take = 20, $skip = 0, $orderBy = 'name', $asc = "ASC"){
		
		$productCategories = ProductCategory::where('parent_id', 0)->with('children')->get();
		
		$products = Product::select('products.*', 'product_prices.price')
			->leftJoin('product_prices', 'product_prices.product_id', 'products.id')
			->where('products.active', true)
			->where('product_prices.active', true)
			->with('category')
			->with('prices')
			->with('gallery');		
		
		if($category != 'all'){
			
			$products = $products->where('product_category_id', $category);			
		}
		
		$products = $products->groupBy('products.id');
		
		
		$totalResults = $products->count();
				
	
		//dd($orderBy); 
		$products = $products->orderBy($orderBy, $asc);
		
		
		$featuredProducts = Product::where('active', true)->where('featured', true)->take(3)->orderBy(DB::raw('RAND()'))->with('category')->with('prices')->with('gallery')->get();
		
		
		return [
			'success' => true,
			'obj' => $products->get(),
			'totalResults' => $totalResults,
			'productCategories' => $productCategories,
			'featuredProducts' => $featuredProducts
		];
	}
	
	public function index($linkName){
		
		
		
		$product = Product::where('link_name', $linkName)->first();
		
		$productCategory = ProductCategory::whereId($product->product_category_id)->first();
		//echo $category;
		//die();
		$parentPagesIds = $productCategory->getParentsNames();

		$parentPagesIds = explode('||||', $parentPagesIds);

		//dd($parentPagesIds);
		$parentPages[] = new \stdClass();
		$parentPages[0]->name = 'Products';		
		
		foreach($parentPagesIds as $parentPage){
			$parentPages[] = ProductCategory::whereId($parentPage)->first(['id', 'name', 'link_name']);
		}
		
		
		
		//echo 'hi';
		
		$featuredProducts = ProductPrice::
		leftJoin('products', 'products.id', 'product_prices.product_id')
		->with('product')
		->with('product.gallery')
		->with('product.category')
		->where('products.active', true)
		->where('product_prices.active', true)
		->get();
		
		
		
		$relatedProducts = Product::where('product_category_id', $product->product_category_id)->get();
		
		
		//dd($featuredProducts[0]->product);
		
		return view('pixel-penguin-website::product.product1', ['parentPages' => $parentPages, 'relatedProducts' => $relatedProducts, 'product' => $product, 'featuredProducts' => $featuredProducts]);
		
	}
	
	static public function functionInController(){
		return [
			'success' => true,
			'message' => 'controller function executed!'
		];
		
	}
}