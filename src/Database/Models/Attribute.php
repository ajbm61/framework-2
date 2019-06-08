<?php
namespace AvoRed\Framework\Database\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Appended attribute for the model
     * @var $appends
     */
    protected $appends =  ['dropdown'];

    /**
     * Property has many dropdown options
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dropdownOptions()
    {
        return $this->hasMany(AttributeDropdownOption::class);
    }

    /**
     * Get the Dropdown Options for Select
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDropdownAttribute()
    {
       
        return $this->dropdownOptions;
    }
}