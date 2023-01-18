<div class="row mt-2 cart-item">
    <div class="flex-shrink-0 col-3">
        <img src="{{ $item->product->image1 }}" class="img-fluid" style="width: 8rem; height:7rem">
    </div>

    <div class="col-9 ">
        Değişiklik 2
        <a  data-id="{{$item->product->id}}"  class="float-end text-black btn removeCartItem "><i class="fas fa-times"></i></a>
        <h5 class="text-primary">{{ $item->product->title }}</h5>
        <div class="d-flex align-items-between">
            <div>
                <p class="fw-bold mb-0 me-2 ">
                    @if ($item->product->discounted_price)
                        <s>{{ $item->product->price }}<i class="fa fa-try"></i></s> <span
                            class="text-danger" > <span id="discountPrice{{$item->product->id}}">{{$item->product->discounted_price}}</span><i class="fa fa-try"></i></span>
                    @else
                        <span class="me-5"><span id="price{{$item->product->id}}">{{$item->product->price}}</span><i class="fa fa-try"></i></span>
                    @endif
                </p>
            </div>

            <div class=" def-number-input number-input safari_only d-flex  justify-content-end">
                <button data-id="{{$item->product->id}}"    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    class="minus stepDown mt-2"></button>
                <input class="quantity{{$item->product->id}} fw-bold text-black" data-quantity="{{$item->product->quantity}}" min="0" name="quantity" value="{{ $item->quantity }}"
                    type="number" disabled>
                <button data-id="{{$item->product->id}}"   onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                     class="plus stepUp mt-2"></button>
            </div>
        </div>
        <div>Toplam: @if ($item->product->discounted_price)
           <b> <span id="cartItemIncludeDiscountTotal{{$item->product->id}}" >{{$item->quantity*$item->product->discounted_price}}</span><i class="fa fa-try" ></i></b> 
            @else
            <b><span id="cartItemTotal{{$item->product->id}}" >{{$item->quantity*$item->product->price}}</span><i class="fa fa-try" ></i></b>
        @endif</div>
        <small class="text-danger cart-item-message{{$item->product->id}}"></small>
    </div>
    Farklı değişiklik ddd
</div>
