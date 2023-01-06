<x-app>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container h-100 py-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px;">
                        <div class="card-body text-black">

                            <div class="row justify-content-center">
                                @if ($cart)
                                    <div id="cartParent" class="col-lg-6 px-5 py-4">



                                        <div class="d-flex align-items-center row mb-5">

                                            @foreach ($cart->items as $item)
                                                <x-cart-item :item="$item" />
                                            @endforeach
                                        </div>
                                        <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                                        <div class="d-flex justify-content-between px-x">
                                            <p class="fw-bold"> İndirimsiz Fiyat:</p>
                                            <p class="fw-bold"><span id="baseTotal">{{ $cart->basetotal }}</span><i
                                                    class="fa fa-try"></i></p>
                                        </div>
                                        <div class="d-flex justify-content-between px-x">
                                            <p class="fw-bold">Toplam İndirim:</p>
                                            <p class="fw-bold text-success"><span
                                                    id="totalDiscount">{{ $cart->discount }}</span><i
                                                    class="fa fa-try"></i></p>
                                        </div>
                                        <div class="d-flex justify-content-between p-2 mb-2"
                                            style="background-color: #e1f5fe;">
                                            <h5 class="fw-bold mb-0">Toplam:</h5>
                                            <h5 class="fw-bold mb-0"><span id="total">{{ $cart->total }}</span><i
                                                    class="fa fa-try"></i></h5>
                                        </div>

                                    </div>


                                    <div id="formDiv"class="col-lg-6 px-5 py-4">
                                        <h3 class="text-center fw-bold">{{ $cart->user->name }}</h3>
                                        <h3 class="mb-5 pt-2 text-center fw-bold ">Alışveriş Sepetin</h3>
                                        <form action="{{route("order.createOrder")}}" method="POST">
                                          @csrf
                                            <div class="form-outline mb-3">
                                                <label class="form-label" ><i class="fa fa-phone" ></i> Telefon </label>
                                                <input type="number" placeholder="+90xxxxxxxxxx " name="phone"
                                                    class="form-control border" />
                                                    @error('Telefon')
                                                    <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-3">
                                                <label class="form-label" > <i class="fa fa-address-card" ></i> Adres</label>
                                                <textarea name="address" class="form-control border" rows="4"></textarea>
                                                @error('address')
                                                <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                                            @enderror
                                            </div>
                                            <button class="btn btn-success shadow-sm w-100 mt-2" type="submit">Sipariş Ver</button>
                                        </form>
                                    </div>

                                    <h1 id="emptyCartMessage" class="d-flex justify-content-center"></h1>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <h1>Sepetiniz Boş</h1>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app>

<slot name="js">
    <script type="text/javascript">
        $('.stepUp').click( async function() {
            const id = $(this).data('id');
            const productQuantity = parseInt($(`.quantity${id}`).data("quantity"));
            const productInputValue = parseInt($(`.quantity${id}`).val());

            if (productQuantity < productInputValue) {
                $(`.quantity${id}`).val(productQuantity);
                $(`.cart-item-message${id}`).html("Mevcut stok sayısından fazla sepetinize ekleyemezsiniz");
                setTimeout(() => {
                    $(`.cart-item-message${id}`).html("")
                }, 3000);
                return false;
            } else {
              try {
                let res=await  axios.post(`/user/cart/add-to-cart/${id}`)
                    
                    const baseTotal = res.data.baseTotal;
                    const cartItemQuantity = (res.data.cartItemQuantity + 1);
                    const totalDiscount = res.data.totalDiscount;
                    const total = res.data.total;

                    const isDiscountPrice = $(`#discountPrice${id}`).html();

                    if (isDiscountPrice === undefined) {
                        const cartItemTotal = (parseInt($(`#price${id}`).html()) * cartItemQuantity);
                        $(`#cartItemTotal${id}`).html(cartItemTotal);
                    } else {
                        const cartItemTotal = (parseInt($(`#discountPrice${id}`).html()) *
                            cartItemQuantity);
                        $(`#cartItemIncludeDiscountTotal${id}`).html(cartItemTotal);
                    }

                    $('#baseTotal').html(baseTotal);
                    $('#totalDiscount').html(totalDiscount);
                    $('#total').html(total);
                
              } catch (error) {
                console.log(error)
              }
            }
        });

        $('.stepDown').click(function() {
            const id = $(this).data('id');

            axios.get(`/user/cart/remove-cart-item-one/${id}`).then((res) => {
                if (res.data.isEmpty) {
                    $(this).closest("#cartParent").remove();
                    $("#formDiv").hide();
                    $('#emptyCartMessage').html(res.data.message);
                } else {
                    if (res.data.removedProductId) {
                        $(this).closest(".cart-item").remove();
                    }
                    const baseTotal = res.data.baseTotal;
                    const cartItemQuantity = res.data.cartItemQuantity;
                    const totalDiscount = res.data.totalDiscount;
                    const total = res.data.total;

                    const isDiscountPrice = $(`#discountPrice${id}`).html();

                    if (isDiscountPrice === undefined) {
                        const cartItemTotal = (parseInt($(`#price${id}`).html()) * cartItemQuantity);
                        $(`#cartItemTotal${id}`).html(cartItemTotal);
                    } else {
                        const cartItemTotal = (parseInt($(`#discountPrice${id}`).html()) *
                            cartItemQuantity);
                        $(`#cartItemIncludeDiscountTotal${id}`).html(cartItemTotal);
                    }

                    $('#baseTotal').html(baseTotal);
                    $('#totalDiscount').html(totalDiscount);
                    $('#total').html(total);
                }

            }).catch((err) => console.log(err));
        });

        $('.removeCartItem').click(function() {
            const id = $(this).data('id');
            axios.get(`/user/cart/remove-cart-item/${id}`).then((res) => {
                if (res.data.isEmpty) {
                    $(this).closest("#cartParent").remove();
                    $("#formDiv").hide();
                    $('#emptyCartMessage').html(res.data.message);
                   
                } else {
                    $(this).closest(".cart-item").remove();

                    const baseTotal = res.data.baseTotal;
                    const totalDiscount = res.data.totalDiscount;
                    const total = res.data.total;

                    $('#baseTotal').html(baseTotal);
                    $('#totalDiscount').html(totalDiscount);
                    $('#total').html(total);
                }

            });

        });
    </script>

</slot>
