<table class="table table-responsive" id="orders-table">
    <thead>
        <th>Order Id</th>
        <th>Order Date</th>
        <th>Delivery Date</th>
        <th>Status</th>
        <th>Cake Text</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->order_id !!}</td>
            <td>{!! $order->created_at !!}</td>
            <td>{!! $order->delivery_date !!}</td>
            <td>
                @if($order->order_status == 0)
                    to delivery
                @else
                    Deliveried
                @endif
            </td>
            <td>{{$order->cake_text}}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('orderlist.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orderlist.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>