<table class="table table-responsive" id="orders-table">
    <thead>
        <th>Order Id</th>
        <th>Order Date</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->order_id !!}</td>
            <td>{!! $order->created_at !!}</td>
            <td>
                @if($order->order_status == 0)
                    to delivery
                @else
                    Deliveried
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['orderlist.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orderlist.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orderlist.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>