<!--button to upload prifle pic-->
<script type="text/javascript">
  function proPic(){
    document.getElementById("pro").click();
  }
</script>

<!--search Box handle-->
<script>
  $(document).ready(function(){
    $("#siteSearchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      if(value != 0){
        $("#searchlist #slist").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $('#search_box').css('display', 'block');
      }
      else {
        $('#search_box').css('display', 'none');
      }
    });

    $(document).click(function (e) {
      e.stopPropagation();
      //check if the clicked area is dropDown or not
      if ($('#search_box').has(e.target).length === 0) {
        $('#siteSearchInput').val('');
        $('#search_box').hide();
      }
    });
  });
</script>

<!--Account Verification Request Alart-->
<script>
  if("{{Session::has('please_verify')}}"){
    swal("Please Verify!", "{{Session::get('please_verify')}}", "info");
  }
</script>

<!--Account Not Verification Alart-->
<script>
  if("{{Session::has('not_verified')}}"){
    swal("Not Varified!", "{{Session::get('not_verified')}}", "error");
  }
</script>

<!--Account Verification verified Alart-->
<script>
  if("{{Session::has('verification_status')}}"){
    swal("Good Job!", "{{Session::get('verification_status')}}", "success");
  }
</script>

<!--Script for uploading and changing profile pic-->
<script>
  function uploadImage(){
    document.getElementById("profile_pic").click();
  }

  $(function(){
    $('#profile_pic').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
       {
          var reader = new FileReader();

          reader.onload = function (e) {
             $('#pro_pic').attr('src', e.target.result);
          }
         reader.readAsDataURL(input.files[0]);
      }
      else
      {
        $('#pro_pic').attr('src', 'storage/images/male.png');
      }
    });
  });
</script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
