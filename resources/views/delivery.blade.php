@extends('layouts.app')
@section('content')


<!-- Item: 登録されてる商品のリスト -->
@if (count($items) > 0)
@if (count($donations) > 0)
@foreach ($items as $item)
@foreach ($donations as $donation)
@if($item->id === $donation->item_id)
<div>
    <!-- <a href="{{route('deliveries.edit',$item->id)}}"><img src="storage/ItemImage/{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></a> -->
    <p><img src="storage/ItemImage/{{$item->ItemImage_path}}" alt="IMage" class="img-fluid"></p>
    <table>
    <tr>
            <th>donation->id</th>
            <td>{{ $donation->id }}</td>
        </tr>
    <tr>
            <th>donation->item_id</th>
            <td>{{ $donation->item_id }}</td>
        </tr>

        <tr>
            <th>商品名</th>
            <td>{{ $item->ItemName }}</td>
        </tr>
        <tr>
        <th>今回の寄付数</th>
            <td>{{ $donation->Inventory }}</td>
        </tr>
        <tr>
            <th>納品済み</th>
            <!-- 納品済み数を計算 -->
            @php
            $totalDel=0;
            foreach($deliveries as $delivery){
                if($delivery->donation_id === $donation->id){
                $del = $delivery->DeliveryQuantity;
                $totalDel = $totalDel + $del;
                }
            }
            @endphp
            <td>{{$totalDel}}</td>
        </tr>

        <tr>
            <th>賞味期限</th>
            <td>{{ date("Y/m/d",strtotime($donation->BestBefore)) }}</td>
        </tr>
        <tr>
            <th>在庫期限</th>
            <td>{{ date("Y/m/d", strtotime($donation->InventoryDeadline)) }}</td>
        </tr>
    </table>
</div>



<table>
    <tr>
        <td>
            <form action="{{ route('deliveries.edit',$donation->id) }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-success">納品情報登録画面へ</button>
            <input type="hidden" name="donation_id" value="{{$donation->id}}">  <!-- deliveryテーブルのdonatio_idカラムに入れるための値を送信 -->
            <input type="hidden" name="item_id" value="{{$donation->item_id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
            </form>
        </td>
    </tr>    
</table>

@endif
@endforeach
@endforeach
@endif
@endif
@endsection