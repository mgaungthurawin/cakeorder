@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Order
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::open(['route' => ['orderlist.update', $order->id], 'method' => 'patch']) !!}

                        <div class="form-group col-sm-6">
                            {!! Form::label('orderid', 'Order No:') !!}
                            <input class="form-control" type="text" name="order_id" value="{{ $order->order_id}}">
                        </div>

                        <div class="col-sm-6">

                            {!! Form::label('order_status', 'Order Status:') !!}
                                <br>
                                <input type="checkbox" name="order_status" value="1">
                        </div>
                        
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('orderlist.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection