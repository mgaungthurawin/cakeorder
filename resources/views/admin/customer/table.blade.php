<table class="table table-responsive" id="customers-table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>
                <input type="checkbox" name='customer' id="customer" value="{{$customer->id}}">
            </td>
            <td>{!! $customer->name !!}</td>
            <td>{!! $customer->phone !!}</td>
            <td>{!! $customer->address !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>