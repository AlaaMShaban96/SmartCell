    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
 

    <script>
  	 jQuery(document).ready(function($) {
            $(document).ajaxSend(function() {
                $("#overlay").fadeIn(300);
                $('#loader').removeClass('hidden')　
            });
                    
            $('.button-overlay').click(function(){
                $.ajax({
                type: 'GET',
                success: function(data){
                    console.log(data);
                }
                }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
                $('#loader').removeClass('hidden')
                });
            });
            });

    function loding(imgName) {
        jQuery(document).ready(function($) {
            $(document).ajaxSend(function() {
                $("#overlay").fadeIn(300);
                $('#loader').removeClass('hidden')　
            });
                    
            // $('.button-overlay').click(function(){
                $.ajax({
                type: 'GET',
                success: function(data){
                    console.log(data);
                }
                }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
                $('#loader').removeClass('hidden')
                });
            // });
        });


    }       
        // });
</script>