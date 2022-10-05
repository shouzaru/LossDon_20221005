@extends('layouts.app')
@section('content')



<div class="card-body">
<div class="card-title">
    トップページ/商品の詳細がここに表示される
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-7">
        <p><img src="{{asset('storage/ItemImage')}}{{'/'}}{{$item->ItemImage_path}}" alt="IMage" class="donation-img"></p>
        </div>

<div class="col-lg-5">
        <table>
    <tr>
            <th><p class="fs-6">JANcode</p></th>
            <td> <p class="fs-6">{{ $item->JANcode }}</p></td>
    </tr>
    <tr>
            <th><p class="fs-6">商品名</p></th>
            <td><p class="fs-6">{{ $item->ItemName }}</p></td>
            
    
</tr>
    <tr>
            <th><p class="fs-6">商品寸法</p></th>
            <td><p class="fs-6">{{$item->ItemSize }}</p></td>
    
</tr>
    <tr>
            <th><p class="fs-6">商品重量</p></th>
            <td><p class="fs-6">{{ $item->ItemWeight }}</p></td>
    
</tr>
    <tr>
            <th><p class="fs-6">商品寸法</p></th>
            <td><p class="fs-6">{{ $item->ItemSize }}</p></td>
    
</tr>
    <tr>
            <th><p class="fs-6">箱寸法</p></th>
            <td><p class="fs-6">{{ $item->BoxSize }}</p></td>
    
</tr>
    
    <tr>
            <th><p class="fs-6">温度帯</p></th>
            <td><p class="fs-6">{{ $item->TempRange }}</p></td>
    
</tr>
    <tr>
            <th><p class="fs-6">入り数</p></th>
            <td><p class="fs-6">{{ $item->NumofItems }}</p></td>
    
</tr>
    <tr>
            <th><p class="fs-6">納品済み</p></th>
            <td><p class="fs-6">{{$totalDel}}</p></td>
    
</tr>

    </table>

    
        <div class="row">
                <div class="col-2">
        <form action="{{ url('items/'.$item->id.'/edit') }}" method="GET"> {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">編集</button>
        </form>
        </div>
        <div class="col-5">
        <form action="{{ url('items/'.$item->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">商品マスタの削除</button>
        </form>
        </div>
        </div>
        </div>
    </div>
    <!-- 納品履歴 -->
<h3>納品履歴</h3>
    @foreach($deliveries as $delivery)  <!-- 納品テーブルから1件ずつ取り出す -->
        @if($delivery->donation_id === $donation->id) <!-- 納品テーブルの'item_id' と 商品テーブルの'id' が一致した時のみ -->
        <p> {{date("Y/m/d",strtotime($delivery->date))}}{{'：'}}{{$delivery->DeliveryQuantity}}</p>  <!-- 納品テーブルから 登録日時：納品数量 を取り出して表示する -->
        @endif
    @endforeach

<!--納品登録ボタン-->
<table>        
    <tr>
        <td>
            <form action="{{ url('deliveries') }}" method="POST"> 
                {{ csrf_field() }}

            <input type="hidden" name="donation_id" value="{{$donation->id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
            <input type="hidden" name="item_id" value="{{$donation->item_id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
            <p>納品日：<input type="date" name="date"></p>
            <p>納品数量：<input type="text" name="DeliveryQuantity"></p>
            <button type="submit" class="btn btn-primary">納品登録</button>
            </form>
        </td>
    </tr>
</table>
</div>

@endsection