<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        Google Reviews List
    </title>
</head>
<body>
    <h1> Transfer Goods List  </h1>


    <h1> Enter Details </h1>


    <section class="content content--full">
        <div class="content-wrapper">
            @if(empty($purchase->id))
                <form id="add-purchase-form" class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
                      action="{{ url('purchase/save') }}"  novalidate="novalidate">
                    @else
                    <form id="add-purchase-form" class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
                          action="{{ url('purchase/update') }}"  novalidate="novalidate">
                    @endif
                    {{ csrf_field() }}
                    <div class="card">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" style="text-align:center;">{{Session::get('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <div class="alert alert-success alert-dismissible fade show" style="text-align:center;" id="message"></div>
                        <div class="card-header">
                            @if(empty($purchase->id))
                                <h1>Add Purchase</h1>
                            @else
                                <h1>Edit Purchase</h1>
                            @endif
                        </div>
                        <div class="card-block">
                          <div class=row>
                            @if(!empty(@$purchase->id))
                             <div class="col-sm-4">
                                 <div class="form-group {{ $errors->has('id') ? ' has-error' : '' }}">
                                     <label>Purchase ID</label>
                                     <input type="text" class="form-control input-mask" name="id"
                                     id="id" value="{{@$purchase->id}}" disabled="true">
                                 </div>
                             </div>
                             @endif
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('warehouse_id') ? ' has-error' : '' }}">
                                    <label>Warehouse Name</label>
                                    <select class="select2" name="warehouse_id" id="warehouse_id">
                                        <option disabled selected>Select Warehouse name</option>
                                        @foreach($warehouse as $warehouses => $value)
                                            <option value="{{$value->id}}" {{((@$purchase->warehouse_id == $value->id) ? "selected" : "")}}>{{@$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                          </div>
                            <div class="row">
                                <input type="hidden" name="token" id="token" value="{{@csrf_token()}}">
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('invoice_number') ? ' has-error' : '' }}">
                                        <label>Invoice Number</label>
                                        <input type="text" class="form-control input-mask" name="invoice_number"
                                        id="invoice_number" value="{{@$purchase->invoice_number}}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-left: 30%;">
                                    <div class="form-group">
                                        <label>Order Status:</label>
                                        <select class="select2" name="order_status" id="order_status" class="form-control" autofocus>
                                            <option disabled selected>Select Order Status</option>
                                            <option value="ORDERED" {{((@$purchase->order_status == 'ORDERED') ? "selected" : "")}}>{{'ORDERED'}}</option>
                                            <option value="SHIPPED" {{((@$purchase->order_status  == 'SHIPPED') ? "selected" : "")}}>{{'SHIPPED'}}</option>
                                            <option value="DELIVERED" {{((@$purchase->order_status  == 'DELIVERED') ? "selected" : "")}}>{{'DELIVERED'}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('invoice_date') ? ' has-error' : '' }}">
                                        <label>Invoice Date</label>
                                        <input type="date" class="form-control input-mask" name="invoice_date"
                                               id="invoice_date"
                                               value="{{@$purchase->invoice_date}}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-left: 30%;">
                                    <div class="form-group {{ $errors->has('due_date') ? ' has-error' : '' }}">
                                        <label>Due Date</label>
                                        <input type="date" class="form-control input-mask" name="due_date"
                                               id="due_date"
                                               value="{{@$purchase->due_date}}" required autofocus>
                                        <i class="form-group__bar"></i>
                                        @if ($errors->has('due_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('due_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('state_of_origin') ? ' has-error' : '' }}">
                                        <label>State of Origin</label>
                                        <select class="select2" name="state_place_of_origin"
                                                id="state_place_of_origin" class="form-control" required autofocus>
                                            <option selected disabled>Select State</option>
                                            <option value="Andaman and Nicobar Islands" {{((@$purchase->state_place_of_origin == 'Andaman and Nicobar Islands') ? "selected" : "")}}>{{'Andaman and Nicobar Islands'}}</option>
                                            <option value="Andhra Pradesh" {{((@$purchase->state_place_of_origin == 'Andhra Pradesh') ? "selected" : "")}}>{{'Andhra Pradesh'}}</option>
                                            <option value="Arunachal Pradesh" {{((@$purchase->state_place_of_origin == 'Arunachal Pradesh') ? "selected" : "")}}>{{'Arunachal Pradesh'}}</option>
                                            <option value="Assam" {{((@$purchase->state_place_of_origin == 'Assam') ? "selected" : "")}}>{{'Assam'}}</option>
                                            <option value="Bihar" {{((@$purchase->state_place_of_origin == 'Bihar') ? "selected" : "")}}>{{'Bihar'}}</option>
                                            <option value="Chandigarh" {{((@$purchase->state_place_of_origin == 'Chandigarh') ? "selected" : "")}}>{{'Chandigarh'}}</option>
                                            <option value="Chattisgarh" {{((@$purchase->state_place_of_origin == 'Chattisgarh') ? "selected" : "")}}>{{'Chattisgarh'}}</option>
                                            <option value="Dadra and Nagar Haveli" {{((@$purchase->state_place_of_origin == 'Dadra and Nagar Haveli') ? "selected" : "")}}>{{'Dadra and Nagar Haveli'}}</option>
                                            <option value="Daman and Diu" {{((@$purchase->state_place_of_origin == 'Daman and Diu') ? "selected" : "")}}>{{'Daman and Diu'}}</option>
                                            <option value="Delhi" {{((@$purchase->state_place_of_origin == 'Delhi') ? "selected" : "")}}>{{'Delhi'}}</option>
                                            <option value="Goa" {{((@$purchase->state_place_of_origin == 'Goa') ? "selected" : "")}}>{{'Goa'}}</option>
                                            <option value="Gujarat" {{((@$purchase->state_place_of_origin == 'Gujarat') ? "selected" : "")}}>{{'Gujarat'}}</option>
                                            <option value="Haryana" {{((@$purchase->state_place_of_origin == 'Haryana') ? "selected" : "")}}>{{'Haryana'}}</option>
                                            <option value="Himachal Pradesh" {{((@$purchase->state_place_of_origin == 'Himachal Pradesh') ? "selected" : "")}}>{{'Himachal Pradesh'}}</option>
                                            <option value="Jammu and Kashmir" {{((@$purchase->state_place_of_origin == 'Jammu and Kashmir') ? "selected" : "")}}>{{'Jammu and Kashmir'}}</option>
                                            <option value="Jharkhand" {{((@$purchase->state_place_of_origin == 'Jharkhand') ? "selected" : "")}}>{{'Jharkhand'}}</option>
                                            <option value="Karnataka" {{((@$purchase->state_place_of_origin == 'Karnataka') ? "selected" : "")}}>{{'Karnataka'}}</option>
                                            <option value="Kerala" {{((@$purchase->state_place_of_origin == 'Kerala') ? "selected" : "")}}>{{'Kerala'}}</option>
                                            <option value="Haryana" {{((@$purchase->state_place_of_origin == 'Haryana') ? "selected" : "")}}>{{'Haryana'}}</option>
                                            <option value="Lakshadweep Islands" {{((@$purchase->state_place_of_origin == 'Lakshadweep Islands') ? "selected" : "")}}>{{'Lakshadweep Islands'}}</option>
                                            <option value="Madhya Pradesh" {{((@$purchase->state_place_of_origin == 'Madhya Pradesh') ? "selected" : "")}}>{{'Madhya Pradesh'}}</option>
                                            <option value="Maharashtra" {{((@$purchase->state_place_of_origin == 'Maharashtra') ? "selected" : "")}}>{{'Maharashtra'}}</option>
                                            <option value="Manipur" {{((@$purchase->state_place_of_origin == 'Manipur') ? "selected" : "")}}>{{'Manipur'}}</option>
                                            <option value="Meghalaya" {{((@$purchase->state_place_of_origin == 'Meghalaya') ? "selected" : "")}}>{{'Meghalaya'}}</option>
                                            <option value="Mizoram" {{((@$purchase->state_place_of_origin == 'Mizoram') ? "selected" : "")}}>{{'Mizoram'}}</option>
                                            <option value="Nagaland" {{((@$purchase->state_place_of_origin == 'Nagaland') ? "selected" : "")}}>{{'Nagaland'}}</option>
                                            <option value="Odisha" {{((@$purchase->state_place_of_origin == 'Odisha') ? "selected" : "")}}>{{'Odisha'}}</option>
                                            <option value="Pondicherry" {{((@$purchase->state_place_of_origin == 'Pondicherry') ? "selected" : "")}}>{{'Pondicherry'}}</option>
                                            <option value="Punjab" {{((@$purchase->state_place_of_origin == 'Punjab') ? "selected" : "")}}>{{'Punjab'}}</option>
                                            <option value="Rajasthan" {{((@$purchase->state_place_of_origin == 'Rajasthan') ? "selected" : "")}}>{{'Rajasthan'}}</option>
                                            <option value="Sikkim" {{((@$purchase->state_place_of_origin == 'Sikkim') ? "selected" : "")}}>{{'Sikkim'}}</option>
                                            <option value="Tamil Nadu" {{((@$purchase->state_place_of_origin == 'Tamil Nadu') ? "selected" : "")}}>{{'Tamil Nadu'}}</option>
                                            <option value="Telangana" {{((@$purchase->state_place_of_origin == 'Telangana') ? "selected" : "")}}>{{'Telangana'}}</option>
                                            <option value="Tripura" {{((@$purchase->state_place_of_origin == 'Tripura') ? "selected" : "")}}>{{'Tripura'}}</option>
                                            <option value="Uttar Pradesh" {{((@$purchase->state_place_of_origin == 'Uttar Pradesh') ? "selected" : "")}}>{{'Uttar Pradesh'}}</option>
                                            <option value="Uttarakhand" {{((@$purchase->state_place_of_origin == 'Uttarakhand') ? "selected" : "")}}>{{'Uttarakhand'}}</option>
                                            <option value="West Bengal" {{((@$purchase->state_place_of_origin == 'West Bengal') ? "selected" : "")}}>{{'West Bengal'}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-left: 30%;">
                                    <div class="form-group">
                                        <label>Payment Mode</label>
                                        <select class="select2" name="payment_mode" id="payment_mode" class="form-control"
                                                required autofocus>
                                            <option disabled selected>Select Payment Mode</option>
                                            <option value="NEFT" {{((@$purchase->payment_mode == 'NEFT') ? "selected" : "")}}>{{'NEFT'}}</option>
                                            <option value="Cheque" {{((@$purchase->payment_mode  == 'Cheque') ? "selected" : "")}}>{{'Cheque'}}</option>
                                            <option value="Cash" {{((@$purchase->payment_mode  == 'Cash') ? "selected" : "")}}>{{'Cash'}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('billing_name') ? ' has-error' : '' }}">
                                        <label>Billing Name</label>
                                        <input type="text" class="form-control input-mask" name="billing_name" id="billing_name"value="{{@$purchase->billing_name}}">
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-left: 30%;">
                                    <div class="form-group {{ $errors->has('payment_amount') ? ' has-error' : '' }}">
                                        <label>Payment Amount</label>
                                        <input type="text" class="form-control input-mask" name="payment_amount"
                                               id="payment_amount"
                                               value="{{@$purchase->payment_amount}}" required autofocus>
                                        <i class="form-group__bar"></i>
                                        @if ($errors->has('payment_amount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('payment_amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-4">
                                  <div class="form-group {{ $errors->has('vendor_id') ? ' has-error' : '' }}">
                                      <label>Vendor Name</label>
                                      <select class="select2" name="vendor_id" id="vendor_id">
                                          <option disabled selected>Select Vendor name</option>
                                          @foreach($vendor as $vendors => $value)
                                              <option value="{{$value->id}}" {{((@$purchase->vendor_id == $value->id) ? "selected" : "")}}>{{@$value->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="col-sm-2" style="margin-left: 30%;">
                                  <div class="form-group {{ $errors->has('payment_reference') ? ' has-error' : '' }}">
                                      <label>Payment Reference</label>
                                      <input type="text" class="form-control input-mask" name="payment_reference"
                                             id="payment_reference"
                                             value="{{@$purchase->payment_reference}}" required autofocus>
                                      <i class="form-group__bar"></i>
                                      @if ($errors->has('payment_reference'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('payment_reference') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('payment_date') ? ' has-error' : '' }}">
                                            <label>Payment Date</label>
                                            <input type="date" class="form-control input-mask" name="payment_date"
                                                   id="payment_date"
                                                   value="{{@$purchase->payment_date}}" required autofocus>
                                            <i class="form-group__bar"></i>
                                            @if ($errors->has('payment_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('payment_date') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-left: 30%;">
                                    <div class="form-group {{ $errors->has('payment_reference') ? ' has-error' : '' }}">
                                        <label>Payment Status</label>
                                            <select class="select2" name="payment_status" id="payment_status" class="form-control"
                                                    required autofocus>
                                                <option disabled selected>Select Payment Status</option>
                                                <option value="Paid" {{((@$purchase->payment_status == 'Paid') ? "selected" : "")}}>{{'Paid'}}</option>
                                                <option value="Unpaid" {{((@$purchase->payment_status  == 'Unpaid') ? "selected" : "")}}>{{'Unpaid'}}</option>
                                                <option value="Scheduled" {{((@$purchase->payment_status  == 'Scheduled') ? "selected" : "")}}>{{'Scheduled'}}</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group {{ $errors->has('total_transaction_value') ? ' has-error' : '' }}">
                                        <label>Total Transction</label>
                                        <input type="text" class="form-control input-mask"
                                               name="total_transaction_value" id="total_transaction_value"
                                               value="{{@$purchase->total_transaction_value}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <h1>Products</h1>
                                    </div>
                                </div>
                                @if(empty($purchase->id))
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" id="add" class="btn btn-success btn-lg btn--icon waves-effect" style="float: right" data-placement="top" data-original-title="Add Product">
                                            <i class="zmdi zmdi-plus-circle-o"></i>
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-xs-12" id="box">
                                @if(!empty($purchase->product_id))
                                <?php $var = 0;?>
                                <input type="hidden" name="pro_cnt" id="pro_cnt"
                                       value="<?php echo count($pro_edit);?>">
                                @foreach($pro_edit as $product_edit)

                                    <?php $var++;?>
                                    <div class="row" name="multi[]" id="multi{{$var}}">
                                      <div class="col-sm-9">
                                        <div class="row">
                                        <div class="col-sm-4">
                                          <input type="hidden" id="purchase{{$var}}" value="{{$product_edit->id}}"/>
                                            <div class="form-group">
                                                <label>Product</label>
                                                <select class="select2" name="product[]" id="product{{$var}}">
                                                    <option disabled selected>Select Product</option>
                                                    @foreach($products as $product => $value)
                                                        <option value="{{$value->id}}" {{((@$product_edit->product_id == $value->id) ? "selected" : "")}}>{{@$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Rate</label>
                                                <input type="number" min="1.00" class="form-control rate input-mask" name="rate[]"
                                                       id="rate{{@$var}}" value="{{@$product_edit->item_rate}}"
                                                       oninput="calculate(<?php echo $var; ?>);" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Quatity</label>
                                                <input type="number" class="form-control input-mask" name="qty[]"
                                                       id="qty{{@$var}}"
                                                       value="{{@$product_edit->item_quantity}}"
                                                       oninput="calculate(<?php echo $var; ?>);" required>
                                            </div>
                                        </div>
                                        @if($purchase->state_place_of_origin == 'Maharashtra')
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>CGST %</label>
                                                    <select class="select2 pr_select" pr="1" name="cgst_percent[]"
                                                            id="cgst_percent{{@$var}}"
                                                            onchange="purchase_gst(<?php echo $var; ?>);">
                                                        <option value="0" {{((@$product_edit->cgst_percentage == '0') ? "selected" : "")}}>
                                                            0
                                                        </option>
                                                        <option value="2.5" {{((@$product_edit->cgst_percentage == '2.5') ? "selected" : "")}}>
                                                            2.5
                                                        </option>
                                                        <option value="6" {{((@$product_edit->cgst_percentage == '6') ? "selected" : "")}}>
                                                            6
                                                        </option>
                                                        <option value="9" {{((@$product_edit->cgst_percentage == '9') ? "selected" : "")}}>
                                                            9
                                                        </option>
                                                        <option value="14" {{((@$product_edit->cgst_percentage == '14') ? "selected" : "")}}>
                                                            14
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>CGST Amount</label>
                                                    <input type="number" class="form-control input-mask"
                                                           name="cgst[]"
                                                           id="cgst{{@$var}}"
                                                           value="{{@(isset($product_edit->cgst_amount) ? $product_edit->cgst_amount : '0.00')}}"
                                                           oninput="calculate(<?php echo $var; ?>);">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>SGST %</label>
                                                    <select class="select2 pr_select" pr="1" name="sgst_percent[]"
                                                            id="sgst_percent{{@$var}}"
                                                            onchange="purchase_gst(<?php echo $var; ?>);">
                                                        <option value="0" {{((@$product_edit->sgst_percentage == '0') ? "selected" : "")}}>
                                                            0
                                                        </option>
                                                        <option value="2.5" {{((@$product_edit->sgst_percentage == '2.5') ? "selected" : "")}}>
                                                            2.5
                                                        </option>
                                                        <option value="6" {{((@$product_edit->sgst_percentage == '6') ? "selected" : "")}}>
                                                            6
                                                        </option>
                                                        <option value="9" {{((@$product_edit->sgst_percentage == '9') ? "selected" : "")}}>
                                                            9
                                                        </option>
                                                        <option value="14" {{((@$product_edit->sgst_percentage == '14') ? "selected" : "")}}>
                                                            14
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>SGST Amount</label>
                                                    <input type="number" class="form-control input-mask"
                                                           name="sgst[]"
                                                           id="sgst{{@$var}}"
                                                           value="{{@(isset($product_edit->sgst_amount) ? $product_edit->sgst_amount : '0.00')}}"
                                                           oninput="calculate(<?php echo $var; ?>);">
                                                </div>
                                            </div>
                                        @endif
                                        @if($purchase->state_place_of_origin != 'Maharashtra')
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>IGST %</label>
                                                    <select class="select2 pr_select" pr="1" name="igst_percent[]"
                                                            id="igst_percent{{@$var}}"
                                                            onchange="purchase_gst(<?php echo $var; ?>);" required>
                                                        <option value="0" {{((@$product_edit->igst_percentage == '0') ? "selected" : "")}}>
                                                            0
                                                        </option>
                                                        <option value="5" {{((@$product_edit->igst_percentage == '5') ? "selected" : "")}}>
                                                            5
                                                        </option>

                                                        <option value="12" {{((@$product_edit->igst_percentage == '12') ? "selected" : "")}}>
                                                            12
                                                        </option>
                                                        <option value="18" {{((@$product_edit->igst_percentage == '18') ? "selected" : "")}}>
                                                            18
                                                        </option>
                                                        <option value="28" {{((@$product_edit->igst_percentage == '28') ? "selected" : "")}}>
                                                            28
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label>IGST Amount</label>
                                                    <input type="number" class="form-control input-mask"
                                                           name="igst[]"
                                                           id="igst{{@$var}}"
                                                           value="{{@(isset($product_edit->igst_amount) ? $product_edit->igst_amount : '0.00')}}"
                                                           oninput="calculate(<?php echo $var; ?>);">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="number" class="form-control input-mask" name="total[]"
                                                       id="total{{$var}}"
                                                       value="{{@$product_edit->item_sub_total}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <button type="button" count="{{$var}}" name="delete[]"
                                                        id="delete{{$var}}" del_purchase_id = "{{$product_edit->id}}" class="btn btn-danger btn-lg btn--icon waves-effect purchase_delete"
                                                        style="float: right" data-toggle="tooltip" data-placement="top" data-original-title="Delete Product">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <div class="row">
                                          <div class="col-sm-4">
                                              <div class="form-group">
                                                  <label>Qty(F)</label>
                                                  @if(isset($product_edit->fullfillable_qty))
                                                  <input type="number" class="form-control input-mask" name="fquantity[]"
                                                         id="fquantity{{$var}}"
                                                         value="{{@$product_edit->fullfillable_qty}}" readonly>
                                                  @else
                                                    <input type="number" class="form-control input-mask" name="fquantity[]"
                                                         id="fquantity{{$var}}"
                                                         value="0" min = "0">
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="col-sm-4">
                                              <div class="form-group">
                                                  <label>Qty(Un. F)</label>
                                                  @if(isset($product_edit->unfullfillable_qty))
                                                    <input type="number" class="form-control input-mask" name="ufquantity[]"
                                                         id="ufquantity{{$var}}"
                                                         value="{{@$product_edit->unfullfillable_qty}}" readonly>
                                                  @else
                                                    <input type="number" class="form-control input-mask" name="ufquantity[]"
                                                       id="ufquantity{{$var}}"
                                                       value="0" min = "0">
                                                  @endif
                                              </div>
                                          </div>
                                          @if(!isset($product_edit->unfullfillable_qty))
                                          <div class="col-sm-4">
                                              <div class="form-group">
                                                <button type="button" count="{{$var}}" name="confirm[]"
                                                        id="confirm{{$var}}" class="btn btn-success btn-lg btn--icon waves-effect verify_fulfill"
                                                        style="float: right" data-toggle="tooltip" data-placement="top" data-original-title="Verify Quantity">
                                                    <i class="zmdi zmdi-thumb-up"></i>
                                                </button>
                                              </div>
                                          </div>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                            @if(!empty($purchase->id))
                            <div class="row" style="margin-bottom:20px">
                              <div class="col-sm-4">
                                <h3><i class="fa fa-comments "></i> Comments</h3>
                              </div>
                            </div>
                            <div class="col-sm-12" id="comment_box">
                              @foreach($comments as $comment)
                              <div class="row" style="margin-bottom:20px">
                                <div class="col-sm-12">
                                  <h5>{{$comment->user['name']}}</h5>
                                </div>
                                <div class="col-sm-12" style="margin-bottom: 10px">
                                  <span>{{ date('F jS, Y - g:iA',strtotime(@$comment->created_at)) }}</span>
                                </div>
                                <div class="col-sm-12">
                                  <p>{{$comment['message']}}</p>
                                </div>
                              </div>
                              @endforeach
                            </div>
                              <div class="row">
                                  <div class="col-sm-12">
                                    <h6>{{@$user->name}}</h6>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">

                                          <textarea name="comment" id="comment" class="form-control" rows="2" value="{{@$purchase->comment}}" placeholder="
                                            Enter your comment">{{@$purchase->comment}}</textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <button type="button" class="btn btn-success btn-lg btn--icon waves-effect" id="submit_comment"
                                             data-toggle="tooltip" data-placement="top" data-original-title="Submit Comment">
                                        <i class="zmdi zmdi-comment-alt"></i>
                                    </button>
                                  </div>
                              </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="pro_cnt" id="pro_cnt"
                                           value="0">
                                    @if(empty($purchase->id))
                                        <button type="submit" class="btn btn-success btn-lg btn--icon waves-effect"
                                                style="float: right" data-toggle="tooltip" data-placement="top" data-original-title="Save Purchase">
                                            <i class="zmdi zmdi-check"></i>
                                        </button>
                                    @else
                                        <input type="hidden" name="purchase_id" id="purchase_id"
                                               value="{{@$purchase->id}}">
                                        <button type="submit" class="btn btn-success btn-lg btn--icon waves-effect" style="float: right" data-toggle="tooltip" data-placement="top" data-original-title="Update Purchase">
                                            <i class="zmdi zmdi-refresh"></i>
                                        </button>
                                    @endif
                                    <a class="btn btn-primary btn-lg btn--icon waves-effect" style="float: right;margin-bottom: 20px;margin-right: 20px" href="{{ URL('purchase') }}" data-toggle="tooltip" data-placement="top" data-original-title="Cancel">
                                        <i class="zmdi zmdi-close"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>

        <div class="modal fade" id="error_dialog" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Message</h5>
                    </div>
                    <div class="modal-body">
                        <p id="error_text">Comment should not be blank, please add comment text.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#add").click(function () {
                var state = $('#state_place_of_origin').val();
                //console.log(state);
                var count = $('#pro_cnt').val();
                //console.log(count);
                if (count < 100) {
                    count++;
                    var data = '<div class="row" name="multi[]" id=multi' + count + '> <div class="col-sm-12"><div class="row"><div class="col-sm-3"> <div class="form-group"> <label>Product</label> <select class="select2" name="product[]" id=product' + count + '> <option disabled selected required>Select Product</option>@foreach($products as $product => $value)<option value="{{$value->id}}">{{@$value->name}}</option>@endforeach</select> </div> </div> <div class="col-sm-1"> <div class="form-group"> <label>Rate</label> <input type="number" min="1.00" class="form-control rate input-mask" name="rate[]" id=rate' + count + ' value=""oninput="calculate(' + count + ');" required> </div> </div> <div class="col-sm-1"> <div class="form-group"> <label>Quatity</label> <input type="number" class="form-control input-mask" name="qty[]"id=qty' + count + ' value="" oninput="calculate(' + count + ');" required> </div> </div>'; if(state == "Maharashtra"){ data +=' <div class="col-sm-1"> <div class="form-group"> <label>CGST %</label> <select class="select2 pr_select" pr="1" name="cgst_percent[]" id=cgst_percent' + count + ' onchange="purchase_gst(' + count + ');" required> <option value="0" >0</option> <option value="2.5" >2.5</option> <option value="6">6</option> <option value="9">9</option><option value="14">14</option></select> </div> </div> <div class="col-sm-1"> <div class="form-group"> <label>CGST Amount</label> <input type="number" class="form-control input-mask" name="cgst[]"id=cgst' + count + ' value=""oninput="calculate(' + count + ');" required> </div> </div><div class="col-sm-1"> <div class="form-group"> <label>SGST %</label> <select class="select2 pr_select" pr="1" name="sgst_percent[]" id=sgst_percent' + count + ' onchange="purchase_gst(' + count + ');" required> <option value="0">0</option> <option value="2.5">2.5</option> <option value="6">6</option> <option value="9">9</option> <option value="14">14</option></select> </div> </div><div class="col-sm-1"> <div class="form-group"> <label>SGST Amount</label> <input type="number" class="form-control input-mask" name="sgst[]"id=sgst' + count + ' value=""oninput="calculate(' + count + ');"> </div> </div>'; } else{ data +=' <div class="col-sm-1"> <div class="form-group"> <label>IGST %</label> <select class="select2 pr_select" pr="1" name="igst_percent[]" id=igst_percent' + count + ' onchange="purchase_gst(' + count + ');" required><option value="0">0</option> <option value="5">5</option>  <option value="12">12</option> <option value="18">18</option> <option value="28">28</option></select> </div> </div><div class="col-sm-1"> <div class="form-group"> <label>IGST Amount</label> <input type="number" class="form-control input-mask" name="igst[]"id=igst' + count + ' value=""oninput="calculate(' + count + ');" required> </div> </div>';}
                    data += '<div class="col-sm-1"> <div class="form-group"> <label>Total</label> <input type="number" class="form-control input-mask" name="total[]"id=total' + count + ' value="" required> </div> </div><div class="col-sm-1"> <div class="form-group"> <button type="button" count="' + count + '" name="delete[]" id=delete' + count + ' class="btn btn-danger btn-lg btn--icon waves-effect purchase_delete" style="float: right" data-toggle="tooltip" data-placement="top" data-original-title="Delete Product"><i class="zmdi zmdi-delete"></i> </button> </div></div>   </div>';
                    +
                        $("form div#box").append(data);
                    $(".select2").select2({
                        width: '100%'
                    });
                    $('#pro_cnt').val(count);
                } else {
                    alert('You can add max 100 products only');
                }
            });

            $('#submit_comment').click( function(){
              var token = $('#token').val();
              var comment = $('#comment').val();
              var purchase_id = $('#id').val();
              var user_email = $('.user__email').text();
              if(comment == ''){
                $('#error_dialog').modal('show');

                setTimeout(function() {
                    $('#error_dialog').modal('hide');
                }, 5000);
              }
              else{
                  var data = '_token='+ token +'&user_email='+ user_email +'&purchase_id='+ purchase_id +'&comment='+ comment;
                  console.log(data);

                  $.ajax({
                      type: 'POST',
                      url: '/purchase/submitComment',
                      data: data,
                      success: function (result) {
                          console.log(result);
                         // return false;
                         var a = $.parseJSON(result);
                          if (a.status == 'true') {
                            $('#comment_box').html('');
                            $('#comment').val('');
                            var data = '';
                            $.each(a['comment'], function(array,value) {
                              var date = value.created_at;
                              data += '<div class="row" style="margin-bottom:20px"><div class="col-sm-12"><h5>'+ value.user.name +'</h5></div>';
                              data += '<div class="col-sm-12" style="margin-bottom: 10px"><span>'+ converter(date) +'</span></div>';
                              data += '<div class="col-sm-12"><p>'+ value.message +'</p></div></div>';
                            });
                            function converter(s) {
                              var months = ['January', 'February', 'March', 'April', 'May', 'Junw', 'July', 'August', 'September', 'Octomber', 'November', 'December'];
                              s =  s.replace(/-/g, '/');
                              var d = new Date(s);

                              var hour = d.getHours();

                              return months[d.getMonth()] + ' ' + d.getDate() + 'th,' + d.getFullYear() + ' - ' + (hour % 12) + ':' + d.getMinutes() + ' ' + (hour > 11 ? 'pm' : 'am');
                            }

                            $('#comment_box').html(data);
                            $('#error_text').text('Comment added successfully !!!!!');
                            $('#error_dialog').modal('show');

                            setTimeout(function() {
                                $('#error_dialog').modal('hide');
                            }, 5000);
                          }
                          else{
                            $('#comment').val('');
                            $('#error_text').text('Unable submit comment, please try again !!!!!');
                            $('#error_dialog').modal('show');

                            setTimeout(function() {
                                $('#error_dialog').modal('hide');
                            }, 5000);
                          }
                      }
                    });
              }
            });
        });
    </script>







 </body>
 </html>