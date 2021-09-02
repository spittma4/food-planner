<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $table = 'food_items';

    protected $fillable = array (
        'name',
        'user_id',
        'calories',
        'proteins',
        'carbs',
        'fats',
        'notes',
        'last_used'
    );

    protected $addRules = array (
        'name' => 'required|string|max:255',
        'user_id' => 'required|integer|min:0',
        'calories' => 'integer|min:0',
        'proteins' => 'integer|min:0',
        'carbs' => 'integer|min:0',
        'fats' => 'integer|min:0',
        'notes' => 'nullable|string',
        'last_used' => 'nullable|dateTime',
    );

    protected $editRules = array (
        'name' => 'required|string|max:255',
        'user_id' => 'required|integer|min:0',
        'calories' => 'integer|min:0',
        'proteins' => 'integer|min:0',
        'carbs' => 'integer|min:0',
        'fats' => 'integer|min:0',
        'notes' => 'nullable|string',
        'last_used' => 'nullable|dateTime',
    );

    // ===============
    // Relationships
    // ===============

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
