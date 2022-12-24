
<div class="d-flex justify-center align-items-center mt-3 ms-4">
    <div class="wrapper d-flex">
        <div class="tabs-box d-flex">
            @foreach ($mainCategories as $category)
            <div class="dropdown mx-1">
                <button class="btn btn-light dropdown-toggle shadow-sm" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{$category->title}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        @endforeach
        </div>

    </div>
</div>





{{-- <div class="d-flex justify-content-center">
    @foreach ($mainCategories as $category)
        <div class="dropdown mx-1">
            <button class="btn btn-light dropdown-toggle shadow-sm" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{$category->title}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    @endforeach
</div> --}}

