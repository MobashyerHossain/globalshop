@foreach(App\Models\Product\PartCategory::all() as $partcategory)
<div class="row">
  <div class="col-md-12">
      <div class="card strpied-tabled-with-hover">
          <div class="card-header">
              <h4 class="card-title">{{$partcategory->name}}</h4>
              <p class="card-category">List of Cars from {{$partcategory->name}}</p>
          </div>
          <div class="card-body table-responsive">
              <table class="table table-hover table-striped">
                  <thead>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Buying Price</th>
                      <th>Selling Price</th>
                      <th>Unit Left</th>
                      <th>Current Discount</th>
                      <th>Max Possible Discount</th>
                      <th>Part Sub Category</th>
                      <th>Part Manufacturer</th>
                      <th>Update Info</th>
                      <th>Remove Part</th>
                      <th></th>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach($partcategory->getSubCategories() as $partsubcategory)
                      @foreach($partsubcategory->getParts() as $part)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img src="{{url($part->getImage())}}" alt="" style="width:60px;height:40px;object-fit:cover;object-position:center;"></td>
                            <td>{{$part->name}}</td>
                            <td style="width:80px;">{{$part->getBuyingPrice()}}</td>
                            <td style="width:80px;">{{$part->getNormalPrice()}}</td>
                            <td>{{$part->getOurStock()}}</td>
                            <td>{{$part->current_discount*100}} %</td>
                            <td>{{$part->max_possible_discount*100}} %</td>
                            <td>{{$partsubcategory->name}}</td>
                            <td>{{$part->getManufacturer()->name}}</td>
                            <td class="text-center">
                              <a href="{{route('showroom.update.part', ['type' => 'part', 'id' => $part->id])}}" class="no-outline"><span class="text-primary fa fa-edit"></span></a>
                            </td>
                            <td class="text-center">
                              <a href="" data-toggle="modal" data-target="#partDeleteModal" class="no-outline"><span class="text-danger fa fa-trash"></span></a>

                              <div class="modal fade" id="partDeleteModal" tabindex="-1" role="dialog" aria-labelledby="partDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <p class="text-center">Are you sure you wish to remove<br><span class="font-weight-bold">{{$part->name}}</span><br>from the Inventory?</p>
                                    </div>
                                    <div class="modal-footer">
                                      {!!Form::open(['action' => ['ModelControllers\PartController@destroy', $part->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        <a onclick="this.parentNode.submit();" class="btn btn-danger rounded-0" style="color:#7f7f7f;">Remove</a>
                                      {!!Form::close()!!}
                                      <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Go Back</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                        </tr>
                      @endforeach
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endforeach
