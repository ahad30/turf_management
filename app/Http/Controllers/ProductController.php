<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Branch;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // index
        $branches = Branch::where("branch_owner_id", auth()->id())->get();
        if (!$branches) {
            Session::flash("warning", "No branches found. Add branch now.");
            return Back();
        }

        $query = Product::latest();
        foreach ($branches as $item) {
            $query->orWhere('branch_id', $item->id);
        }
        $products =  $query->paginate(20);

        return view("TurfOwner.products.index", compact("products", "branches"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::where("branch_owner_id", auth()->id())->get(['id', 'name']);
        if (!$branches) {
            Session::flash('warning', 'Branch not found');
            return back();
        }
        return view("TurfOwner.products.create", compact("branches"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'size' => $request->size,
            'color' => $request->color,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $this->imageUpload($request, 'image', "/uploads/Turf/products"),
        ]);

        if (!$product) {
            Session::flash("warning", "Something went wrong");
            return back();
        }
        Session::flash("success", "product successfully created");
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            Session::flash("warning", "Product not found");
            return back();
        }

        $branches = Branch::where("branch_owner_id", auth()->id())->get(['id', 'name']);
        if (!$branches) {
            Session::flash('warning', 'Branch not found');
            return back();
        }

        return view("TurfOwner.products.edit", compact(["product", "branches"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            Session::flash("warning", "Product not found");
            return back();
        }

        $product->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'size' => $request->size,
            'color' => $request->color,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $this->imageUpload($request, 'image', "/uploads/Turf/products/"),
        ]);
        Session::flash("success", "product successfully updated");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            Session::flash("warning", "Product not found");
            return back();
        }

        $product->delete();
        Session::flash("success", "Product successfully deleted");
        return back();
    }



    // Product Filter
    public function ProductFilter($id)
    {
        $branches = Branch::where("branch_owner_id", auth()->id())->get(['id', 'name']);
        if (!$branches) {
            Session::flash("warning", "No branches found");
            return back();
        }

        $branch = Branch::findOrFail($id);
        if (!$branch) {
            Session::flash("warning", "Branch not found");
            return back();
        }

        $products = Product::where('branch_id', $id)->paginate(20);
        if (!$branch) {
            Session::flash("warning", "No products found");
            return back();
        }

        return view("TurfOwner.products.filter", compact(["branches", "products"]));
    }
}
