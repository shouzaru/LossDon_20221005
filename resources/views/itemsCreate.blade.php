<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="container">

        <div class="card-title">
            寄付商品の登録
        </div>

        <!-- バリデーションエラーの表示に使用ここから-->
        <!-- resources/views/common/errors.blade.php -->
        @if (count($errors) > 0)
        
            <!-- Form Error List -->
            <div class="alert alert-danger">
                <div><strong>入力した文字を修正してください。</strong></div> 
                <div>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <!-- バリデーションエラーの表示に使用ここまで-->

        <!-- 登録フォーム -->
        <form action="{{ url('items') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
        
            <!-- JANコード/ITFコード -->
            <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                <label for="JAN">JANコード/ITFコード</label>
                    <input type="text" name="JANcode" class="form-control">
                </div>
            </div>

            <!-- 商品名 -->
            <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                <label for="ItemName">商品名</label>
                    <input type="text" name="ItemName" class="form-control">
                </div>
            </div>
        <!-- 商品画像 -->
        <div class="form-group row justify-content-center">
            
                <div class="col-sm-6">
                <label for="ItemImage">商品画像</label>
                    <input id="fileUploader" type="file" name="ItemImage" accept='image/' enctype="multipart/form-data" class="form-control" required autofocus>
                </div>
        </div>
        <!-- 商品重量 -->
        <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                    <label for="ItemWeight">商品重量</label>
                    <input type="text" name="ItemWeight" class="form-control">
                </div>
            </div>
            <!-- 商品寸法 -->
        <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                    <label for="ItemSize">商品寸法</label>
                    <input type="text" name="ItemSize" class="form-control">
                </div>
            </div>
            
            <!-- 箱寸法（外寸） -->
        <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                    <label for="BoxSize">箱寸法（外寸）</label>
                    <input type="text" name="BoxSize" class="form-control">
                </div>
            </div>
            
            <!-- 商品重量 -->
        <div class="row justify-content-center">
        <div class="form-group col-sm-6">
                <label for="TempRange">温度帯</label>
                <select Name="TempRange" class="form-select">
                <option value="1" hidden>選択してください</option>
                <option value="2">常温</option>
                <option value="3">冷蔵</option>
                <option value="4">冷凍</option>
                </select>
            </div>
            </div>
            <!-- 入数 -->
        <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                    <label for="NumofItems">入数</label>
                    <input type="text" name="NumofItems" class="form-control">
                </div>
            </div>
            
            <!-- 小売希望価格 -->
        <div class="form-group row justify-content-center">
                <div class="col-sm-6">
                    <label for="RetailPrice">小売希望価格</label>
                    <input type="text" name="RetailPrice" class="form-control">
                </div>
            </div>
            
        
            <!-- 登録ボタン -->
            <div class="form-group row justify-content-end">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">
                    登録
                    </button>
                </div>
            </div>
        
        </form>
    </div>
    





@endsection