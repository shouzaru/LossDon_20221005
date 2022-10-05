@extends('layouts.app')
@section('content')


<!-- Item: 既に登録されてる商品のリスト -->
@if (count($items) > 0)
<div class="container">
        <div class="card-title">
            商品マスタ一覧
        </div>
        <div class="row">
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped tsk-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>JANコード/ITFコード</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>商品寸法</th>
                        <th>商品重量</th>
                        <th>箱寸法（外寸）</th>
                        <th>入数</th>
                        <th>小売希望価格</th>
                       
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <!-- JAN -->
                                <td class="table-text">
                                    <div>{{ $item->JANcode }}</div>
                                </td>
                                <!-- 商品画像 -->
                                <td class="table-text">
                                <img class="table-img" src="storage/ItemImage/{{$item->ItemImage_path}}"  alt="Mage" />
                                </td>
                                <!-- 商品名 -->
                                <td class="table-text">
                                    <div>{{ $item->ItemName }}</div>
                                </td>
                                <!-- 商品重量 -->
                                <td class="table-text">
                                    <div>{{ $item->ItemWeight }}</div>
                                </td>
                               <!-- 商品寸法 -->
                               <td class="table-text">
                                    <div>{{ $item->ItemSize }}</div>
                                </td>
                                 <!-- ボックスサイズ -->
                               <td class="table-text">
                                    <div>{{ $item->BoxSize }}</div>
                                </td>
                                 <!-- 入り数 -->
                               <td class="table-text">
                                    <div>{{ $item->NumofItems }}</div>
                                </td>
                                  <!-- 小売希望価格 -->
                               <td class="table-text">
                                    <div>{{ $item->RetailPrice }}</div>
                                </td>
                                  

                                

                                <!-- 商品マスタの編集 -->
                                <td>
                                <form action="{{ url('items/'.$item->id.'/edit') }}" method="GET"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">編集 </button>
                                </form>
                                </td>

                                <!-- 寄付商品の登録 -->
                                <td>
                                <form action="{{ url('donations/'.$item->id.'/edit') }}" method="GET"> {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">寄付する </button>
                                </form>
                                </td>
                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>			
@endif
@endsection