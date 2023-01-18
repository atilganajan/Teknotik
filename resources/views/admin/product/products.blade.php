<x-app>
    <div class="container mt-4 px-2">

        <div class="mb-2 d-flex justify-content-between align-items-center">

            <div class="position-relative">
                <form action="{{route("product.index")}}" class="input-group mt-2" id="search_form" >
                    <input style="width: 18rem" name="search" class="form-control border" placeholder="Ürün ismine göre arama yapın..">
                    <button type="submit" id="search_button" class="input-group-text btn btn-sm  text-white" ><i class="fa fa-search  mx-2"></i></button>

                </form>
            </div>


            <div class="px-2 ">
                <a href="{{route("product.index")}}" class="btn btn-sm  btn-info me-3">Hepsi</a>
                <a href="{{route("product.show","draft")}}" class="btn btn-sm btn-warning" >Taslak asdas</a>
                <a href="{{route("product.show","publish")}}" class="btn btn-sm  btn-success" >Yayın</a>
                <a href="{{route("product.show","passive")}}" class="btn btn-sm  btn-danger " >Pasif</a>
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-responsive ">
                <thead>
                    <tr class="bg-light ">
                        <th scope="col" width="5%">#</th>
                        <th scope="col" class="text-center" width="20%">Ürün Ad</th>
                        <th scope="col" width="8%">Durum</th>
                        <th scope="col" width="8%"> Adet</th>
                        <th scope="col" width="10%"> Fiyat</th>
                        <th scope="col" width="12%">İndirimli Fiyat</th>
                        <th scope="col" width="10%">İndirim</th>
                        <th scope="col" width="15%">Bitiş Tarihi</th>
                        <th scope="col" class="text-center" width="10%"><span>İşlemler</span></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>
                                @switch($product->status)
                                    @case('publish')
                                        <span class="badge badge-success bg-success">Aktif</span>
                                    @break

                                    @case('passive')
                                        <span class="badge badge-danger bg-danger">Pasif</span>
                                    @break

                                    @case('draft')
                                        <span class="badge badge-warning bg-warning">Taslak</span>
                                    @break
                                @endswitch
                            </td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }} <i class="fa fa-try"></i></td>
                            <td>
                                @if ($product->discounted_price)
                                {{ $product->discounted_price }} <i class="fa fa-try"></i>
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if ($product->discount)
                                    {{ $product->discount }}%
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $product->product_finished_at }}</td>
                            <td class=" d-flex justify-content-center ">

                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary shadow-sm me-2"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger px-2 shadow-sm" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

</x-app>
