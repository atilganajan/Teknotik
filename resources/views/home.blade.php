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

        let isDrragging = false;

        const dragging = (e) => {
            if (!isDrragging) return;
            tabsBox.scrollLeft -= e.movementX;
        }

        const dragStop = () => {
            isDrragging = false;
        }

        tabsBox.addEventListener("mousedown", () => isDrragging = true);
        tabsBox.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);

        $(".basketAddBtn").click(async function() {
            const id = $(this).data("id");
            console.log("id", id)

            try {
                let result = await axios.post(`/user/cart/add-to-cart/${id}`)
                
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: result.data.message,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 1500
                })
            }catch (err) {
                console.log("err", err.response.status)
                if(err.response.status=="401"){
                  return  swal.fire("", "Sepete ekleyebilmeniz için giriş yapmalısınız", "warning")
                }
                swal.fire("", "bir hata oluştu", "error")
            }
        })
    </script>
</slot>
