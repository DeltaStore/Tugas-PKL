@extends('layouts.app')

@section('title')
    Delta Store
@endsection

@section('content')
    
    <!--Heading-->
    <header class="text">
      <div class="container">
        <h3>Cari Style Kamu Disini</h3>
        <h1>Hanya Disini</h1>
        <p>
          dapatkan aneka macam barang
          <br />
          dengan harga terjangkau dan berkualitas
        </p>
        <a href="#related" class="btn btn-shop-now px-4 mt-4"> Shop Now </a>
      </div>
    </header>

    <main>
      <section class="section-related mt-5" id="related">
        <div class="container">
          <div class="row">
            <div class="col text-center section-related-heading">
              <h2>Related Product</h2>
            </div>
          </div>
        </div>

        <section class="section-related-content" id="barang">
          <div class="container">
            <div class="section-related-barang row justify-content-center">
              @foreach ($items as $item)
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-barang text-center d-flex flex-column" 
                style="background-image: url('{{ $item->product_galleries->count() ? url($item->product_galleries->first()->photo) : ''}}');">
                
                  <div class="barang-button mt-auto">
                    <a href="{{route('detail',$item->slug)}}" class="btn btn-barang-details px-4"> View Details </a>
                  </div>
                </div>
                <div class="desc-barang text-center mt-3">
                  <div class="category-name">{{$item->type}}</div>
                  <h5>{{$item->name}}</h5>
                  <div class="desc-barang">Rp {{$item->price}}</div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </section>
      </section>

      <section class="section-related" id="product">
        <div class="container">
          <div class="row">
            <div class="col text-center section-related-heading">
              <h2>Recomended Product</h2>
            </div>
          </div>
        </div>

        <section class="section-related-content">
          <div class="container">
            <div class="section-related-barang row justify-content-center">
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-barang text-center d-flex flex-column" style="background-image: url('/frontend/image/Mikey.jpg')">
                  <div class="barang-button mt-auto">
                    <a href="detail" class="btn btn-barang-details px-4"> View Details </a>
                  </div>
                </div>
                <div class="desc-barang text-center mt-3">
                  <div class="category-name">Clothes</div>
                  <h5>Gamis-Dusty Grey</h5>
                  <div class="desc-barang">$10,00</div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-barang text-center d-flex flex-column" style="background-image: url('/frontend/image/Mikey.jpg')">
                  <div class="barang-button mt-auto">
                    <a href="detail" class="btn btn-barang-details px-4"> View Details </a>
                  </div>
                </div>
                <div class="desc-barang text-center mt-3">
                  <div class="category-name">Clothes</div>
                  <h5>Gamis-Dusty Grey</h5>
                  <div class="desc-barang">$10,00</div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-barang text-center d-flex flex-column"
                style="background-image: url('/frontend/image/Mikey.jpg')">
                  <div class="barang-button mt-auto">
                    <a href="detail" class="btn btn-barang-details px-4"> View Details </a>
                  </div>
                </div>
                <div class="desc-barang text-center mt-3">
                  <div class="category-name">Clothes</div>
                  <h5>Gamis-Dusty Grey</h5>
                  <div class="desc-barang">$10,00</div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-barang text-center d-flex flex-column" style="background-image: url('/frontend/image/Mikey.jpg')">
                  <div class="barang-button mt-auto">
                    <a href="detail" class="btn btn-barang-details px-4"> View Details </a>
                  </div>
                </div>
                <div class="desc-barang text-center mt-3">
                  <div class="category-name">Clothes</div>
                  <h5>Gamis-Dusty Grey</h5>
                  <div class="desc-barang">$10,00</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>

      <!--Section Instagram-->
      <section class="photo-instagram">
      <div class="">
        <div class="">
          <div class="instagram-item set-bg">
            <img src="frontend/image/Men1.png" alt="" />
            <div class="inside-text">
              <i class="fa fa-instagram"></i>
              <h5><a href="">Delta_Gallery</a></h5>
            </div>
          </div>
        </div>
       <div class="">
        <div class="instagram-item set-bg">
          <img src="frontend/image/Women1.png" alt="" />
          <div class="inside-text">
            <i class="fa fa-instagram"></i>
            <h5><a href="">Delta_Gallery</a></h5>
          </div>
        </div>
       </div>
        <div class="">
          <div class="instagram-item set-bg">
            <img src="frontend/image/men2.png" alt="" />
            <div class="inside-text">
              <i class="fa fa-instagram"></i>
              <h5><a href="">Delta_Gallery</a></h5>
            </div>
          </div>
        </div>
         <div class="">
          <div class="instagram-item set-bg">
            <img src="frontend/image/women2.png" alt="" />
            <div class="inside-text">
              <i class="fa fa-instagram"></i>
              <h5><a href="">Delta_Gallery</a></h5>
            </div>
          </div>
         </div>
      </div>
      </section>


      <!--Networks-->

      <section class="section-networks">
        <div class="container">
          <div class="row">
            <div class="col md-8 text-center">
              <img src="frontend/image/Branded.png" alt="" />
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection