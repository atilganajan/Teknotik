<x-app>
    <div class="row justify-content-center w-100">
        <div class="bg-secondary bg-opacity-25 p-5 col-lg-7 col-md-9 ">

            <header class="text-center">
                <h2 class="text-2xl font-bold  mb-1">
                    Ürün Güncelle
                </h2>
            </header>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3 mt-5">
                    <div class=" col-lg-4">
                        @if ($product->image1)
                            <div>
                                <img src="{{ $product->image1 }}" style="width: 7rem" alt="">
                            </div>
                        @endif
                        <label for="image1" class="form-label">Ürün Fotoğrafı-1</label>
                        <input type="file" name="image1" class="form-control shadow-sm ">
                        @error('image1')
                            <p class="text-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-4 mt-2 mt-lg-0 d-flex">
                        <div class="mt-auto mb-0 w-100">
                            @if ($product->image2)
                                <div>
                                    <img src="{{ $product->image2 }}" style="width: 7rem" alt="">
                                </div>
                            @endif
                            <label for="image2" class="form-label">Ürün Fotoğrafı-2</label>
                            <input type="file" name="image2" class="form-control shadow-sm ">
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 mt-lg-0 d-flex">
                        <div class="mt-auto mb-0 w-100">
                            @if ($product->image3)
                                <div>
                                    <img src="{{ $product->image3 }}" style="width: 7rem" alt="">
                                </div>
                            @endif
                            <label for="image3" class="form-label">Ürün Fotoğrafı-3</label>
                            <input type="file" name="image3" class="form-control shadow-sm ">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Ürün Adı</label>
                    <input type="text" name="title" class="form-control shadow-sm" id="title"
                        value="{{ $product->title }}">
                    @error('title')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama</label>
                    <textarea name="description" class="form-control shadow-sm" id="description" rows="4">{{ $product->description }}</textarea>
                    @error('description')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Ürün Durumu</label>
                    <div class="input-group">
                        <select name="status" class="form-select shadow-sm" id="">
                            <option @if ($product->status=="draft")
                                selected
                            @endif value="draft">Taslak</option>

                            <option @if ($product->status=="publish")
                                selected
                            @endif value="publish">Yayın</option>

                            <option @if ($product->status=="passive")
                                selected
                            @endif value="passive">Pasif</option>
                        </select>
                    </div>
                    @error('status')
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
                                <option 
                                    style="display: none"
                               
                                @if ($product->sub_category_id==$category->id)
                                    selected
                                @endif
                                id="{{ $category->main_category_id }}"
                                    value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('sub_category_id')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-3">
                    <label for="quantity" class="form-label absolute">Ürün Adeti</label>
                    <div class="input-group">
                        <input type="number" name="quantity" value="{{ $product->quantity }}"
                            class="form-control shadow-sm" id="quantity">
                        @error('quantity')
                            <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="price" class="form-label absolute">Ürün Fiyatı</label>
                    <div class="input-group">
                        <input type="number" name="price" required value="{{ $product->price }}"
                            class="form-control shadow-sm" id="price">
                        <span class="input-group-text"><i class="fa fa-try"></i></span>
                    </div>
                    <small id="priceMessage" style="display: none" class="text-danger">0'dan küçük değer giremezsiniz!</small>
                    @error('price')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 form-check form-group">
                    <input type="checkbox" class="form-group" id="isFinishedDiscount">
                    <label class="my-2">İndirim Olacak mı?</label>
                </div>

                <div class="mb-3 row" style="display: none" id="discountShow">
                    <div class="col-sm-6">
                        <label for="discount" class="form-label  absolute">İndirim yüzdesi</label>
                        <div class="input-group">
                            <span class="input-group-text">%</span>
                            <input type="number" name="discount" id="discount" value="{{ $product->discount }}"
                                class="form-control shadow-sm" placeholder="1-100">
                        </div>
                        @error('discount')
                            <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label for="discountedPrice" class="form-label  absolute">İndirimli Fiyatı</label>
                        <div class="input-group">
                            <input type="number" name="discounted_price" class="form-control shadow-sm" id="discountedPrice">
                            <span class="input-group-text"><i class="fa fa-try"></i></span>
                        </div>
                        <small id="discountedPriceMessage" style="display: none" class="text-danger">Sadece %1 ile
                            %99 oranında indirim yapabilirsiniz!</small>
                    </div>
                    @error('discounted_price')
                    <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                @enderror
                </div>

                <div class="form-group  " id="discountTime" style="display: none">
                    <label class="my-2">İndirim Bitiş Tarihi</label> &nbsp;  <small>* isteğe bağlı</small>
                    <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" name="discount_finished_at" id="discountDate" class="form-control"
                        value="{{ $product->discount_finished_at }}">
                    @error('discount_finished_at')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3 form-check form-group">
                    <input type="checkbox" class="form-group" id="isFinishedProduct">
                    <label class="my-2">Ürün Yayın Bitiş Tarihi Olacak mı?</label>
                </div>
                <div class="form-group mb-3" id="productTime" style="display: none">
                    <label class="my-2">Yayın Bitiş Tarihi</label>
                    <input type="datetime-local" min="{{ date('Y-m-d\TH:i') }}" name="product_finished_at" id="productDate" class="form-control"
                        value="{{ $product->product_finished_at }}">
                    @error('product_finished_at')
                        <p class="text-danger "><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary shadow-sm w-100">Güncelle</button>
            </form>

        </div>
    </div>
