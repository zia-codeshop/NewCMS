<div class="overlay toggle-btn-mobile"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<!--footer -->
<div class="footer">
    <p class="mb-0">Construction  Management System @2022 | Developed By : <a href="https://www.techancor.com/">Techancor</a> &  <a href="https://web.facebook.com/zia.progrmr">Zia Khan</a
    </p>
</div>
<!-- end footer -->
</div>
<!-- end wrapper -->






<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn">
        <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
        <hr/>
        <h6 class="mb-0">Theme Styles</h6>
        <hr/>
        <div class="custom-control custom-radio">
            <input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="darkmode">Dark Mode</label>
        </div>
        <hr/>
        <div class="custom-control custom-radio">
            <input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
            <label class="custom-control-label" for="lightmode">Light Mode</label>
        </div>
    </div>
</div>
<!--end switcher-->




<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<!--Apex chart-->
<script src="{{ asset('admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/js/index.js') }}"></script>
<!-- App JS -->
<script src="{{ asset('admin/js/app.js') }}"></script>
<!--Data Tables js-->
<script src="{{ asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>

<script>
    /*switcher*/

    $(".switcher-btn").on("click", function () {
        $(".switcher-wrapper").toggleClass("switcher-toggled");
    });

    $("#darkmode").on("click", function () {
        $("html").addClass("dark-theme");
    });

    $("#lightmode").on("click", function () {
        $("html").removeClass("dark-theme");
    });

    /* switcher ends */


    function preview_img(input, img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#image_input_field').change(function () {
        preview_img(this, $('#image_preview'));
    });
    $('#image_input_field_1').change(function () {
        preview_img(this, $('#image_preview_1'));
    });
    $('#image_input_field_2').change(function () {
        preview_img(this, $('#image_preview_2'));
    });
    $('#image_input_field_3').change(function () {
        preview_img(this, $('#image_preview_3'));
    });
    $('#image_input_field_4').change(function () {
        preview_img(this, $('#image_preview_4'));
    });
    $('#image_input_field_5').change(function () {
        preview_img(this, $('#image_preview_5'));
    });
    $('#image_input_field_6').change(function () {
        preview_img(this, $('#image_preview_6'));
    });

</script>
