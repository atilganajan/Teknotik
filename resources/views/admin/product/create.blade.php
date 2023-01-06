<x-app>
    <div class="row justify-content-center">
        <div class="bg-secondary bg-opacity-25 p-5 col-md-9  ">

            <header class="text-center mb-4">
                <h2 class="text-2xl font-bold ">
                    Ürün Oluştur
                </h2>
            </header>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class=" col-lg-4">
                        <label for="image1" class="form-label">Ürün Fotoğrafı-1 &nbsp; &nbsp; <small
                                class="text-danger ">zorunlu alan</small> </label>
                        <input type="file" name="image1" class="form-control shadow-sm ">
                        @error('image1')
                            <p class="text-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-2 mt-lg-0">
                        <label for="image2" class="form-label">Ürün Fotoğrafı-2 &nbsp; &nbsp; <small
                                class="opacity-75">isteğe bağlı </small></label>
                        <input type="file" name="image2" class="form-control shadow-sm ">
                    </div>
                    <div class="col-lg-4 mt-2 mt-lg-0">
                        <label for="image3" class="form-label">Ürün Fotoğrafı-3 &nbsp; &nbsp; <small
                                class="opacity-75">isteğe bağlı </small></label>
                        <input type="file" name="image3" class="form-control shadow-sm ">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Ürün Adı</label>
                    <input type="text" name="title" class="form-control shadow-sm" id="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama</label>
                    <textarea name="description" class="form-control shadow-sm" id="description" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Ürün Adeti</label>
                    <input type="number" name="quantity" class="form-control shadow-sm" id="quantity"
                        value="{{ old('quantity') }}">
                    @error('quantity')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="price" class="form-label  absolute">Ürün Fiyatı</label>
                    <div class="input-group">
                        <input type="number" name="price" class="form-control shadow-sm" id="price"
                            value="{{ old('price') }}">
                        <span class="input-group-text">TL</span>
                    </div>
                    @error('price')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-3">
                    <label for="mainCategory" class="form-label  absolute">Ana Kategori</label>
                    <div class="input-group">
                        <select id="mainCategory" class=" shadow-sm form-select">
                            <option value="" selected>Seçiniz...</option>
                            @foreach ($mainCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="sub_category_id" class="form-label  absolute">Alt Kategori</label>
                    <div class="input-group">
                        <select id="subCategory" name="sub_category_id" class=" shadow-sm form-select">
                            <option value="" selected>Seçiniz...</option>
                            @foreach ($subCategories as $category)
                                <option style="display: none" id="{{ $category->main_category_id }}"
                                    value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('sub_category_id')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary shadow-sm w-100">Oluştur</button>
            </form>

        </div>
    </div>
</x-app>

<slot name="js">
    <script>
        $("#mainCategory").change(function() {
            $('#subCategory > option').map((i, option) => {
                $(option).hide();
                if (option.id == $(this).val()) {
                    $(option).show();
                }
            });
        })
    </script>
</slot>
