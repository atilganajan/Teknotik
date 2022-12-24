<div class="col-lg-3 col-md-4 col-6 mb-4">
    <div class="card">
        <div class="bg-image  " data-mdb-ripple-color="light">
            <img src="{{$product->image1}}"
                class="w-100 overflow-hidden" style="height: 16rem" />
            
                <div class="mask">
                    <div class="d-flex justify-content-between align-items-end h-100">
                        <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                        <h5><span class="badge bg-secondary me-2"><small>mevcut: <b>{{$product->quantity}}</b></small></span></h5>
                    </div>
                </div>   
        </div>
        <div class="card-body">
            <a href="" class="text-reset">
                <h5 class="card-title mb-3">{{$product->title}}</h5>
            </a>
            <a href="" class="text-reset">
                <p>Category</p>
            </a>
            <h6 class="mb-3">
                <s>{{$product->price}}</s><strong class="ms-2 text-danger">$50.99</strong>
            </h6>
            <button class="btn btn-success w-100" type="button"><i class="fa fa-shopping-cart fa-lg me-2 "></i><span class="ms-1">Sepete ekle</span></button>
        </div>
    </div>
</div>

