<?php

namespace App\Http\Controllers;

use App\Models\Asaar;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class AsaarController extends Controller
{
    public function index()
    {
       // dd(Asaar::find(1));
        $asaar =  Auth::user()->account->asaar()
        ->orderByName()
        ->filter(Request::only('search', 'trashed'))
        ->paginate();

        // dd($asaar);
        return Inertia::render('Asaar/Index', [
            'filters' => Request::all('search', 'trashed'),
            'asaar' => Auth::user()->account->asaar()
                ->orderByName()
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
                ->transform(function ($asar) {
                    return [
'id' => $asar->id,
'name' => $asar->name,
'image' => $asar->image,
'ownership' => $asar->ownership,
'ownership_name' => $asar->ownership_name,
'image_id' => $asar->image_id,
'nadim_image_id'  => $asar->nadim_image_id,
'image_type'  => $asar->image_type,
'image_type_slide'  => $asar->image_type_slide,
'image_type_slide_size'=> $asar->image_type_slide_size,
'image_type_slide_frame'  => $asar->image_type_slide_frame,
'image_type_negative'  => $asar->image_type_negative,
'image_type_negative_size'  => $asar->image_type_negative_size,
'image_type_negative_material'  => $asar->image_type_negative_material,
'image_type_print'  => $asar->image_type_print,
'image_type_print_size'  => $asar->image_type_print_size,
'image_type_print_type'  => $asar->image_type_print_type,
'image_type_print_side'  => $asar->image_type_print_side,
'image_type_print_side_recto_sig'  => $asar->image_type_print_side_recto_sig,
'image_type_print_side_recto_sig_type'  => $asar->image_type_print_side_recto_sig_type,
'image_type_print_side_recto_sig_name'  => $asar->image_type_print_side_recto_sig_name,
'image_type_print_side_recto_other_marks'  => $asar->image_type_print_side_recto_other_marks,
'image_type_print_side_verso_printed_info'  => $asar->image_type_print_side_verso_printed_info,
'image_type_print_side_verso_hand_written'  => $asar->image_type_print_side_verso_hand_written,
'image_type_print_side_verso_lang'  => $asar->image_type_print_side_verso_lang,
'image_type_print_side_verso_dec_text'  => $asar->image_type_print_side_verso_dec_text,
'image_type_print_printed_type'  => $asar->image_type_print_printed_type,
'image_type_print_printed_material'  => $asar->image_type_print_printed_material,
'image_type_print_printed_mount'  => $asar->image_type_print_printed_mount,
'image_type_print_printed_orientation'  => $asar->image_type_print_printed_orientation,
'photografic_process'  => $asar->photografic_process,
'photografic_process_digital_metadata'  => $asar->photografic_process_digital_metadata,
'description'  => $asar->description,
'image_geographic_location_country'  => $asar->image_geographic_location_country,
'image_geographic_location_gov'  => $asar->image_geographic_location_gov,
'image_geographic_location_city'  => $asar->image_geographic_location_city,
'image_geographic_location_city_specific_site'  => $asar->image_geographic_location_city_specific_site,
'image_geographic_location_city_address'  => $asar->image_geographic_location_city_address,
'image_geographic_location_city_desc_of_site'  => $asar->image_geographic_location_city_desc_of_site,
'photographer_studio'  => $asar->photographer_studio,
'event_date'  => $asar->event_date,
'event_date_exact_date_btw'  => $asar->event_date_exact_date_btw,
'event_date_exact_date_century'  => $asar->event_date_exact_date_century,
'image_scanning_date'  => $asar->image_scanning_date,
'image_subject'  => $asar->image_subject,
'image_subject_monument'  => $asar->image_subject_monument,
'image_subject_area_in_monument'  => $asar->image_subject_area_in_monument,
'image_subject_item_artifact_in_monument'  => $asar->image_subject_item_artifact_in_monument,
'image_subject_event'  => $asar->image_subject_event,
'image_subject_event_detail'  => $asar->image_subject_event_detail,
'image_subject_activity'  => $asar->image_subject_activity,
'image_subject_object'  => $asar->image_subject_object,
'image_subject_people'  => $asar->image_subject_people,
'image_subject_people_detail'  => $asar->image_subject_people_detail,
'image_subject_other'  => $asar->image_subject_other,
'type_of_camera'  => $asar->type_of_camera,
'keywords'  => $asar->keywords,
'image_status_condition'  => $asar->image_status_condition,
'image_status_needs_repair'  => $asar->image_status_needs_repair,
'comment'  => $asar->comment,
'digital_location_of_image_file'  => $asar->digital_location_of_image_file,
'file_size'  => $asar->file_size,
'copywrite'  => $asar->copywrite,
'bibliography_citation'  => $asar->bibliography_citation,
'icons_for_sharing_on_social_media'  => $asar->icons_for_sharing_on_social_media,
'nadim_foundation_copy_right_statement'  => $asar->nadim_foundation_copy_right_statement,
'deleted_at'  => $asar->deleted_at,
                    ];
                }),
        ]);
    }



    public function create()
    {
        return Inertia::render('Asaar/Create');
    }

    public function store()
    {
        Auth::user()->account->asaar()->create(
            Request::validate([
                'name' => ['required', 'max:50'],
                'image' => ['required'],

                'image' => ['nullable', 'required'],
'ownership' => ['nullable', 'required'],
'ownership_name' => ['nullable', 'required'],
'image_id' => ['nullable', 'required'],
'nadim_image_id' => ['nullable', 'required'],
'image_type' => ['nullable', 'required'],
'image_type_slide' => ['nullable'],
'image_type_slide_size' => ['nullable'],
'image_type_slide_frame' => ['nullable'],
'image_type_negative' => ['nullable'],
'image_type_negative_size' => ['nullable'],
'image_type_negative_material' => ['nullable'],
'image_type_print' => ['nullable'],
'image_type_print_size' => ['nullable'],
'image_type_print_type' => ['nullable'],
'image_type_print_side' => ['nullable'],
'image_type_print_side_recto_sig' => ['nullable'],
'image_type_print_side_recto_sig_type' => ['nullable'],
'image_type_print_side_recto_sig_name' => ['nullable'],
'image_type_print_side_recto_other_marks' => ['nullable'],
'image_type_print_side_verso_printed_info' => ['nullable'],
'image_type_print_side_verso_hand_written' => ['nullable'],
'image_type_print_side_verso_lang' => ['nullable'],
'image_type_print_side_verso_dec_text' => ['nullable'],
'image_type_print_printed_type' => ['nullable'],
'image_type_print_printed_material' => ['nullable'],
'image_type_print_printed_mount' => ['nullable'],
'image_type_print_printed_orientation' => ['nullable'],
'photografic_process' => ['nullable'],
'photografic_process_digital_metadata' => ['nullable'],
'description' => ['nullable'],
'image_geographic_location_country' => ['nullable'],
'image_geographic_location_gov' => ['nullable'],
'image_geographic_location_city' => ['nullable'],
'image_geographic_location_city_specific_site' => ['nullable'],
'image_geographic_location_city_address' => ['nullable'],
'image_geographic_location_city_desc_of_site' => ['nullable'],
'photographer_studio' => ['nullable'],
'event_date' => ['nullable'],
'event_date_exact_date_btw' => ['nullable'],
'event_date_exact_date_century' => ['nullable'],
'image_scanning_date' => ['nullable'],
'image_subject' => ['nullable'],
'image_subject_monument' => ['nullable'],
'image_subject_area_in_monument' => ['nullable'],
'image_subject_item_artifact_in_monument' => ['nullable'],
'image_subject_event' => ['nullable'],
'image_subject_event_detail' => ['nullable'],
'image_subject_activity' => ['nullable'],
'image_subject_object' => ['nullable'],
'image_subject_people' => ['nullable'],
'image_subject_people_detail' => ['nullable'],
'image_subject_other' => ['nullable'],
'type_of_camera' => ['nullable', 'required'],
'keywords' => ['nullable', 'required'],
'image_status_condition' => ['nullable',],
'image_status_needs_repair' => ['nullable',],
'comment' => ['nullable',],
'digital_location_of_image_file' => ['nullable',],
'file_size' => ['nullable', 'required'],
'copywrite' => ['nullable', 'required'],
'bibliography_citation' => ['nullable', 'required'],
'icons_for_sharing_on_social_media' => ['nullable', 'required'],
'nadim_foundation_copy_right_statement' => ['nullable', 'required'],
'deleted_at' => ['nullable',],

            ])
        );

        return Redirect::route('asaar')->with('success', 'Asar created.');
    }

    public function edit(Asaar $asar)
    {

        $asar = Asaar::find($asar->id);

        return Inertia::render('Asaar/Edit', [
            'asar' => [
                'id' => $asar->id,
                        'name' => $asar->name,
                        'image' => $asar->image,
                        'ownership' => $asar->ownership,
                        'ownership_name' => $asar->ownership_name,
                        'image_id' => $asar->image_id,
                        'nadim_image_id' => $asar->nadim_image_id,
                        'image_type' => $asar->image_type,
                        'photografic_process' => $asar->photografic_process,
                        'description' => $asar->description,
                        'image_geographic_location' => $asar->image_geographic_location,
                        'photographer_studio' => $asar->photographer_studio,
                        'event_date' => $asar->event_date,
                        'event_date_exact_date_btw'=> $asar->event_date_exact_date_btw,
                        'event_date_exact_date_century'=> $asar->event_date_exact_date_century,
                        'image_scanning_date' => $asar->image_scanning_date,
                        'image_subject' => $asar->image_subject,
                        'type_of_camera' => $asar->type_of_camera,
                        'keywords' => $asar->keywords,
                        'image_status_condition' => $asar->image_status_condition,
                        'comment' => $asar->comment,
                        'digital_location_of_image_file' => $asar->digital_location_of_image_file,
                        'file_size' => $asar->file_size,
                        'copywrite' => $asar->copywrite,
                        'bibliography_citation' => $asar->bibliography_citation,
                        'icons_for_sharing_on_social_media' => $asar->icons_for_sharing_on_social_media,
                        'nadim_foundation_copy_right_statement' => $asar->nadim_foundation_copy_right_statement,
                        'deleted_at' => $asar->deleted_at,
            ],

        ]);
    }

    public function update(Asaar $asar)
    {
        $asar->update(
            Request::validate([
                'name' => ['required', 'max:50'],
                'image' => ['required'],

                'image' => ['nullable', 'required'],
'ownership' => ['nullable', 'required'],
'ownership_name' => ['nullable', 'required'],
'image_id' => ['nullable', 'required'],
'nadim_image_id' => ['nullable', 'required'],
'image_type' => ['nullable', 'required'],
'image_type_slide' => ['nullable'],
'image_type_slide_size' => ['nullable'],
'image_type_slide_frame' => ['nullable'],
'image_type_negative' => ['nullable'],
'image_type_negative_size' => ['nullable'],
'image_type_negative_material' => ['nullable'],
'image_type_print' => ['nullable'],
'image_type_print_size' => ['nullable'],
'image_type_print_type' => ['nullable'],
'image_type_print_side' => ['nullable'],
'image_type_print_side_recto_sig' => ['nullable'],
'image_type_print_side_recto_sig_type' => ['nullable'],
'image_type_print_side_recto_sig_name' => ['nullable'],
'image_type_print_side_recto_other_marks' => ['nullable'],
'image_type_print_side_verso_printed_info' => ['nullable'],
'image_type_print_side_verso_hand_written' => ['nullable'],
'image_type_print_side_verso_lang' => ['nullable'],
'image_type_print_side_verso_dec_text' => ['nullable'],
'image_type_print_printed_type' => ['nullable'],
'image_type_print_printed_material' => ['nullable'],
'image_type_print_printed_mount' => ['nullable'],
'image_type_print_printed_orientation' => ['nullable'],
'photografic_process' => ['nullable'],
'photografic_process_digital_metadata' => ['nullable'],
'description' => ['nullable'],
'image_geographic_location_country' => ['nullable'],
'image_geographic_location_gov' => ['nullable'],
'image_geographic_location_city' => ['nullable'],
'image_geographic_location_city_specific_site' => ['nullable'],
'image_geographic_location_city_address' => ['nullable'],
'image_geographic_location_city_desc_of_site' => ['nullable'],
'photographer_studio' => ['nullable'],
'event_date' => ['nullable'],
'event_date_exact_date_btw' => ['nullable'],
'event_date_exact_date_century' => ['nullable'],
'image_scanning_date' => ['nullable'],
'image_subject' => ['nullable'],
'image_subject_monument' => ['nullable'],
'image_subject_area_in_monument' => ['nullable'],
'image_subject_item_artifact_in_monument' => ['nullable'],
'image_subject_event' => ['nullable'],
'image_subject_event_detail' => ['nullable'],
'image_subject_activity' => ['nullable'],
'image_subject_object' => ['nullable'],
'image_subject_people' => ['nullable'],
'image_subject_people_detail' => ['nullable'],
'image_subject_other' => ['nullable'],
'type_of_camera' => ['nullable', 'required'],
'keywords' => ['nullable', 'required'],
'image_status_condition' => ['nullable',],
'image_status_needs_repair' => ['nullable',],
'comment' => ['nullable',],
'digital_location_of_image_file' => ['nullable',],
'file_size' => ['nullable', 'required'],
'copywrite' => ['nullable', 'required'],
'bibliography_citation' => ['nullable', 'required'],
'icons_for_sharing_on_social_media' => ['nullable', 'required'],
'nadim_foundation_copy_right_statement' => ['nullable', 'required'],

            ])
        );

        return Redirect::back()->with('success', 'Asar updated.');
    }

    public function destroy(Asaar $asar)
    {
        $asar->delete();

        return Redirect::back()->with('success', 'Organization deleted.');

    }

    public function restore(Asaar $asar)
    {
        $asar->restore();

        return Redirect::back()->with('success', 'Asar restored.');
    }
}
