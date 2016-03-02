<?php

class PivotController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getall()
	{
		$categories = Category::all();
    $brands = Brand::all();
    return View::make('index')

      ->with('categories', $categories)
      ->with('brands', $brands);
	}

	public function edit($brand_id){


			$brand = Brand::find($brand_id);
			$brand_categories = $brand->categories()->get();
			$categories = Category::all();

			//brand categoriess id key  and value collection

			foreach ($categories as $category):
					$brand_categories_colxn[$category->id]= $category->name;
			endforeach;

			return View::make('edit')->with([

				
				'brand'=>$brand,
				'brand_categories' => $brand_categories,
				'brand_categories_colxn' => $brand_categories_colxn

			]);




	}

	public function create(){

			$categories = array_values(Input::get('categories'));
			$brand = Brand::create(['name'=> Input::get('brand')]);
			$brand->categories()->attach($categories);
			return Redirect::back();


	}

	public function update(){

			$brand_id = Input::get('brand_id');
			$categories = array_values(Input::get('categories'));

			$brand = Brand::find($brand_id);

			$brand->name = Input::get('brand');
			$brand->save();
			$brand->categories()->sync($categories);

			return Redirect::back()->withErrors(['success='=>'Updated successfully']);



	}

}
