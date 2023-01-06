<x-app>
    <div class="row justify-content-center">
        <div class="bg-secondary bg-opacity-25 p-5 col-md-9  ">

            <header class="text-center mb-4">
                <h2 class="text-2xl font-bold ">
                   Ana Kategori Oluştur
                </h2>
            </header>
            <form action="{{ route("main-category.store") }}"  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Ana Kategori Adı</label>
                    <input type="text" name="title" class="form-control shadow-sm" id="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Oluştur</button>
            </form>

        </div>
    </div>
</x-app>
