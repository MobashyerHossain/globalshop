@extends('layout.showroom')

@section('title', 'Add New Products')

@section('content')
  @include('multiAuth.showroomstaff.inc.navbar')
  <div class="row">
    <div class="col-2">

    </div>
    <div class="col-8">
      <div class="container border-0">
        <div>
            <!-- Tab Options -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-2">Car</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Part</a></li>
            </ul>

            <!-- Tab Contents -->
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="tab-2">
                    @include('multiAuth.showroomstaff.inc.carEntryForm')
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-3">
                    @include('multiAuth.showroomstaff.inc.partEntryForm')
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-2">

    </div>
  </div>
@stop

@section('style')
  <style>
    .slidecontainer {
        width: 100%;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 100%;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
    }
  </style>
@stop

@section('script')
@include('multiAuth.showroomstaff.js.showroomJS')
<script type="text/javascript">
  function uploadImage(){
    document.getElementById("image").click();
  }

  function deleteDetail(x){
    var det_cri = document.getElementById("detail_criteria_col"+x);
    var det = document.getElementById("detail_col"+x);
    det_cri.parentNode.removeChild(det_cri);
    det.parentNode.removeChild(det);
  }
</script>
<script>
  $(document).ready(function() {
      var wrapper         = $(".details");
      var add_button      = $(".add_detail_fields");
      var x=0

      $(add_button).click(function(e){
          e.preventDefault();
          x++;
          $(wrapper).append('<div id="detail_criteria_col'+x+'" class="col col-6" style="padding:10px;"><div class="input-group"><input id="detail_criteria'+x+'" class="form-control" type="text" value="{{ old("detail_criteria'+x+'") }}" style="text-transform:capitalize; box-shadow:none !important;" placeholder="Detail Criteria '+x+'"></div></div><!-- Details --><div id="detail_col'+x+'" class="col col-6" style="padding:10px;"><div class="input-group"><input id="detail'+x+'" class="form-control" type="text" value="{{ old("detail'+x+'") }}" style="text-transform:capitalize; box-shadow:none !important;" placeholder="Detail '+x+'"><div class="input-group-append"><button class="btn btn-danger" onclick="deleteDetail('+x+')" style="text-transform:capitalize; box-shadow:none !important;">X</button></div></div></div>');   //add input box
      });
  });
  </script>
@stop
