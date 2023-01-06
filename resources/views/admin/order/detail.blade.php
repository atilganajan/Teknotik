<x-app>

    <section class="" style="background-color: #eee;">
        <div class="container py-5 ">
            <div class="row  justify-content-center  ">
                <div class="col-lg-8 mt-3 mt-lg-0">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                        <div class="card-body p-3">

                            <div class="row">
                                @if ( $order->status == 'cancelled')
                                    <div class="d-flex justify-content-center">
                                        <small class="text-danger"><i class="fa fa-times"></i> Ürün siparişi İptal
                                            edildi
                                        </small>
                                    </div>
                                @endif
                                @if ($order->status == 'delivered' )
                                <div class="d-flex justify-content-center">
                                    <small class="text-success"><i class="fa fa-check"></i> Ürün siparişi Teslim
                                        edildi
                                    </small>
                                </div>
                                @endif
                                <p class="lead fw-bold mb-5 col-8" style="color: #f37a27;">Satın Alma Fişi</p>
                                <p class="col-4">
                                    {{ $order->name }}

                                </p>

                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Tarih</p>
                                    <p>{{ $order->created_at }}</p>
                                </div>
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Telefon No.</p>
                                    <p>{{ $order->phone }}</p>
                                </div>
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Sipariş No.</p>
                                    <p>{{ $order->id }}</p>
                                </div>
                                <div class=" mb-3">
                                    <p class="small text-muted mb-1">Adres</p>
                                    <p>{{ $order->address }}</p>
                                </div>
                            </div>

                            <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                <div class="row">
                                    @foreach ($order->items as $item)
                                        <div class="row mt-1">
                                            <div class="col-2 ">
                                                <img src="{{ $item->product->image1 }}" width="55rem" alt="">
                                            </div>
                                            <div class="col-5 ">
                                                <p>{{ $item->product->title }}</p>
                                            </div>
                                            <div class="col-1">
                                                {{ $item->quantity }}
                                            </div>
                                            <div class="col-4 ">
                                                @if ($item->product_discounted_price)
                                                    <s>{{ $item->product->product_price }}<i class="fa fa-try"></i></s>
                                                    <b class="text-danger">{{ $item->product_discounted_price }}<i
                                                            class="fa fa-try"></i></b>
                                                @else
                                                    <b>{{ $item->product_price }}</b>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row mt-3 mb-2">
                                        <div class="d-flex justify-content-center">
                                            <hr style="height: 3px; color: #240345;" class="mt-2 w-100">
                                        </div>
                                        <div class="row ">
                                            <div class="col-6"><b>Toplam Fiyat:</b></div>
                                            <div class="lead fw-bold mb-0 col-6">{{ $order->base_total }}<i
                                                    class="fa fa-try"></i></div>
                                            <div class="col-6"><b>Toplam İndirim:</b></div>
                                            <div class="lead fw-bold mb-0 col-6">{{ $order->total_discount }}<i
                                                    class="fa fa-try"></i></div>
                                            <hr class="w-75">
                                            <div class="col-6 mt-0"><b>Ödenen Tutar:</b></div>
                                            <div class="lead fw-bold mb-0 col-6" style="color: #f37a27;">
                                                {{ $order->total }}<i class="fa fa-try"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @if ($order->status == 'delivered' || $order->status == 'cancelled')
                            @else
                                <div class="my-3">
                                    <form action="{{ route('order.adminOrderStatusUpdate', $order->id) }}"
                                        method="post">
                                        @method('PUT')
                                        @csrf
                                        <select class="form-select shadow-sm " value="{{ $order->status }}"
                                            name="status">
                                            <option @if ($order->status == 'waiting') selected @endif value="waiting">
                                                Onay Bekliyor</option>
                                            <option @if ($order->status == 'accept') selected @endif value="accept">
                                                Sipariş Onay</option>
                                            <option @if ($order->status == 'prepare') selected @endif value="prepare">
                                                Hazırlanıyor</option>
                                            <option @if ($order->status == 'shipped') selected @endif value="shipped">
                                                Kargoya verildi</option>
                                            <option @if ($order->status == 'delivered') selected @endif value="delivered">
                                                Teslim edildi</option>
                                            <option @if ($order->status == 'cancelled') selected @endif value="cancelled">
                                                Sipariş İptal</option>
                                        </select>
                                        <button type="submit" class="btn btn-success shadow-sm mt-2 w-100">Güncelle</button>
                                    </form>
                                </div>
                            @endif



                        </div>
                    </div>
                </div>

            </div>
    </section>

</x-app>
