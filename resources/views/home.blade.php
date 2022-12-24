<x-app>
    <x-search />
    <x-main-category-toggle-btn :mainCategories="$mainCategories" />
    <div class="text-center container py-5">
        <div class="row">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach

        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}

        </div>
    </div>


</x-app>
<slot name="js">
    <script>
        const tabsBox = document.querySelector(".tabs-box");

        let isDrragging=false;

        const dragging=(e)=>{
           if(!isDrragging) return;
            tabsBox.scrollLeft -=e.movementX;
        }

        const dragStop=()=>{
             isDrragging=false;

        }

        tabsBox.addEventListener("mousedown",()=> isDrragging=true);
        tabsBox.addEventListener("mousemove",dragging);
        document.addEventListener("mouseup",dragStop);




    </script>
</slot>
