 <?php
        include('../Bug_Tracking_System/links.php');
        ?>
 <style>
      .back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
}


        footer.sticky-footer .copyright span{
            text-align: center;
            margin-left: 450px;
    line-height: 1;
    font-size: 0.8rem;
}
</style>

<script type="text/javascript">
  
$(document).ready(function() {
  $('#example').DataTable();
} );


$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 0) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
  </script>

  <a id="back-to-top" href="#" class=" back-to-top" role="" title="" data-toggle="tooltip" data-placement="rigth" data-bs-original-title="" aria-label="Click to return on the top page" ><i class="fa-sharp fa-solid fa-chevron-up"></i></a>


 <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">


    <footer class="sticky-footer bg-white  ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="align-items: center; margin-left: 300px;">
                            <b>Copyright</b> © <b>bug tracking </b>Website 2024 - All Rights Reserved.
                        </span>
                    </div>
                </div>

            </footer>

</nav>
 
