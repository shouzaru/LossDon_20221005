<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = ['item_id','Inventory','BestBefore','StorageLocation','InventoryDeadline','DeliveryDate','Packing','remarks'];

    // Itemsテーブルとのリレーション （こっちのDonationテーブルは従テーブル側）
    public function items() {
        return $this->belongsTo('App\Models\Item');
    }

    // Deliveryテーブルとのリレーション （こっちのDonationテーブルの方が主テーブル側）
    public function deliveries() {
        return $this->hasMany('App\Models\Delivery');
    }
}
