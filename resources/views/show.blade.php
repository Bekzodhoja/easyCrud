@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="col m-4">

            <div class="card" style="width: 18rem;">
              {{-- {{ dd($product) }} --}}
                <img src="/storage/{{ $product->image }}" class="card-img-top" alt="">
                
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ $product->quantity }}</p>
                  <a href="{{ route("product.index") }}" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

        </div>
    </div>
</div>