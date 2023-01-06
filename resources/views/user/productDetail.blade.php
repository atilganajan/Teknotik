<x-app>
    <div class="p-3">
        <div class="row  ">
            <div class="col-lg-5">
                <div id="carouselExampleIndicators" class="carousel slide  " data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $product->image1 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $product->image2 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $product->image3 }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @if (auth()->user())
                @if (auth()->user()->type === 'user')
                    <button id="productCartBtn" data-id="{{ $product->id }}" class="btn btn-success w-100 mt-2"><i
                            class="fa fa-shopping-cart "></i> Sepete Ekle</button>
                @endif
                @endif
            </div>
            <div class=" mt-2 col-lg-7 mt-lg-0">
                <div class="card ">
                    <div class="card-header  d-flex justify-content-between">

                        @if ($rating > 0)
                            <div class="d-flex mt-2 ms-2">
                                <span style="font-size: 18px" class="fa fa-star checkedStar "></span>
                                <span style="font-size: 18px"
                                    class="fa fa-star @if ($rating == 2 || $rating == 3 || $rating == 4 || $rating == 5) checkedStar @endif"></span>
                                <span style="font-size: 18px"
                                    class="fa fa-star @if ($rating == 3 || $rating == 4 || $rating == 5) checkedStar @endif"></span>
                                <span style="font-size: 18px"
                                    class="fa fa-star @if ($rating == 4 || $rating == 5) checkedStar @endif "></span>
                                <span style="font-size: 18px"
                                    class="fa fa-star @if ($rating == 5) checkedStar @endif "></span>
                                <span style="font-size: 18px">({{ $count }})</span>
                            </div>
                        @endif


                        <div class="d-flex me-2 ">
                            <h2>{{ $product->title }}</h2>
                        </div>
                        <div></div>
                    </div>
                    <div class="card-body">
                        <div><b>Kategori: </b>{{ $product->category->title }}</div>
                        <hr>
                        <div><b>Ürün Detayı: </b>{{ $product->description }}</div>
                        <hr>
                        <div><b>Mevcut Ürün: </b>{{ $product->quantity }} adet</div>
                        <hr>
                        <div><b>Fiyat: </b>
                            @if ($product->discount)
                                <s>{{ $product->price }}<i class="fa fa-try"></i></s>
                            @else
                                {{ $product->price }}<i class="fa fa-try"></i>
                            @endif
                        </div>

                        @if ($product->discount)
                            <hr>
                            <div><b>İndirim oranı: </b> <span class="badge bg-danger">{{ $product->discount }}%</span>
                            </div>
                            <hr>
                            <div style="font-size: 18px" class="mt-2 d-flex"><b>İndirimli
                                    Fiyat: </b>
                                <h4>
                                    {{ $product->discounted_price }}<i class="fa fa-try"></i>
                                </h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mt-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Ürün Değerlendirme ve Yorumlar</h3>
                    </div>
                    <div class="card-body">
                        @if ($canRatingComment)
                            <div id="ratingStarAndForm">
                                <div
                                    class="justify-content-center border-bottom border-success text-success d-flex mb-3">
                                    <h4><b>Ürünü Değerlendir</b></h4>
                                </div>
                                <div class='rating-stars text-center'>
                                    <ul id='stars'>
                                        <li class='star' title='Kötü' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='İdare eder' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='İyi' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Harika' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Mükemmel!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                                <div style="display: none" id="ratingCommentForm" class="mb-2 w-100">
                                    <div class="border rounded p-2">
                                        <div class=" border  border-secondary rounded  ">
                                            <label
                                                class="form-control bg-light border-bottom border-secondary rounded-2 text-center"><b>Ürünü
                                                    Değerlendir</b></label>
                                            <textarea style="height: 5rem" placeholder="Ürün Değerlendirmenizi Yazabilirsiniz.." class="form-control"
                                                name="questionComment" data-id="{{ $product->id }}" id="ratingCommentInput"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2">

                                            <button id="ratingCommentBtn" data-id="{{ $product->id }}"
                                                class="btn btn-outline-success w-100 shadow-sm "><i
                                                    class="fa fa-comment"></i> Değerlendirmeyi Yayınla</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                        <section class="gradient-custom">
                            <div id="ratingParentDiv">
                                @if (count($ratingComments) > 0)
                                    @foreach ($ratingComments as $comment)
                                        <div id="ratingCommentDiv{{ $comment->id }}"
                                            class="row d-flex justify-content-center">
                                            <div class="w-100 mb-2">
                                                <div class="card">
                                                    <div class="card-body ">

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="d-flex flex-start">
                                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                                        src="{{ asset('image/user.png') }}"
                                                                        alt="avatar" width="65"
                                                                        height="65" />
                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                        <div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <p class="mb-1">
                                                                                    {{ $comment->user->name }} <span
                                                                                        class="small">{{ $comment->created_at }}</span>
                                                                                </p>
                                                                                <div class="d-flex mt-2 ms-2">
                                                                                    <span style="font-size: 18px"
                                                                                        class="fa fa-star checkedStar"></span>
                                                                                    <span style="font-size: 18px"
                                                                                        class="fa fa-star @if ($comment->rating == 2 || $comment->rating == 3 || $comment->rating == 4 || $comment->rating == 5) checkedStar @endif "></span>
                                                                                    <span style="font-size: 18px"
                                                                                        class="fa fa-star @if ($comment->rating == 3 || $comment->rating == 4 || $comment->rating == 5) checkedStar @endif "></span>
                                                                                    <span style="font-size: 18px"
                                                                                        class="fa fa-star @if ($comment->rating == 4 || $comment->rating == 5) checkedStar @endif "></span>
                                                                                    <span style="font-size: 18px"
                                                                                        class="fa fa-star @if ($comment->rating == 5) checkedStar @endif "></span>
                                                                                </div>
                                                                            </div>
                                                                            <p class="small mb-0">
                                                                                {{ $comment->rating_comment }}
                                                                            </p>

                                                                            <div
                                                                                class="d-flex justify-content-end @if (!$comment->rating_comment) mt-3 @endif ">
                                                                                @if (auth()->user())
                                                                                @if (auth()->user()->type==="admin")
                                                                                <a data-id="{{ $comment->id }}"
                                                                                    class="btn ratingTrashBtn"><i
                                                                                        class="fa fa-trash"></i></a>
                                                                                @endif
                                                                                    
                                                                                @endif
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                @endif
                                <div class="d-flex justify-content-end mt-2">
                                    {{ $ratingComments->links() }}

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 mt-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Ürün Hakkında Soru ve Cevaplar</h3>
                    </div>
                    <div class="card-body">
                        <section class="gradient-custom">
                            <div class="container ">
                                <div class="row d-flex justify-content-center">
                                    <div class="mb-2 w-100">
                                        @if (auth()->user())
                                        @if (auth()->user()->type === 'user')
                                            <div class="border rounded p-2">
                                                <div class=" border  border-secondary rounded  ">
                                                    <label
                                                        class="form-control bg-light border-bottom border-secondary rounded-2 text-center"><b>Satıcıya
                                                            Soru Sor</b></label>
                                                    <textarea style="height: 5rem" placeholder="Minumum 10 Karater Giriniz.." class="form-control"
                                                        name="questionComment" id="questionComment"></textarea>
                                                </div>
                                                <small id="questionCommentError" style="display:none"
                                                    class="text-danger">Minimum 10 Karakter Girmelisiniz !</small>
                                                <div class="d-flex justify-content-center mt-2">

                                                    <button data-id="{{ $product->id }}"
                                                        class="btn btn-outline-info w-100 shadow-sm questionBtn"><i
                                                            class="fa fa-comment"></i> Soruyu
                                                        Yayınla</button>

                                                </div>
                                            </div>
                                        @endif
                                        @endif
                                    </div>
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div id="parentDiv" class="col">
                                                    @foreach ($questions as $comment)
                                                        <div class="d-flex flex-start my-1"
                                                            id="question{{ $comment->id }}">
                                                            <img class="rounded-circle shadow-1-strong me-3"
                                                                src="{{ asset('image/user.png') }}" alt="avatar"
                                                                width="65" height="65" />
                                                            <div class="flex-grow-1 flex-shrink-1"
                                                                id="forResComment{{ $comment->id }}">
                                                                <div>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <p class="mb-1">
                                                                            {{ $comment->user->name }} <span
                                                                                class="small">{{ $comment->created_at }}
                                                                            </span>
                                                                        </p>
                                                                        @auth
                                                                            @if (auth()->user()->type == 'admin')
                                                                                <div class="d-flex">
                                                                                    @if (!$comment->response)
                                                                                        <a class="reply btn shadow-none"
                                                                                            data-id="{{ $comment->id }}"><i
                                                                                                class="fas fa-reply fa-xs  fa-reply{{ $comment->id }}"></i><span
                                                                                                class="small"
                                                                                                id="replyText{{ $comment->id }}">
                                                                                                Cevapla</span></a>
                                                                                    @endif
                                                                                    <a data-id="{{ $comment->id }}"
                                                                                        class="btn shadow-none  trashQuestion">
                                                                                        <i class="fa fa-trash"></i> </a>
                                                                                </div>
                                                                            @endif
                                                                        @endauth
                                                                    </div>
                                                                    <p class="small mb-0">
                                                                        {{ $comment->question_comment }}
                                                                    </p>
                                                                </div>
                                                                <div id="hiddenReplyInput{{ $comment->id }}"
                                                                    style="display: none">

                                                                    <textarea class="form-control border" placeholder="Minumum 10 Karater Giriniz.." name="answer_comment"
                                                                        id="answer_comment{{ $comment->id }}" cols="30" rows="3"></textarea>
                                                                    <small id="resQuestionCommentError"
                                                                        style="display:none"
                                                                        class="text-danger">Minimum 10 Karakter
                                                                        Girmelisiniz !</small>
                                                                    <div class="d-flex justify-content-start mt-1">
                                                                        <button data-id="{{ $comment->id }}"
                                                                            class="btn btn-sm btn-success w-25 shadow-sm resCommentBtn ">Cevapla</button>
                                                                    </div>

                                                                </div>
                                                                @if ($comment->response)
                                                                    <div class="d-flex flex-start  mt-4">
                                                                        <a class="me-3" href="#">
                                                                            <img class="rounded-circle shadow-1-strong"
                                                                                src="{{ asset('image/admin.png') }}"
                                                                                alt="avatar" width="65"
                                                                                height="65" />
                                                                        </a>
                                                                        <div class="flex-grow-1 flex-shrink-1">
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center">
                                                                                    <p class="mb-1">
                                                                                        <i
                                                                                            class="fa fa-user-secret"></i>
                                                                                        Admin <span
                                                                                            class="small">{{ $comment->response->created_at }}</span>
                                                                                    </p>
                                                                                </div>
                                                                                <p class="small mb-0">
                                                                                    {{ $comment->response->answer_comment }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="d-flex justify-content-end mt-2">
                                                        {{ $questions->links() }}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>

<slot name="js">
    <script>
        let token = document.head.querySelector('meta[name="csrf-token"]');

        function swalMessage(message) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                customClass: 'swal-wide',
                timer: 1500
            });
        }

        $(document).ready(function() {
            $('.carousel').carousel({
                interval: false,
            });

            $('#stars li').on('mouseover', function() {
                var onStar = parseInt($(this).data('value'), 10);
                $(this).parent().children('li.star').each(function(e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function() {
                $(this).parent().children('li.star').each(function(e) {
                    $(this).removeClass('hover');
                });
            });

        });
        let onStar;
        $('#stars li').on('click', function() {
            onStar = parseInt($(this).data('value'), 10);
            var stars = $(this).parent().children('li.star');

            $("#ratingCommentForm").show();

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

        });

        $("#ratingCommentBtn").click(async function() {
            const id = $(this).data("id");
            const ratingCommentInput = $("#ratingCommentInput").val();
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            try {
                let result = await axios.post(`/user/product/ratingComment/${id}`, {
                    comment: ratingCommentInput,
                    rating: onStar
                });

                const rating = result.data.ratingComment.rating

                const newRatingComment = `
                <div class="row d-flex justify-content-center">
                   <div class="w-100 mb-2">
                      <div class="card">
                          <div class="card-body ">
                              <div class="row">
                                  <div class="col">
                             <div class="d-flex flex-start">
                                 <img class="rounded-circle shadow-1-strong me-3"
                                     src="{{ asset('image/user.png') }}"
                                     alt="avatar" width="65" height="65" />
                                 <div class="flex-grow-1 flex-shrink-1">
                                     <div>
                                         <div
                                             class="d-flex justify-content-between align-items-center">
                                             <p class="mb-1">
                                                ${ result.data.username } <span class="small">${ result.data.formatDate }</span>
                                   </p>
                                   <div class="d-flex mt-2 ms-2">
                            <span style="font-size: 18px" class="fa fa-star checkedStar"></span>
                            <span style="font-size: 18px" class="fa fa-star ${rating==2||rating==3||rating==4||rating==5?"checkedStar":"" }"></span>
                            <span style="font-size: 18px" class="fa fa-star ${rating==3||rating==4||rating==5?"checkedStar":"" }"></span>
                            <span style="font-size: 18px" class="fa fa-star ${rating==4||rating==5?"checkedStar":"" } "></span>
                            <span style="font-size: 18px" class="fa fa-star ${rating==5?"checkedStar":"" } "></span>
                                         </div>
                                     </div>
                                     <p class="small mb-0">
                                         ${ result.data.ratingComment.rating_comment }
                                     </p>
                                     </div>
                          </div>
                                </div>
                                 </div>
                             </div>
                         </div>
                                     </div>
                                 </div>
                </div>`

                $("#ratingParentDiv").prepend(newRatingComment);
                $("#ratingStarAndForm").hide();
                swalMessage(result.data.message);
            } catch (error) {
                swal.fire("", "bir hata oluştu", "error")
            }

        });

        $("#productCartBtn").click(async function() {
            const id = $(this).data("id");
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            try {
                let result = await axios.post(`/user/cart/add-to-cart/${id}`);

                swalMessage(result.data.message);
            } catch (err) {
                swal.fire("", "bir hata oluştu", "error")
            }
        });

        $(".reply").click(function() {
            const id = $(this).data("id");
            if (!$(`#hiddenReplyInput${id}`).is(":visible")) {
                $(`#hiddenReplyInput${id}`).show();
                $(`#replyText${id}`).html(" Vazgeç");
                $(`#replyText${id}`).addClass("text-danger");
            } else {
                $(`#hiddenReplyInput${id}`).hide();
                $(`#replyText${id}`).html(" Cevapla");
                $(`#replyText${id}`).removeClass("text-danger");
            }
        });

        $(".questionBtn").click(async function() {
            const questionComment = $("#questionComment").val();
            $("#questionComment").val("");
            const id = $(this).data("id");

            if (questionComment.length < 9) {
                $("#questionCommentError").show();
                setTimeout(() => {
                    $("#questionCommentError").hide();
                }, 2000);
                return false;
            }
            try {
                window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
                let result = await axios.post(`/user/product/questionComment/${id}`, {
                    questionComment: questionComment
                });

                swalMessage(result.data.message);

                const newQuestion = `
                <div class="d-flex flex-start my-1">
                    <img class="rounded-circle shadow-1-strong me-3"
                       src="{{ asset('image/user.png') }}" alt="avatar"
                       width="65" height="65" />
                     <div class="flex-grow-1 flex-shrink-1">
                          <div>
                              <div
                               class="d-flex justify-content-between align-items-center">
                                  <p class="mb-1">
                                    ${result.data.name} <span
                                  class="small">${ result.data.formatDate }
                                      </span>
                                  </p>
                                </div>
                                 <p class="small mb-0">
                                    ${result.data.question.question_comment}
                                 </p>
                               </div>
                          </div>
                    </div>
                `;
                $("#parentDiv").prepend(newQuestion);
            } catch (error) {
                swal.fire("", "bir hata oluştu", "error");
            }
        });

        $(".trashQuestion").click(async function() {
            const id = $(this).data("id");
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            try {
                let result = await axios.delete(`/admin/product/questionComment/delete/${id}`);
                swalMessage(result.data.message)
                $(`#question${id}`).remove();
            } catch (error) {
                swal.fire("", "bir hata oluştu", "error");
            }
        });

        $(".resCommentBtn").click(async function() {
            const id = $(this).data("id");
            const answer_comment = $(`#answer_comment${id}`).val();

            if (answer_comment.length < 9) {
                $("#resQuestionCommentError").show();
                setTimeout(() => {
                    $("#resQuestionCommentError").hide();
                }, 2000);
                return false;
            }
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            try {
                let result = await axios.post(`/admin/product/resComment/${id}`, {
                    answer_comment: answer_comment
                })

                swalMessage(result.data.message);

                const newResComment = `
            <div class="d-flex flex-start  mt-4">
                  <a class="me-3" href="#">
                      <img class="rounded-circle shadow-1-strong"
                          src="{{ asset('image/admin.png') }}"
                          alt="avatar" width="65"
                          height="65" />
                  </a>
                  <div class="flex-grow-1 flex-shrink-1">
                      <div>
                          <div
                              class="d-flex justify-content-between align-items-center">
                              <p class="mb-1">
                                  <i
                                      class="fa fa-user-secret"></i>
                                  Admin <span
                                      class="small">${result.data.formatDate}</span>
                              </p>
                          </div>
                          <p class="small mb-0">
                               ${result.data.answer.answer_comment} 
                          </p>
                      </div>
                  </div>
            </div>
            `
                $(`#hiddenReplyInput${id}`).hide();
                $(`#replyText${id}`).hide();
                $(`.fa-reply${id}`).hide();
                $(`#forResComment${id}`).append(newResComment);
            } catch (error) {
                swal.fire("", "bir hata oluştu", "error")
            }
        })

        $(".ratingTrashBtn").click(async function() {
            const id = $(this).data("id");
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            try {
                let result = await axios.delete(`/admin/product/ratingComment/delete/${id}`);
                console.log(result)
                swalMessage(result.data.message);
                $(`#ratingCommentDiv${id}`).remove();
            } catch (error) {
                swal.fire("", "bir hata oluştu", "error")
            }
        });
    </script>
</slot>
