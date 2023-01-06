<x-app>
    <div class="row justify-content-center">
        <div class="bg-secondary bg-opacity-25 p-5 col-md-9  ">

            <header class="text-center mb-4">
                <h2 class="text-2xl font-bold ">
                    Alt Kategori Oluştur
                </h2>
            </header>
            <form action="{{ route('sub-category.update',$subCategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="main_category_id" class="form-label">Ana Kategori Seçiniz</label>
                    <select class="form-control form-select" name="main_category_id" required>
                        <option  disabled selected>Ana Kategori Seçiniz...</option>
                        @foreach ($mainCategories as $category)
                            <option @if ($category->id==$subCategory->main_category_id)
                                selected
                            @endif value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('main_category_id')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Alt Kategori Adı</label>
                    <input required type="text" name="title" class="form-control shadow-sm" id="title"
                        value="{{ $subCategory->title }}">
                    @error('title')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Güncelle</button>
            </form>

        </div>
    </div>
</x-app>
