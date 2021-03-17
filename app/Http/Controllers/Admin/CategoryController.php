<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$objCategory = new Category();
        $categories = Category::select('id','title','slug','description','created_at')
            ->with('news')
            //->orderBy()
            ->paginate(5);

        //$model = Category::find(3); //выбор  по id
        //$model = Category::findOrFail(33);
        //dd($model);
        //$objCategory->getCategories();
        //dd($categories);
        //dd($objCategory->getCategory(7));
        //$categories = $objCategory->getCategories();
        //dd(\DB::table('news')->count()); агр. ф-ии
        //dd(\DB::table('news')->where('id','>','5')->get()); //where('', like,''), where('id',5), 
        //where([['id'>3],['description','like','rtrt']])->get() 
        return view('admin.news.categories.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request -> validate([
            'title' => 'required'
        ]);

        $data = $request->only(['title', 'description']);
        $data['slug'] = \Str::slug($data['title']);
        $create = Category::create($data);
        if($create) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
        }

        return back()->withInput()->with('errors','Не удалось добавить запись');
        //save in database ex: news::create($request->all());
        //Assert
        //return back();

    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.news.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.news.categories.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request -> validate([
            'title' => 'required'
        ]);
        $data = $request->only(['title', 'description']);
        $data['slug'] = \Str::slug($data['title']);
        $save = $category->fill($data)->save();
        if($save) {
            return redirect()->route('admin.categories.index')
            ->with('success', 'Запись успешно обновлена');
        }

        return back()->withInput()->with('errors','Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
