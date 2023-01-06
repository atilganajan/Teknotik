<x-app>
    <div class="row justify-content-center">
        <div class="bg-secondary bg-opacity-25 p-5 col-md-9  ">

            <header class="text-center mb-4">
                <h2 class="text-2xl font-bold ">
                    Ana Kategori Güncelle
                </h2>
            </header>
            <form action="{{ route("main-category.update",$mainCategory->id)}}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="title" class="form-label">Ana Kategori Adı</label>
                    <input type="text" name="title" class="form-control shadow-sm" id="title"
                        value="{{$mainCategory->title}}">
                    @error('title')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Güncelle</button>
            </form>

        </div>
    </div>
</x-app>