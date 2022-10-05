<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['item_id','donation_id','DeliveryQuantity','date'];

    // Itemsテーブルとのリレーション （こっちのDeliceryテーブルは従テーブル側）
    public function items() {
        return $this->belongsTo('App\Models\Item');
    }

    // donationsテーブルとのリレーション （こっちのDeliceryテーブルは従テーブル側）
    public function donations() {
        return $this->belongsTo('App\Models\Donation');
    }
}
