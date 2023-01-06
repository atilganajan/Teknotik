<x-app>

    <section class="" style="background-color: #eee; ">
        <div class="container py-2 ">
            <div class="row   ">
                @foreach ($orders as $order)
                    <div class="col-lg-6 mt-3  ">
                        <div class="card border-top border-bottom border-3 " style="border-color: #f37a27 !important;">

                            @if ($order->status == 'cancelled')
                                <div style="top: 45%; left:7%; color:#ff0000" class="position-absolute text-center ">
                                    <h1><u><b>SİPARİŞİNİZ İPTAL EDİLDİ</b></u></h1>
                                </div>
                            @endif


                            <div class="card-body p-3 @if ($order->status == 'cancelled') opacity-25 @endif">


                                <div class="row">
                                    <p class="lead fw-bold mb-5 col-8" style="color: #f37a27;">Satın Alma Fişi</p>
                                    <p class="col-4">{{ $order->name }}</p>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <p class="small text-muted mb-1">Tarih</p>
                                        <p>{{ $order->created_at }}</p>
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
                                            <div class="col-2 ">
                                                <img src="{{ $item->product->image1 }}" width="45rem" alt="">
                                            </div>
                                            <div class="col-5 ">
                                                <p>{{ $item->product->title }}</p>
                                            </div>
                                            <div class="col-1">
                                                {{ $item->quantity }}
                                            </div>
                                            <div class="col-4 ">
                                                @if ($item->product_discounted_price)
                                                    <s>{{ $item->product_price }}<i class="fa fa-try"></i></s>
                                                    <b class="text-danger">{{ $item->product_discounted_price }}<i
                                                            class="fa fa-try"></i></b>
                                                @else
                                                    <b>{{ $item->product_price }}</b>
                                                @endif
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
                                                <div class="col-6 mt-0"><b>Ödediğiniz Tutar:</b></div>
                                                <div class="lead fw-bold mb-0 col-6" style="color: #f37a27;">
                                                    {{ $order->total }}<i class="fa fa-try"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Sipariş Takibi</p>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div
                                            class="border @if ($order->status == 'prepare') border-success tracking2
                                             @elseif($order->status == 'shipped')border-success tracking3   
                                             @elseif($order->status == 'delivered')border-success @endif">
                                        </div>
                                        <div class="horizontal-timeline ">

                                            <ul class="list-inline items d-flex justify-content-between">
                                                <li
                                                    class="list-inline-item items-list  @if ($order->status !== 'waiting') first-li @endif  ">
                                                    <p class="py-1 px-2 rounded text-white"
                                                        style="background-color: #f37a27;"><small>
                                                            @if ($order->status == 'waiting')
                                                                Onay Bekliyor
                                                            @else
                                                                Onaylandı
                                                            @endif
                                                        </small></p>
                                                </li>
                                                <li
                                                    class="list-inline-item items-list @if ($order->status == 'prepare' || $order->status == 'shipped' || $order->status == 'delivered') second-li @endif ">
                                                    @if ($order->status == 'prepare' || $order->status == 'shipped' || $order->status == 'delivered')
                                                        <p class="py-1 px-2 rounded text-white"
                                                            style="background-color: #f37a27;">
                                                            <small>Hazırlanıyor</small>
                                                        </p>
                                                    @endif

                                                </li>
                                                <li
                                                    class="list-inline-item items-list @if ($order->status == 'shipped' || $order->status == 'delivered') third-li @endif ">
                                                    @if ($order->status == 'shipped' || $order->status == 'delivered')
                                                        <p class="py-1 px-2 rounded text-white"
                                                            style="background-color: #f37a27;"> <small>Kargoya
                                                                Verildi</small></p>
                                                    @endif

                                                </li>
                                                <li class="list-inline-item items-list text-end @if ($order->status == 'delivered') last-li @endif "
                                                    style="margin-right: 8px;">
                                                    <p style="margin-right: -8px; "style="">
                                                        @if ($order->status == 'delivered')
                                                            <small class="text-success"><b>Teslim Edildi <i
                                                                        class="fa fa-smile "></i></b></small>
                                                        @endif
                                                    </p>
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>

</x-app>
