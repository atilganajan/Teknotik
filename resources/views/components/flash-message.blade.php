@if (session()->has('message'))
<div style="display: none" id="message" >{{session("message")}}</div>
    <slot name="js">
        <script>
            $(window).ready(function() {
                const message= $("#message").html()
                if(message!==""){
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title:message ,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                    timer: 1500
                })
                
                }

            })
        </script>
    </slot>
@endif
