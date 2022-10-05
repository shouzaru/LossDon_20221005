@extends('layouts.app')
@section('content')




<div class="container mt-5">
    <div class="row">
        <div class="col-lg-7">

        <table>
            <tr>
            <th>商品名</th>
            <td>{{ $item->ItemName }}</td>
            </tr>
        </table>
        <p><img class="donation-img" src="{{asset('storage/ItemImage')}}{{'/'}}{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></p>
        </div>
    
        <div class="col-lg-5">
        




<!--納品登録ボタン-->
        <form action="{{ url('donations') }}" method="POST" class="form-horizontal mt-3" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="item_id" value="{{$item->id}}">
                <div class="col-sm-6">
                    <label for="JAN">今回の寄付数</label>
                    <input type="text" name="Inventory" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="JAN">賞味期限</label>
                    <input type="date" name="BestBefore" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="JAN">在庫地</label>
                    <input type="text" name="StorageLocation" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="JAN">在庫期限</label>
                    <input type="date" name="InventoryDeadline" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="JAN">納期</label>
                    <input type="text" name="DeliveryDate" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="JAN">荷姿</label>
                    <input type="text" name="Packing" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="JAN">備考</label>
                    <input type="text" name="remarks" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">寄付商品として登録</button>
                
        </form>

</div>
</div>



@endsection