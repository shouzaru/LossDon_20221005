@extends('layouts.app')
 @section('content')
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
            寄付商品の一覧
         </div>
     </div>
<!-- 検索フォーム -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                         <input class="form-control form-control-lg" id="item" type="text" placeholder="商品名を入力してください" data-sb-validations="required,email" />
                    </div>
                    <div class="col-lg-2"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                 </div>
            </div>
<!-- 検索フォームここまで  -->

<!-- Item: 登録されてる商品のリスト -->
    
    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                @if (count($items) > 0)
                @if (count($donations) > 0)
                @foreach ($items as $item)
                @foreach ($donations as $donation)
                @if($item->id === $donation->item_id)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- item image-->
                            <form action="{{ route('deliveries.edit',$donation->id) }}" method="GET"> {{ csrf_field() }}
                                <input type="image" class="card-img-top" src="storage/ItemImage/{{$item->ItemImage_path}}"  alt="Mage"></input>
                                <input type="hidden" name="donation_id" value="{{$donation->id}}">  <!-- deliveryテーブルのdonatio_idカラムに入れるための値を送信 -->
                                <input type="hidden" name="item_id" value="{{$donation->item_id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
                                </form>

                        
                        
                        
                            <!-- item details-->
                            <div class="card-body pt-4">
                                <div class="text-center">
                            
                                    <!-- item name-->
                                    <h5 class="fw-bolder">{{ $item->ItemName }}</h5>
                                    <!-- item 寄付数-->
                                    <p class="fs-6">寄付数：{{ $donation->Inventory }}</p>
                                    <!-- 登録日 -->
                                    <p class="fs-6">登録日：{{date("Y/m/d",strtotime($donation->created_at))}}</p>
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
                                <!-- item 納品済み -->
                                <p class="fs-6">納品積み：{{$totalDel}}</p>  
                                <!-- item 賞味期限-->
                                <p class="fs-6">賞味期限：{{ date("Y/m/d",strtotime($donation->BestBefore)) }}</p>
                                    <!-- item 在庫期限-->
                                <p class="fs-6">在庫期限：{{ date("Y/m/d", strtotime($donation->InventoryDeadline)) }}</p>
                                
                                    </div>
                            </div>
                            <!-- item-->
                            <!-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ url('items/' .$item->id) }}">詳細</a></div>
                            </div> -->

                            <!-- 削除ボタン と 編集ボタン と 納品数入力ボタン-->

                                <form action="{{ url('donations/'.$donation->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか")'>この寄付商品を削除</button>
                                </form>
                        
                                <form action="{{ route('deliveries.edit',$donation->id) }}" method="GET"> {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">納品する</button>
                                <input type="hidden" name="donation_id" value="{{$donation->id}}">  <!-- deliveryテーブルのdonatio_idカラムに入れるための値を送信 -->
                                <input type="hidden" name="item_id" value="{{$donation->item_id}}">  <!-- deliveryテーブルのitem_idカラムに入れるための値を送信 -->
                                </form>
                                
                        </div>
                    </div>
                    @endif
        @endforeach
        @endforeach
        @endif
        @endif
                </div>
            </div>
        </section>

<!-- Item: 登録されてる商品のリストここまで -->

@endsection