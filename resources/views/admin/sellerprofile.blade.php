<div class="container">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="to-receive-tab" data-toggle="pill" href="#approved">Approved</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="declined-tab" data-toggle="pill" href="#declined">Declined</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ship-tab" data-toggle="pill" href="#toShip">To Ship</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="settled-tab" data-toggle="pill" href="#settled">Settled</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all">
                    <table class="table">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>₱{{$product->price}}.00</td>
                            <td>{{$product->availability}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="tab-pane fade" id="approved">
                <table class="table">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach($products as $product)
                        @if($product->availability == "approved")
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>₱{{$product->price}}.00</td>
                            <td>{{$product->availability}}</td>
                            <td> <a href="{{route('editProduct',$product->id)}}" class="btn btn-success"> Edit</a> </td>
                            <td>
                                <form action="{{route('deleteProduct',$product->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach 
                    </table>
                </div>

                <div class="tab-pane fade" id="declined">
                <table class="table">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        @foreach($products as $product)
                        @if($product->availability == "declined")
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>₱{{$product->price}}.00</td>
                            <td>{{$product->availability}}</td>
                        </tr>
                        @endif
                        @endforeach 
                    </table>
                </div>
                <div class="tab-pane fade" id="toShip">
                    <table class="table">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Buyer Name:</th>
                            <th>Buyer Message</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($productDetails as $productDetail)
                        @if($productDetail->status == "to ship")
                        <tr>
                            <td>{{$productDetail->name}}</td>
                            <td>₱{{$productDetail->price}}.00</td>
                            <td> {{$productDetail->availability}} </td>
                            <td> {{$productDetail-> buyer_name}} {{$productDetail-> buyer_lastname}}  </td>
                            <td>{{$productDetail->message}}</td>
                            <td>
                                <form action="{{route('orderSettled')}}" method="POST">
                                    @csrf
                                    <input type="hidden" id="product_id" name="product_id" value="{{$productDetail->order_id}}">
                                    <button type="submit" class="btn btn-primary">Order Delivered</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach 
                    </table>
                </div>
                <div class="tab-pane fade" id="settled">
                    <table class="table">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        @foreach($productDetails as $productDetail)
                        @if($productDetail->status == "sold")
                        <tr>
                            <td>{{$productDetail->name}}</td>
                            <td>₱{{$productDetail->price}}.00</td>
                            <td>{{$productDetail->status}}</td>
                        </tr>
                        @endif
                        @endforeach 
                    </table>
                </div>
            </div>
        </div>