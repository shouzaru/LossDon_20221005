<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['JANcode','ItemName','ItemImage_path','ItemWeight','ItemSize','BoxSize','TempRange','NumofItems','RetailPrice','Inventory','BestBefore','StorageLocation','InventoryDeadline','DeliveryDate','Packing']; //これを追加！

    // Donationテーブルとのリレーション （こっちのItemテーブルの方が主テーブル側）
    public function donations() {
        return $this->hasMany('App\Models\Donation');
    }

    // Deliveryテーブルとのリレーション （こっちのItemテーブルの方が主テーブル側）
    public function deliveries() {
        return $this->hasMany('App\Models\Delivery');
    }
}
