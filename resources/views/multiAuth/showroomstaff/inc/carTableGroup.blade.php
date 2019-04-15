@foreach(App\Models\Product\CarMaker::all() as $carmaker)
  <div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header">
                <h4 class="card-title">{{$carmaker->name}}</h4>
                <p class="card-category">List of Cars from {{$carmaker->name}}</p>
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
                        <th>Car Model</th>
                        <th>Update Info</th>
                        <th>Remove Car</th>
                        <th></th>
                    </thead>
                    <tbody>
                      <?php $i=0; ?>
                      @foreach($carmaker->getModels() as $carmodel)
                        @foreach($carmodel->getCars() as $car)
                          <tr>
                              <td>{{++$i}}</td>
                              <td><img src="{{url($car->getImage())}}" alt="" style="width:60px;height:40px;object-fit:cover;object-position:center;"></td>
                              <td>{{$car->name}}</td>
                              <td style="width:120px;">{{$car->getBuyingPrice()}}</td>
                              <td style="width:120px;">{{$car->getNormalPrice()}}</td>
                              <td>{{$car->getOurStock()}}</td>
                              <td>{{$car->current_discount*100}} %</td>
                              <td>{{$car->max_possible_discount*100}} %</td>
                              <td>{{$carmodel->name}}</td>
                              <td class="text-center">
                                <a href="{{route('showroom.update.car', ['type' => 'car', 'id' => $car->id])}}" class="no-outline"><span class="text-primary fa fa-edit"></span></a>
                              </td>
                              <td class="text-center">
                                <a href="" data-toggle="modal" data-target="#carDeleteModal" class="no-outline"><span class="text-danger fa fa-trash"></span></a>

                                <div class="modal fade" id="carDeleteModal" tabindex="-1" role="dialog" aria-labelledby="carDeleteModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                        <p>Are you sure you wish to remove {{$car->name}} from the Inventory?</p>
                                      </div>
                                      <div class="modal-footer">
                                        {!!Form::open(['action' => ['ModelControllers\CarController@destroy', $car->id], 'method' => 'POST'])!!}
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
