@extends('index')
@section('middle')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table id="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart_data as $papa)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left pr-5" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">{{$papa->medicinename}}</a></h4>
                                        <h5 class="media-heading"> <a href="#">{{$papa->type}}</a></h5>
                                        
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <h5>{{$papa->quantity}}</h5>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{$papa->price}}</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{$papa->price * $papa->quantity}}</strong></td>
                            <td class="col-sm-1 col-md-1">
                                <button type="button" class="btn btn-danger">
                                    <a href="{{URL::to('/delete'.'/'.'cart_data'.'/'.$papa->id)}}">Remove</a> 
                                </button>
                            </td>
                        </tr>
                        @endforeach
                      
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <h3>Total</h3>
                            </td>
                            <td class="text-right">
                                <h3><strong>{{$total}}</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <button type="button" class="btn btn-default btn-success">
                                    <a href="{{URL::to('/medicine')}}"><span class="glyphicon glyphicon-shopping-cart"></span>ShopMore</a>
                                </button>
                            </td>
                            <td>
                                <button onclick="print('#table')" type="button" class="btn btn-success">
                                   Checkout <span class="glyphicon glyphicon-play"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection