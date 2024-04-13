<?php
    include('../Bug_Tracking_System/links.php');
?>
<style>
    .back-to-top {
        /*cursor: pointer;*/
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        font-size: 20px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        /*background-color: #007bff;*/
        color: #fff;
        border-radius: 50%;
        z-index: 1;
        font-size: xx-large;
    }

    /* Styling for the footer icon */
    footer.sticky-footer .copyright span {
        text-align: center;
        /* Adjusted margin to center align */
        margin-left: auto;
        margin-right: auto;
        line-height: 1;
        font-size: 0.8rem;
    }
    .text-center{
        margin-left: 250px;

    }

</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        $('#back-to-top').click(function() {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        $('#back-to-top').tooltip('show');
    });
</script>

<a id="back-to-top" href="#" class="back-to-top"  data-toggle="tooltip"><i class="fa-sharp fa-solid fa-circle-up" style="color: #3260cb !important;"></i></a>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-center">
                    <b>Copyright</b> © <b>Bug Tracking</b> Website 2024 - All Rights Reserved.
                </span>
            </div>
        </div>
    </footer>
</nav>