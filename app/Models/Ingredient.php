<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $fillable = array (
        'name',
        'user_id',
        'store_id',
        'cost',
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
        'store_id' => 'required|integer|min:0',
        'cost' => 'nullable|decimal',
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
        'store_id' => 'required|integer|min:0',
        'cost' => 'nullable|decimal',
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

    public function store() {
        return $this->belongsTo('App\Models\Store');
    }
}
