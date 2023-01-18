<div class="col-lg-3 col-md-4 col-6 mb-4">
    <div class="card">
        <div class="bg-image " data-mdb-ripple-color="light">
          <div class="img-hover"><a  href="{{ route('productDetail', $product->id) }}">
            <img src="{{ $product->image1 }}" class="w-100 overflow-hidden" style="height: 16rem" /></a></div>

            <div class="mask asds">
                <div class="d-flex justify-content-between align-items-end h-100">
                    @if ($product->discount)
                        <h5><span class="badge bg-danger ms-2 mt-1">{{ $product->discount }} %</span></h5>
                        <h5><span class="badge bg-secondary  me-2 mt-1"><small>mevcut:
                                    <b>{{ $product->quantity }}</b></small></span></h5>
                        {{-- id="product-qty-{{$product->id}}"  --}}
                    @else
                        <div></div>
                        <h5><span class="badge bg-secondary  me-2 mt-2"><small>mevcut:
                                    <b>{{ $product->quantity }}</b></small></span></h5>
                        <div></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="title-hover" >
                <a href="{{ route('productDetail', $product->id) }}" class="text-reset text-decoration-none">
                    <h5 class="card-title mb-3">{{ $product->title }}</h5>
                </a>
            </div>
            <div class="category-hover">
                <a class="text-decoration-none" href="/?category={{ $product->category->id }}">
                    <p>{{ $product->category->title }}</p>
                </a>
            </div>
            <h6 class="mb-3">
                @if ($product->discount)
                    <s>{{ $product->price }}<i class="fa fa-try"></i></s><strong class="ms-2 text-danger">
                        {{ $product->discounted_price }}<i class="fa fa-try"></i></strong>
                @else
                    </s><strong class="ms-2 text-dark">{{ $product->price }}<i class="fa fa-try"></i></strong>
                @endif
            </h6>


            <button  @if (auth()->user()) @if (auth()->user()->type === 'user') @else disabled  @endif @endif  class="btn btn-success w-100 basketAddBtn shadow-sm" data-id="{{ $product->id }}">
                <i class="fa fa-shopping-cart fa-lg me-2 "></i><span class="ms-1">Sepete ekle</span></button>

        </div>
    </div>
</div>
