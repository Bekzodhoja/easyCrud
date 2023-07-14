

@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col m-4">
            <div class="">
                <div>
            <h1>Add new Product</h1>
        </div>
     
        </div>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @method('Post')
            @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="name">
          </div>
          <div class="mb-3">
            <label  class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" placeholder="quantity">
          </div>
          <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" name="image" class="form-control" placeholder="image">
          </div>
          <div>
            <button class="btn btn-success" type="submit">Save</button>
          </div>
        </form>
        </div>
    </div>
</div>