<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsaarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asaars', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->index();

            $table->string('name');

            $table->string('image')->nullable()->default('no');;
            $table->string('ownership')->nullable()->default('no');;
            $table->string('ownership_name')->nullable()->default('no');;
            $table->string('image_id')->nullable()->default('no');;
            $table->string('nadim_image_id')->nullable()->default('no');;
            $table->string('image_type')->nullable()->default('no');
            $table->string('image_type_slide')->nullable()->default('no');
            $table->string('image_type_slide_size')->nullable()->default('no');
            $table->string('image_type_slide_frame')->nullable()->default('no');
            $table->string('image_type_negative')->nullable()->default('no');
            $table->string('image_type_negative_size')->nullable()->default('no');
            $table->string('image_type_negative_material')->nullable()->default('no');
            $table->string('image_type_print')->nullable()->default('no');
            $table->string('image_type_print_size')->nullable()->default('no');
            $table->string('image_type_print_type')->nullable()->default('no');
            $table->string('image_type_print_side')->nullable()->default('no');
            $table->string('image_type_print_side_recto_sig')->nullable()->default('no');
            $table->string('image_type_print_side_recto_sig_type')->nullable()->default('no');
            $table->string('image_type_print_side_recto_sig_name')->nullable()->default('no');
            $table->string('image_type_print_side_recto_other_marks')->nullable()->default('no');
            $table->string('image_type_print_side_verso_printed_info')->nullable()->default('no');
            $table->string('image_type_print_side_verso_hand_written')->nullable()->default('no');
            $table->string('image_type_print_side_verso_lang')->nullable()->default('no');
            $table->string('image_type_print_side_verso_dec_text')->nullable()->default('no');
            $table->string('image_type_print_printed_type')->nullable()->default('no');
            $table->string('image_type_print_printed_material')->nullable()->default('no');
            $table->string('image_type_print_printed_mount')->nullable()->default('no');
            $table->string('image_type_print_printed_orientation')->nullable()->default('no');

            $table->string('photografic_process')->nullable()->default('no');
            $table->string('photografic_process_digital_metadata')->nullable()->default('no');
            $table->string('description')->nullable()->default('no');
            $table->string('image_geographic_location_country')->nullable()->default('no');
            $table->string('image_geographic_location_gov')->nullable()->default('no');
            $table->string('image_geographic_location_city')->nullable()->default('no');
            $table->string('image_geographic_location_city_specific_site')->nullable()->default('no');
            $table->string('image_geographic_location_city_address')->nullable()->default('no');
            $table->string('image_geographic_location_city_desc_of_site')->nullable()->default('no');
            $table->string('photographer_studio')->nullable()->default('no');
            $table->string('event_date')->nullable()->default("no");
            $table->string('event_date_exact_date_btw')->nullable()->default("no");
            $table->string('event_date_exact_date_century')->nullable()->default("no");
            $table->string('image_scanning_date')->nullable()->default('no');
            $table->string('image_subject')->nullable()->default("no");
            $table->string('image_subject_monument')->nullable()->default('no');
            $table->string('image_subject_area_in_monument')->nullable()->default('no');
            $table->string('image_subject_item_artifact_in_monument')->nullable()->default('no');
            $table->string('image_subject_event')->nullable()->default('no');
            $table->string('image_subject_event_detail')->nullable()->default('no');
            $table->string('image_subject_activity')->nullable()->default('no');
            $table->string('image_subject_object')->nullable()->default('no');
            $table->string('image_subject_people')->nullable()->default('no');
            $table->string('image_subject_people_detail')->nullable()->default('no');
            $table->string('image_subject_other')->nullable()->default('no');

            $table->string('type_of_camera')->nullable()->default('no');
            $table->string('keywords')->nullable()->default('no');
            $table->string('image_status_condition')->nullable()->default('no');
            $table->string('image_status_needs_repair')->nullable()->default('no');
            $table->string('comment')->nullable()->default('no');
            $table->string('digital_location_of_image_file')->nullable()->default('no');
            $table->string('file_size')->nullable()->default('no');
            $table->string('copywrite')->nullable()->default('no');
            $table->string('bibliography_citation')->nullable()->default('no');
            $table->string('icons_for_sharing_on_social_media')->nullable()->default('no');
            $table->string('nadim_foundation_copy_right_statement')->nullable()->default("©Nadim Foundation, All rights reserved");
            $table->string('deleted_at')->nullable()->default('no');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asaars');
    }
}
