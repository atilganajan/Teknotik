<x-app>
    <div class="container mt-5 px-2">


        <div class="table-responsive">
            <table class="table table-bordered table-responsive ">
                <thead>
                    <tr class="bg-light ">
                        <th scope="col" class="text-center" >#</th>
                        <th scope="col" class="text-center">Alt kategori Adı</th>
                        <th scope="col" class="text-center" ><span>İşlemler</span></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($subCategories as $category)
                        <tr>
                            <td class="text-center">{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                           
                            <td class=" d-flex justify-content-center ">
                                <a href="{{route("sub-category.edit",$category->id)}}" class="btn btn-sm btn-primary me-2"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('sub-category.destroy', $category->id) }}" method="POST">
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
            {{ $subCategories->links() }}
        </div>
    </div>

</x-app>
