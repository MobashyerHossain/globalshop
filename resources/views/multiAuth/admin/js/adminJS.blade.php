<script>
  //button to upload prifle pic
  function proPic(){
    document.getElementById("pro").click();
  }

  //show profile edit form
  function showEditForm(){
    document.getElementById("infoForm").style.display = "none";
    document.getElementById("editForm").style.display = "block";
  }

  //show profile edit form
  function showInfoForm(){
    document.getElementById("editForm").style.display = "none";
    document.getElementById("infoForm").style.display = "block";
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

<script>
  //Account Verification Request Alart
  if("{{Session::has('please_verify')}}"){
    swal("Please Verify!", "{{Session::get('please_verify')}}", "info");
  }

  //Account Not Verification Alart
  if("{{Session::has('not_verified')}}"){
    swal("Not Varified!", "{{Session::get('not_verified')}}", "error");
  }

  //Account Verification verified Alart
  if("{{Session::has('verification_status')}}"){
    swal("Good Job!", "{{Session::get('verification_status')}}", "success");
  }

  //car booked
  if("{{Session::has('car_booked')}}"){
    swal("Car Booked!", "{{Session::get('car_booked')}}", "success");
  }

  //car already booked
  if("{{Session::has('car_already_booked')}}"){
    swal("Car Already Booked!", "{{Session::get('car_already_booked')}}", "error");
  }

  //car tested
  if("{{Session::has('car_test_driven')}}"){
    swal("Car Reserved for Testing!", "{{Session::get('car_test_driven')}}", "success");
  }

  //loan applied
  if("{{Session::has('loan_applied')}}"){
    swal("Your Application has been Submitted!", "{{Session::get('loan_applied')}}", "success");
  }

  //loan applied
  if("{{Session::has('product_check_out')}}"){
    swal("Parts Purchased Succesfully!", "{{Session::get('product_check_out')}}", "success");
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
  $(document).ready(function() {
    if (sessionStorage.scrollTop != "undefined") {
      $(window).scrollTop(sessionStorage.scrollTop);
    }
  });
</script>

<script>
    //profile img
    function uploadImage(input){
      document.getElementById(input).click();
    }

    function readURL(input, img) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
           $(img).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>

<script>
  //employee salary selector
  $(document).ready(function () {
    $("#job_title_select").change(function () {
       $("input[id*=preset_salary]").hide();
       var va = $(this).val();
       $("#preset_salary"+va+"").show();
    });
  });
</script>
