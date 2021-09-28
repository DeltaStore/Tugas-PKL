@extends('layouts.checkout')
@section('title')
    Checkout
@endsection

@section('content')
     <!--Detail Page-->

    <!--Breadcrumb-->
    <main>
      <div class="section-details-header">
        <div class="section-details-barang">
          <div class="container">
            <div class="row">
              <div class="col p-0">
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home Page</li>
                    <li class="breadcrumb-item active">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 pl-lg-0">
                <div class="card card-checkout mt-4">
                  <div class="attendee">
                    <table class="table table-responsive-sm text-center">
                      <thead>
                        <tr>
                          <td>Image</td>
                          <td>Product Name</td>
                          <td>Price</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($item->details as $detail)
                       <tr>
                        <td>
                          <img src="{{$detail->product->product_galleries->first()->photo}}" height="60" />
                        </td>
                        <td class="align-middle">{{$detail->product->name}}</td>
                        <td class="align-middle">{{$detail->product->price}}</td>
                        <td class="align-middle">
                          <a href="{{route('checkout-remove',$detail->id)}}">
                            <img src="frontend/image/cross.png" alt="" />
                          </a>
                        </td>
                      </tr>
                       @empty
                           <tr>
                             <td colspan="6" class="text-center">
                               No Product in Here..
                             </td>
                           </tr>
                       @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-checkout card-right mt-4">
                  <table class="information">
                    <tr>
                      <th width="50%">ID Transaction</th>
                      <td width="50%" class="text-right">{{$item->id}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Sub Total</th>
                      <td width="50%" class="text-right">{{$item->transaction_total}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Pajak</th>
                      <td width="50%" class="text-right">5%</td>
                    </tr>
                    <tr>
                      <th width="50%">Total Biaya</th>
                      <td width="50%" class="text-right">{{$item->transaction_total}}</td>
                    </tr>
                    <tr>
                      <th width="50%">Bank Transfer</th>
                      <td width="50%" class="text-right">Gopay , Ovo , Dana</td>
                    </tr>
                    <tr>
                      <th width="50%">No Rekening</th>
                      <td width="50%" class="text-right">082329547489</td>
                    </tr>
                    <tr>
                      <th width="50%">Nama Penerima</th>
                      <td width="50%" class="text-right">Yoko Surya Wiguna</td>
                    </tr>
                  </table>
                </div>
                <div class="join-container">
                  <a href="{{route('checkout-success',$item->id)}}" class="btn btn-block btn-payment mt-4 py-2" type="submit"> I Already Pay </a>
                </div>
               
              </div>
              <div class="informasi col-lg-6 mt-5">
                <h4>Informasi Pembeli</h4>
                <div class="user-info">
                  <form class="form" method="POST" action="{{route('checkout-create',$item->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" value="{{old('name')}}" placeholder="Masukan Nama" />
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="text" class="form-control" @error('email') is-invalid @enderror id="email" name="email" value="{{old('email')}}" aria-describedby="emailhelp" placeholder="Masukan Email" />
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="phone">Nomor Hp</label>
                      <input type="number" class="form-control"  @error('phone') is-invalid @enderror id="phone"  name="phone" value="{{old('phone')}}" aria-describedby="phone" placeholder="Masukan Nomor Hp" />
                      @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="adress">Alamat Lengkap</label>
                      <textarea class="form-control" name="adress" @error('adress') is-invalid @enderror id="adress" rows="5"  placeholder="Masukan Alamat Rumah Anda..."></textarea>
                      @error('adress')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                   <div class="form-group">
                     <button type="submit" class="btn btn-simpan btn-block text-white">Simpan</button>
                   </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection