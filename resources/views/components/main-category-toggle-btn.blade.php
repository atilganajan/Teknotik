<div class="d-flex justify-center align-items-center mt-3 ms-4">
    <div id="wrapper" class="wrapper d-flex">
        <div class="tabs-box d-flex">
            @foreach ($mainCategories as $category)
                <div class="dropdown mx-1">
                    <button class="btn btn-light dropdown-toggle shadow-sm" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $category->title }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($category->subCategories as $subCategory)
                            <li><a class="dropdown-item" href="/?category={{$subCategory->id}}">dddd{{ $subCategory->title }}xxx</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

    </div>
</div>
