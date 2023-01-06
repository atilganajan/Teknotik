<x-app>
    <div class="  m-4 px-2">



        <table class="table table-bordered">
                <thead>
                  <tr class="bg-light ">
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Sipariş tarihi</th>
                    {{-- <th class="text-center" scope="col">İsim</th> --}}
                    <th class="text-center" scope="col">Adres</th>
                    <th class="text-center" scope="col">Toplam Fiyat</th>
                    <th class="text-center" scope="col">Sipariş Durum</th>
                    <th class="text-center" >İndirimli Fiyat</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">{{ $order->created_at }}</td>
                            {{-- <td class="text-center">{{ $order->name }} {{ $order->surname }}</td> --}}
                            <td class="text-center"> {{ substr($order->address, 0, 15) . '...' }}</td>
                            <td class="text-center">{{ $order->total }}<i class="fa fa-try"></i> </td>
                            <td class="text-center">
                                @switch($order->status)
                                    @case('waiting')
                                        <span class="badge badge-success bg-danger">Onay Bekliyor</span>
                                    @break

                                    @case('accept')
                                        <span class="badge badge-danger bg-info">Onaylandı</span>
                                    @break

                                    @case('prepare')
                                        <span class="badge badge-warning bg-secondary">Hazırlanıyor</span>
                                    @break

                                    @case('shipped')
                                        <span class="badge badge-warning bg-warning">Kargoya Verildi</span>
                                    @break
                                    
                                    @case('delivered')
                                        <span class="badge badge-warning bg-success">Teslim Edildi</span>
                                    @break
                                    @case('cancelled')
                                    <span class="badge badge-warning bg-danger">İptal Edildi</span>
                                @break
                                @endswitch
                            </td>
                            <td class="text-center"><a href="{{route("order.adminOrderDetail",$order->id)}}" class="btn btn-secondary shadow-sm">Sipariş Detayı ve Güncelleme</a> </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

     
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>

</x-app>
