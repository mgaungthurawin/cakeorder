<table class="table table-responsive" id="customers-table">
    <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->name !!}</td>
            <td>{!! $customer->phone !!}</td>
            <td>{!! $customer->address !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>