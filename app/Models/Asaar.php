<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asaar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',

'ownership',
'ownership_name',
'image_id',
'nadim_image_id',
'image_type',
'image_type_slide',
'image_type_slide_size',
'image_type_slide_frame',
'image_type_negative',
'image_type_negative_size',
'image_type_negative_material',
'image_type_print',
'image_type_print_size',
'image_type_print_type',
'image_type_print_side',
'image_type_print_side_recto_sig',
'image_type_print_side_recto_sig_type',
'image_type_print_side_recto_sig_name',
'image_type_print_side_recto_other_marks',
'image_type_print_side_verso_printed_info',
'image_type_print_side_verso_hand_written',
'image_type_print_side_verso_lang',
'image_type_print_side_verso_dec_text',
'image_type_print_printed_type',
'image_type_print_printed_material',
'image_type_print_printed_mount',
'image_type_print_printed_orientation',
'photografic_process',
'photografic_process_digital_metadata',
'description',
'image_geographic_location_country',
'image_geographic_location_gov',
'image_geographic_location_city',
'image_geographic_location_city_specific_site',
'image_geographic_location_city_address',
'image_geographic_location_city_desc_of_site',
'photographer_studio',
'event_date',
'event_date_exact_date_btw',
'event_date_exact_date_century',
'image_scanning_date',
'image_subject',
'image_subject_monument',
'image_subject_area_in_monument',
'image_subject_item_artifact_in_monument',
'image_subject_event',
'image_subject_event_detail',
'image_subject_activity',
'image_subject_object',
'image_subject_people',
'image_subject_people_detail',
'image_subject_other',
'type_of_camera',
'keywords',
'image_status_condition',
'image_status_needs_repair',
'comment',
'digital_location_of_image_file',
'file_size',
'copywrite',
'bibliography_citation',
'icons_for_sharing_on_social_media',
'nadim_foundation_copy_right_statement',
'deleted_at',
    ];

    // public function getNameAttribute()
    // {
    //     return $this->name.' by '.$this->ownership;
    // }

    public function scopeOrderByName($query)
    {
        $query->orderBy('name')->orderBy('ownership');
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('ownership', 'like', '%'.$search.'%')
                    ->orWhere('keywords', 'like', '%'.$search.'%');
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
