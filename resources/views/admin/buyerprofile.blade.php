<ul class="nav nav-pills mb-3 mt-2">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="to-receive-tab" data-toggle="pill" href="#to-receive">To Receive</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cancelled-tab" data-toggle="pill" href="#cancelled">Cancelled</a>
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
                @foreach($productDetails as $productDetail)
                <tr>
                    <td>{{$productDetail->name}}</td>
                    <td>₱{{$productDetail->price}}.00</td>
                    <td>{{$productDetail->status}}</td>
                </tr>
                @endforeach 
            </table>
        </div>
        <div class="tab-pane fade" id="to-receive">
        <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach($productDetails as $productDetail)
                @if($productDetail->status == "to ship")
                <tr>
                    <td>{{$productDetail->name}}</td>
                    <td>₱{{$productDetail->price}}.00</td>
                    <td>{{$productDetail->status}}</td>
                    <td> 
                        <form action="{{ route('cancelOrder')}}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $productDetail->id }}">
                            <button type="submit" class="btn btn-danger">Cancel Order</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach 
            </table>
        </div>
        <div class="tab-pane fade" id="cancelled">
        <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                @foreach($productDetails as $productDetail)
                @if($productDetail->status == "cancelled")
                <tr>
                    <td>{{$productDetail->name}}</td>
                    <td>₱{{$productDetail->price}}.00</td>
                    <td>{{$productDetail->status}}</td>
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
                @if($productDetail->status == "paid")
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