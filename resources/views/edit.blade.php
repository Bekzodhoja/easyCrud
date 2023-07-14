

@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col m-4">
            <div class="">
                <div>
            <h1>Edit Productt</h1>
        </div>
        </div>
        <form action="{{ route("product.update" ,$product->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}"  placeholder="name">
          </div>
          <div class="mb-3">
            <label  class="form-label">Quantity</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"  placeholder="quantity">
          </div>
          <div class="mb-3">
            <label  class="form-label">Image: </label>
            <img width="80px" class="m-2" src="/storage/{{ $product->image }}" alt="">
            <input type="file" name="image" class="form-control"  placeholder="image">
          </div>
          <div>
            <button class="btn btn-success" type="submit">Save</button>
          </div>
        </form>
        </div>
    </div>
</div>