</x-app>

<slot name="js">
    <script>
        $(document).ready(function() {
            // Product Show
            if ($("#productDate").val()) {
                $('#isFinishedProduct').prop('checked', true);
                $("#productTime").show()
            }
            // Discount Show
            if ($("#discountDate").val() || $("#discount").val()) {
                $('#isFinishedDiscount').prop('checked', true);
                $("#discountTime").show()
                $("#discountShow").show()

                if ($("#discount").val()) {
                    $("#discountedPrice").val(
                        Math.round($("#price").val() - (($("#price").val() / 100) * $("#discount").val()))
                    )
                }
            }
            // console.log($("#subCategory").val());
            let mainCategoryId;
            $('#subCategory > option').map((i, option) => {
                
                if($(option).val()=={{{$product->sub_category_id}}}){
                    mainCategoryId=option.id
                }
            });
            $('#subCategory > option').map((i, option) => {
                if(option.id==mainCategoryId){
                    $(option).show() 
                }
                $('#mainCategory').val(mainCategoryId)
            })

        });

        // Product Show
        $("#isFinishedProduct").change(function() {
            if ($("#isFinishedProduct").is(":checked")) {
                $("#productTime").show()
            } else {
                $("#productTime").hide()
            }
        })

        // Discount Show
        $("#isFinishedDiscount").change(function() {
            if ($("#isFinishedDiscount").is(":checked")) {
                $("#discountTime").show()
                $("#discountShow").show()

            } else {

                $("#discountTime").hide()
                $("#discountShow").hide()
                $("#discountedPrice").val("")
                $("#discount").val("")
            }
        })


        // Discount Calculation 
        $("#discount").on("input", function() {
            if ($(this).val() > 99) {
                $(this).val(99)
            }
            $("#discountedPrice").val(
                Math.round($("#price").val() - (($("#price").val() / 100) * $(this).val()))
            )
            if ($(this).val() < 1) {
                $(this).val("")
                $("#discountedPrice").val("")
            }
            if($("#discountedPrice").val()==0){
                $("#discount").val("")
                $("#discountedPrice").val("")
                $("#discountedPriceMessage").html(" İndirimli fiyat 0 olamaz!").show()
            }
        });

        $("#discountedPrice").on("input", function() {
            $("#discountedPriceMessage").hide()
            $("#discount").val(
                Math.round(100 - (($(this).val() * 100) / $("#price").val()))
            )
            if ($("#discount").val() < 1) {
                $("#discount").val(1)
                $("#discountedPriceMessage").show()
                $(this).val(Math.round($("#price").val() - ($("#price").val() / 100)))

            }
            if ($("#discount").val() > 99) {
                $("#discount").val("")
                $("#discountedPriceMessage").show()
            }
            if ($(this).val() == "") {
                $("#discountedPriceMessage").hide()
            }
            if ($(this).val() < 1) {
                $(this).val("")
            }
        });

        $("#price").on("input", function() {
            $("#priceMessage").hide()
            if($(this).val()<0){
                $("#priceMessage").show()
                $(this).val(0)            }
            if ($("#discount").val()) {
                $("#discountedPrice").val(
                    Math.round($("#price").val() - (($("#price").val() / 100) * $("#discount").val()))
                )
            }
            if($(this).val()>0 && $(this).val()==$("#discountedPrice").val()){
                $("#discount").val("")
                $("#discountedPrice").val("")
                $("#priceMessage").html("Fiyat ile İndirimli fiyat aynı olamaz!").show()
            }
            if($("#discountedPrice").val()==0){
                $("#discount").val("")
                $("#discountedPrice").val("")
            }

        });

        // category
        $("#mainCategory").change(function() {
            $('#subCategory').val("")
            $('#subCategory > option').map((i, option) => {
                $(option).hide();
                if (option.id == $(this).val()) {
                    console.log($(this).val())
                    $(option).show();
                }
            });
        })


    </script>
</slot>
