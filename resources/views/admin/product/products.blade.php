<x-app>
    <div class="container mt-5 px-2">

        <div class="mb-2 d-flex justify-content-between align-items-center">

            <div class="position-relative">
                <span class="position-absolute search"><i class="fa fa-search"></i></span>
                <input class="form-control w-100" placeholder="Search by order#, name...">
            </div>

            <div class="px-2">
                <span>Filters <i class="fa fa-angle-down"></i></span>
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-responsive ">
                <thead>
                    <tr class="bg-light ">
                        <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" class="text-center" width="20%">Ürün Ad</th>
                        <th scope="col" width="10%">Durum</th>
                        <th scope="col" width="10%"> Adet</th>
                        <th scope="col" width="10%"> Fiyat</th>
                        <th scope="col" width="20%">Bitiş Tarihi</th>
                        <th scope="col" class="text-center" width="20%"><span>İşlemler</span></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <th scope="row"><input class="form-check-input" type="checkbox"></th>
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
                            <td>{{ $product->product_finished_at }}</td>
                            <td class=" d-flex justify-content-center ">

                                <a href="{{route("product.edit",$product->id)}}" class="btn btn-sm btn-primary me-2"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger px-2" type="submit">
                                        <i class="fa fa-times"></i>
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
