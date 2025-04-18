<?php
namespace App\Models\Admin;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborsCategories extends Model
{
	// table name 
    protected $table = 'labors_categories';    
    // primaryKey
    protected $primaryKey = 'id';
	
    protected $fillable = [
        'parent_id',
        'occupation_code',
        'occupation_title',
        'level', 
		'employment',
        'employment_rse',
        'employment_per_1k_jobs',
        'median_hourly_wage', 
		'mean_hourly_wage',
        'annual_mean_wage',
        'mean_wage_rse' 
    ];   
    
    
    public function get_labors_sub_categories(){
        return $this->hasMany(\App\Models\Admin\LaborsCategories::class, 'parent_id', 'id');
    }
}
