<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Color;

class ProductController extends Controller
{
    public function list(){
        $products = Product::all();
        return view ("products-list", compact('products'));
    }

    public function detail($id){
      $product = Product::find($id);
      return view("productsdetails", compact('product'));
    }

//Para crear un producto

    public function createProduct(){
      $colors=Color::all();
      $brands = Brand::all();
      $categories = Category::all();
      return view ("new-product", compact('colors', 'brands', 'categories'));
    }

    public function uploadProduct(Request $req){

      // $rules=[
      //   'name' => 'required|string|unique:products',
      //   'brand' => 'required|string',
      //   'category' => 'required|string',
      //   'description' => 'required|string|min:50|unique:products',
      //   'price' => 'required',
      //   'image' => 'required|image',
      //   'color_id' => 'numeric',
      // ];
      // $msj=[
      //   'unique' => 'El campo :attribute se encuentra registrado',
      //   'string' => 'El campo :attribute debe ser un texto',
      //   'min' => 'El campo :attribute tiene un minimo  de :min caracteres',
      //   'required' => 'El campo :attribute debe ser obligatorio',
      //   'price' => 'El campo :attribute debe ser decimal',
      //   'image' => 'El campo :attribute debe ser una imagen',
      //   'numeric' => 'El campo :attribute debe ser un numero',
      // ];
      //
      // $this->validate($req,$rules,$msj);

//Sube la imagen a "uploads" en storage/app/public

      $imagePath= $req["image"]->store("uploads","public");

//INGRESA LOS VALORES REDACTADOS EN EL FORMULARIO

      $newProduct = new Product();
      $newProduct->name = $req['name'];
      $newProduct->brand = $req['brand'];
      $newProduct->category = $req['category'];
      $newProduct->description = $req['description'];
      $newProduct->color_id = $req['color_id'];
      $newProduct->image = $imagePath;
      $newProduct->save();
      $products = Product::all();

      return view ("products-list", compact('products'));
    }

//Para borrar producto

    public function delete(Request $req){
      $id = $req["id"];
      $product = Product::find($id);
      $product->delete();
      return redirect('products-list');
    }

//Para editar los datos de la DB

    public function edit(Product $product){
      $colors = Color::all();
      return view ("product-edit",compact('product', 'colors'));
    }

//Actualiza los datos de la DB

    public function updateProduct(Product $product){
      $data = request()->validate([
        'name'  => 'required',
        'description' => 'required',
        'brand' => '',
        'category' => '',
        'image' => '',
        'color_id' => 'required',
      ]);

//Si se recibe imagen del form se guarda en "uploads"
    if (request('image')) {
      $imagePath = request('image')->store('uploads','public');

    }
// ARRAY MERGE PERMITE MODIFICAR EL VALOR DE "IMAGE" PARA PASARLE EL DE $IMAGEPATH
      $product->update(array_merge($data,['image'=> $imagePath]));

      $products = Product::all();
    return view('products-list', compact('products'));
   }
}
