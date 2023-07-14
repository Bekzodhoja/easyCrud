@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col m-4">
            <div class="">
                <div>
            <h1>Products</h1>
        </div>
        <div>
            <a href="{{ route("product.create") }}" class="btn btn-primary my-4">Create new Product</a>

        </div>
        </div>
            <table class="table my-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                  <tr>
                    <th scope="row">  
                   
                      {{ $product->id }}   </th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>  <a href="{{ route("product.show",$product->id) }}"> 
                        <img width="80px" src="storage/{{ $product->image }}" alt="">
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-success" href="{{ route("product.edit", $product->id) }}">Edit</a>
                      <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                      
                      </form>
                    </td>
                  </tr>
            

                  @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>