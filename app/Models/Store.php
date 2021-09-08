<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = array (
        'name',
        'user_id',
        'notes',
    );

    protected $addRules = array (
        'name' => 'required|string|max:255',
        'user_id' => 'required|integer|min:0',
        'notes' => 'nullable|string',
    );

    protected $editRules = array (
        'name' => 'required|string|max:255',
        'user_id' => 'required|integer|min:0',
        'notes' => 'nullable|string',
    );

    // ===============
    // Relationships
    // ===============

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
