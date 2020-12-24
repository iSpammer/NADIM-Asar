<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('asaar')"
        >Asaar</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="bg-white rounded shadow overflow-hidden md:max-w-xlg">
      <form @submit.prevent="submit">
        <div
          class="p-8 grid grid-cols-1 sm:grid-cols-2 sm:px-8 sm:py-12 sm:gap-x-8 md:py-16"
        >
          <text-input
            v-model="form.name"
            :error="errors.name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Title of the Photo"
          />
          <image-compressor class="px-6 py-4 flex items-center" :done="getImage"
            >Asar's Image</image-compressor
          >

          <div style="margin-right: 1rem">
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Ownership Type: <strong>{{ form.ownership }}</strong>
            </div>

            <b-form-select v-model="form.ownership">
              <b-form-select-option value="Project"
                >Project</b-form-select-option
              >
              <b-form-select-option value="Collection"
                >Collection</b-form-select-option
              >
            </b-form-select>
          </div>

          <text-input
            v-if="form.ownership != '' && form.ownership != null"
            v-model="form.ownership_name"
            :error="errors.ownership_name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            :label="
              form.ownership == 'Project'
                ? 'Project\'s Name'
                : 'Collection\'s Name'
            "
          />

          <text-input
            v-model="form.image_id"
            :error="errors.image_id"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image ID"
          />
          <text-input
            v-model="form.nadim_image_id"
            :error="errors.nadim_image_id"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Nadim image ID"
          />
          <!-- <text-input
            v-model="form.image_type"
            :error="errors.image_type"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="image_type"
          /> -->

          <div style="margin-right: 1rem">
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Image type <strong>{{ form.image_type }}</strong>
            </div>

            <b-form-select v-model="form.image_type">
              <b-form-select-option value="slide">Slide</b-form-select-option>
              <b-form-select-option value="negative"
                >Negative</b-form-select-option
              >
              <b-form-select-option value="print">Print</b-form-select-option>
              <b-form-select-option value="Digital"
                >Digital</b-form-select-option
              >
            </b-form-select>
          </div>

          <div v-if="form.image_type == 'slide'">
            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Size: <strong>{{ form.image_type_slide_size }}</strong>
              </div>

              <b-form-select v-model="form.image_type_slide_size">
                <b-form-select-option value="35ml">35ml</b-form-select-option>
                <b-form-select-option value="5ml">5ml</b-form-select-option>
                <b-form-select-option value="">other</b-form-select-option>
              </b-form-select>
            </div>

            <text-input
              v-if="
                form.image_type_slide_size != null &&
                form.image_type_slide_size != '35ml' &&
                form.image_type_slide_size != '5ml'
              "
              v-model="form.image_type_slide_size"
              :error="errors.image_type_slide_size"
              class="pr-6 pb-8 w-full lg:w-1/2"
              label="Size"
            />

            <div class="mt-2" style="margin-bottom: 0.5rem">
              Frame: <strong>{{ form.image_type_slide_frame }}</strong>
            </div>

            <b-form-select v-model="form.image_type_slide_frame">
              <b-form-select-option value="With Frame"
                >With Frame</b-form-select-option
              >
              <b-form-select-option value="Frameless"
                >Frameless</b-form-select-option
              >
            </b-form-select>
          </div>

          <div v-if="form.image_type == 'negative'">
            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Size: <strong>{{ form.image_type_negative_size }}</strong>
              </div>

              <b-form-select v-model="form.image_type_negative_size">
                <b-form-select-option value="35ml">35ml</b-form-select-option>
                <b-form-select-option value="">other</b-form-select-option>
              </b-form-select>
            </div>

            <text-input
              v-if="
                form.image_type_negative_size != null &&
                form.image_type_negative_size != '35ml' &&
                form.image_type_negative_size != '5ml'
              "
              v-model="form.image_type_negative_size"
              :error="errors.image_type_negative_size"
              class="pr-6 pb-8 w-full lg:w-1/2"
              label="Size"
            />

            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Material
                <strong>{{ form.image_type_negative_material }}</strong>
              </div>

              <b-form-select v-model="form.image_type_negative_material">
                <b-form-select-option value="Glass">Glass</b-form-select-option>
                <b-form-select-option value="Transparent Plastic Film"
                  >Transparent Plastic Film</b-form-select-option
                >
              </b-form-select>
            </div>
          </div>

          <div v-if="form.image_type == 'print'">
            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Size: <strong>{{ form.image_type_print_size }}</strong>
              </div>

              <b-form-select v-model="form.image_type_print_size">
                <b-form-select-option value="13*15cm."
                  >13*15cm.</b-form-select-option
                >
                <b-form-select-option value="70*100cm"
                  >70*100cm</b-form-select-option
                >
                <b-form-select-option value="">other</b-form-select-option>
              </b-form-select>
            </div>

            <text-input
              v-if="
                form.image_type_print_size != null &&
                form.image_type_print_size != '13*15cm' &&
                form.image_type_print_size != '5ml'
              "
              v-model="form.image_type_print_size"
              :error="errors.image_type_print_size"
              class="pr-6 pb-8 w-full lg:w-1/2"
              label="Size"
            />

            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Material
                <strong>{{ form.image_type_negative_material }}</strong>
              </div>

              <b-form-select v-model="form.image_type_negative_material">
                <b-form-select-option value="Glass">Glass</b-form-select-option>
                <b-form-select-option value="Transparent Plastic Film"
                  >Transparent Plastic Film</b-form-select-option
                >
              </b-form-select>
            </div>

            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Print Type <strong>{{ form.image_type_print_type }}</strong>
              </div>

              <b-form-select v-model="form.image_type_print_type">
                <b-form-select-option value="Color">Color</b-form-select-option>
                <b-form-select-option value="Black and White"
                  >Black and White</b-form-select-option
                >
              </b-form-select>
            </div>

            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Print Side <strong>{{ form.image_type_print_side }}</strong>
              </div>

              <b-form-select v-model="form.image_type_print_side">
                <b-form-select-option value="recto">Recto</b-form-select-option>
                <b-form-select-option value="verso">Verso</b-form-select-option>
              </b-form-select>
            </div>
          </div>
          <div v-if="form.image_type_print_side == 'recto'">
            <div style="margin-right: 1rem">
              <div class="mt-2" style="margin-bottom: 0.5rem">
                Signature
                <strong>{{ form.image_type_print_side_recto_sig }}</strong>
              </div>

              <b-form-select v-model="form.image_type_print_side_recto_sig">
                <b-form-select-option value="Yes">Yes</b-form-select-option>
                <b-form-select-option value="No">No</b-form-select-option>
              </b-form-select>
            </div>

            <text-input
              v-model="form.image_type_print_side_recto_sig_type"
              :error="errors.image_type_print_side_recto_sig_type"
              label="Signature Type"
            />

            <text-input
              v-model="form.image_type_print_side_recto_sig_name"
              :error="errors.image_type_print_side_recto_sig_name"
              label="Signature Name"
            />
            <text-input
              v-model="form.image_type_print_side_recto_other_marks"
              :error="errors.image_type_print_side_recto_other_marks"
              label="Other Marks"
            />
          </div>

          <div v-if="form.image_type_print_side == 'verso'">
            <text-input
              v-model="form.image_type_print_side_verso_printed_info"
              :error="errors.image_type_print_side_verso_printed_info"
              label="Printed Info"
            />

            <text-input
              v-model="form.image_type_print_side_verso_hand_written"
              :error="errors.image_type_print_side_verso_hand_written"
              label="Hand Written"
            />

            <text-input
              v-model="form.image_type_print_side_verso_lang"
              :error="errors.image_type_print_side_verso_lang"
              label="Language"
            />

            <text-input
              v-model="form.image_type_print_side_verso_dec_text"
              :error="errors.image_type_print_side_verso_dec_text"
              label="Deciphered Text"
            />
          </div>

          <div style="margin-right: 1rem">
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Photographic Process
              <strong>{{ form.photografic_process }}</strong>
            </div>

            <b-form-select v-model="form.photografic_process">
              <b-form-select-option value="Albumen"
                >Albumen</b-form-select-option
              >
              <b-form-select-option value="DOP (Gelatine and silver)"
                >DOP (Gelatine and silver)</b-form-select-option
              >
              <b-form-select-option
                value="Nitrate cellulose or Acetate cellulose films"
                >Nitrate cellulose or Acetate cellulose
                films</b-form-select-option
              >
              <b-form-select-option value="POP (Gelatine and silver)"
                >POP (Gelatine and silver)</b-form-select-option
              >
              <b-form-select-option value="Photographic prints"
                >Photographic prints</b-form-select-option
              >
              <b-form-select-option value="Colored photos"
                >Colored photos</b-form-select-option
              >
              <b-form-select-option value="Reversal Film (slides)"
                >Reversal Film (slides)</b-form-select-option
              >
              <b-form-select-option value="Hand-colored photographs"
                >Hand-colored photographs</b-form-select-option
              >
              <b-form-select-option value="Negative images"
                >Negative images</b-form-select-option
              >
              <b-form-select-option value="Newspaper clippings"
                >Newspaper clippings</b-form-select-option
              >
              <b-form-select-option value="etc">etc.</b-form-select-option>
              <b-form-select-option value="Digital"
                >Digital</b-form-select-option
              >
            </b-form-select>
          </div>

          <text-input
            v-if="
              form.photografic_process != null &&
              form.photografic_process != 'Albumen' &&
              form.photografic_process != 'DOP (Gelatine and silver)' &&
              form.photografic_process !=
                'Nitrate cellulose or Acetate cellulose films' &&
              form.photografic_process != 'POP (Gelatine and silver)' &&
              form.photografic_process != 'Photographic prints' &&
              form.photografic_process != 'Colored photos' &&
              form.photografic_process != 'Reversal Film (slides)' &&
              form.photografic_process != 'Hand-colored photographs' &&
              form.photografic_process != 'Negative images' &&
              form.photografic_process != 'Newspaper clippings' &&
              form.photografic_process != 'Digital'
            "
            v-model="form.photografic_process"
            :error="errors.photografic_process"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Etc..."
          />

          <text-input
            v-if="
              form.photografic_process != null &&
              form.photografic_process != 'Albumen' &&
              form.photografic_process != 'DOP (Gelatine and silver)' &&
              form.photografic_process !=
                'Nitrate cellulose or Acetate cellulose films' &&
              form.photografic_process != 'POP (Gelatine and silver)' &&
              form.photografic_process != 'Photographic prints' &&
              form.photografic_process != 'Colored photos' &&
              form.photografic_process != 'Reversal Film (slides)' &&
              form.photografic_process != 'Hand-colored photographs' &&
              form.photografic_process != 'Negative images' &&
              form.photografic_process != 'Newspaper clippings' &&
              form.photografic_process != 'etc'
            "
            v-model="form.photografic_process_digital_metadata"
            :error="errors.photografic_process_digital_metadata"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Digital Metadata"
          />

          <text-input
            v-model="form.description"
            :error="errors.description"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Description"
          />
          <text-input
            v-model="form.image_geographic_location_country"
            :error="errors.image_geographic_location_country"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Country Of Origin"
          />
          <text-input
            v-model="form.image_geographic_location_gov"
            :error="errors.image_geographic_location_gov"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Governement Of Origin"
          />
          <text-input
            v-model="form.image_geographic_location_city"
            :error="errors.image_geographic_location_city"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="City Of Origin"
          />
          <text-input
            v-model="form.image_geographic_location_city_specific_site"
            :error="errors.image_geographic_location_city_specific_site"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Specific Site"
          />
          <text-input
            v-model="form.image_geographic_location_city_address"
            :error="errors.image_geographic_location_city_address"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Address"
          />
          <text-input
            v-model="form.image_geographic_location_city_desc_of_site"
            :error="errors.image_geographic_location_city_desc_of_site"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Description of site"
          />
          <text-input
            v-model="form.photographer_studio"
            :error="errors.photographer_studio"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Photographer Studio"
          />

          <div style="margin-right: 1rem">
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Event Exact Date: <strong>{{ form.event_date }}</strong>
            </div>

            <b-form-select v-model="form.event_date">
              <b-form-select-option
                value="Estimated Date/Approx between two dates"
                >Estimated Date/Approx between two dates</b-form-select-option
              >
              <b-form-select-option value="Century"
                >Century</b-form-select-option
              >
            </b-form-select>
          </div>

          <text-input
            v-if="form.event_date == 'Estimated Date/Approx between two dates'"
            v-model="form.event_date_exact_date_btw"
            :error="errors.event_date_exact_date_btw"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Estimated Date"
          />

          <div v-if="form.event_date == 'Century'">
            <div class="mt-2" style="margin-bottom: 0.5rem">Which Century?</div>
            <b-form-select v-model="form.event_date_exact_date_century">
              <b-form-select-option value="1st half of 19th century"
                >1st half of 19th century</b-form-select-option
              >
              <b-form-select-option value="2nd half of 19th Century"
                >2nd half of 19th Century</b-form-select-option
              >

              <b-form-select-option value="1st half of 20th century">1st half of 20th century</b-form-select-option>
              <b-form-select-option value="2nd half of 20th century">2nd half of 20th century</b-form-select-option>
              <b-form-select-option value="etc">etc</b-form-select-option>
            </b-form-select>
          </div>

          <text-input
            v-if="
              form.event_date_exact_date_century != '1st half of 19th century' &&
              form.event_date_exact_date_century != '2nd half of 19th Century' &&
              form.event_date_exact_date_century != '1st half of 20th century' &&
              form.event_date_exact_date_century != '2nd half of 20th century' &&
              form.event_date_exact_date_century != '' &&
              form.event_date_exact_date_century != null
            "
            v-model="form.event_date_exact_date_century"
            :error="errors.event_date_exact_date_century"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Other Century"
          />

          <!-- <text-input
            v-model="form.image_scanning_date"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Scanning Date"
          /> -->

          <text-input
            v-model="form.image_scanning_date"
            :error="errors.image_scanning_date"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Scanning Date"
          />
          <!-- <b-form-datepicker
          v-model="form.image_scanning_date"
        :error="errors.image_scanning_date"


          locale="en-US"
          aria-controls="example-input"
          @context="onContext"
        ></b-form-datepicker> -->

          <!-- <text-input
            v-model="form.image_subject"
            :error="errors.image_subject"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Subject"
          /> -->

          <text-input
            v-model="form.image_subject_monument"
            :error="errors.image_subject_monument"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Subject Monument"
          />
          <text-input
            v-model="form.image_subject_area_in_monument"
            :error="errors.image_subject_area_in_monument"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Subject Area in monument"
          />
          <text-input
            v-model="form.image_subject_item_artifact_in_monument"
            :error="errors.image_subject_item_artifact_in_monument"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Subject item/artifact in monument"
          />

          <div>
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Image Subject Event
              <strong>{{ form.image_subject_event }}</strong>
            </div>

            <b-form-select v-model="form.image_subject">
              <b-form-select-option value="Graduation"
                >Graduation</b-form-select-option
              >
              <b-form-select-option value="Birthday"
                >Birthday</b-form-select-option
              >
              <b-form-select-option value="Summer">Summer</b-form-select-option>
              <b-form-select-option value="Meeting"
                >Meeting</b-form-select-option
              >
              <b-form-select-option value="Wedding"
                >Wedding</b-form-select-option
              >
              <b-form-select-option value="School Picture"
                >School Picture</b-form-select-option
              >
              <b-form-select-option value="Ethnographic"
                >Ethnographic</b-form-select-option
              >
              <b-form-select-option value="Studio Portraiture"
                >Studio Portraiture</b-form-select-option
              >
              <b-form-select-option value="etc">etc</b-form-select-option>
            </b-form-select>
          </div>
          <text-input
            v-if="form.image_subject == 'etc'"
            v-model="form.image_subject_event_other"
            :error="errors.image_subject_event_other"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Other event"
          />

          <text-input
            v-model="form.image_subject_object"
            :error="errors.image_subject_object"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Subject Object"
          />

          <!-- <div class="mt-2" style="margin-bottom: 0.5rem">
              Image Subject Event <strong>{{ form.image_subject_event }}</strong>
            </div> -->

          <!-- <b-form-select v-model="form.image_subject_event">
              <b-form-select-option value="Graduation">Graduation</b-form-select-option>
              <b-form-select-option value="Birthday"
                >Birthday</b-form-select-option
              >
              <b-form-select-option value="Summer">Summer</b-form-select-option>
              <b-form-select-option value="Meeting">Meeting</b-form-select-option>
              <b-form-select-option value="Wedding">Wedding</b-form-select-option>
              <b-form-select-option value="School Picture">School Picture</b-form-select-option>
              <b-form-select-option value="Ethnographic">Ethnographic</b-form-select-option>
              <b-form-select-option value="Studio Portraiture">Studio Portraiture</b-form-select-option>
              <b-form-select-option value="etc">etc</b-form-select-option>
            </b-form-select>

            <text-input
            v-if="
            form.image_subject_event != 'Summer' &&
            form.image_subject_event != 'Meeting' &&
            form.image_subject_event != 'Wedding' &&
            form.image_subject_event != 'School Picture' &&
            form.image_subject_event != 'Ethnographic' &&
            form.image_subject_event != 'Studio Portraiture' &&
            form.image_subject_event != '' &&
            form.image_subject_event != null
            "
            v-model="form.image_subject_event"
            :error="errors.image_subject_event"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Other events"
          /> -->

          <text-input
            v-model="form.image_subject_event_detail"
            :error="errors.image_subject_event_detail"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Event Detail"
          />

          <text-input
            v-model="form.image_subject_activity"
            :error="errors.image_subject_activity"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Activity"
          />

          <!-- <text-input
            v-model="form.image_subject_object"
            :error="errors.image_subject_object"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Objects"
          /> -->

          <div>
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Image Subject People
              <strong>{{ form.image_subject_people }}</strong>
            </div>

            <b-form-select v-model="form.image_subject_people">
              <b-form-select-option value="Exact Name"
                >Exact Name</b-form-select-option
              >
              <b-form-select-option value="Profession"
                >Profession</b-form-select-option
              >
              <b-form-select-option value="other">Other</b-form-select-option>
            </b-form-select>
          </div>

          <text-input
            v-model="form.image_subject_people_detail"
            :error="errors.image_subject_people_detail"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="People Detail"
          />

          <text-input
            v-model="form.image_subject_other"
            :error="errors.image_subject_other"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Other"
          />

          <!-- <text-input
            v-model="form.type_of_camera"
            :error="errors.type_of_camera"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Type Of Camera"
          /> -->

          <div>
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Type of camera <strong>{{ form.type_of_camera }}</strong>
            </div>

            <b-form-select v-model="form.type_of_camera">
              <b-form-select-option value="Nikon">Nikon</b-form-select-option>
              <b-form-select-option value="Canon">Canon</b-form-select-option>
              <b-form-select-option value="etc">Other</b-form-select-option>
            </b-form-select>
          </div>

          <text-input
            v-if="
              form.type_of_camera != 'Nikon' &&
              form.type_of_camera != 'Canon' &&
              form.type_of_camera != '' &&
              form.type_of_camera != null
            "
            v-model="form.type_of_camera"
            :error="errors.type_of_camera"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Other cameras"
          />

          <text-input
            v-model="form.keywords"
            :error="errors.keywords"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Keywords"
          />
          <!-- <text-input
            v-model="form.image_status_condition"
            :error="errors.image_status_condition"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Image Status Condition"
          /> -->

          <div>
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Image Status/Condition
              <strong>{{ form.image_status_condition }}</strong>
            </div>

            <b-form-select v-model="form.image_status_condition">
              <b-form-select-option value="Excellent"
                >Excellent</b-form-select-option
              >
              <b-form-select-option value="Good">Good</b-form-select-option>
              <b-form-select-option value="Needs Repair"
                >Needs Repair</b-form-select-option
              >
            </b-form-select>
          </div>

          <div
            v-if="
              form.image_status_condition != 'Excellent' &&
              form.image_status_condition != 'Good' &&
              form.image_status_condition != '' &&
              form.image_status_condition != null
            "
          >
            <div class="mt-2" style="margin-bottom: 0.5rem">
              Damage type <strong>{{ form.image_status_condition }}</strong>
            </div>

            <b-form-select v-model="form.image_status_condition">
              <b-form-select-option value="Faded">Faded</b-form-select-option>
              <b-form-select-option value="Damged Parts"
                >Damged Parts</b-form-select-option
              >
              <b-form-select-option value="Missing Parts"
                >Missing Parts</b-form-select-option
              >
              <b-form-select-option value="Immediate Intervention"
                >Immediate Intervention</b-form-select-option
              >
              <b-form-select-option value="Beyond Repair"
                >Beyond Repair</b-form-select-option
              >
              <b-form-select-option value="Biological Deterioration"
                >Biological Deterioration</b-form-select-option
              >
              <b-form-select-option value="Attached Photos"
                >Attached Photos</b-form-select-option
              >
              <b-form-select-option value="other">other</b-form-select-option>
            </b-form-select>
          </div>

          <text-input
            v-if="
              form.image_status_condition != 'Excellent' &&
              form.image_status_condition != 'Good' &&
              form.image_status_condition != '' &&
              form.image_subject_condition != null &&
              form.image_status_condition != 'Faded' &&
              form.image_status_condition != 'Damged Parts' &&
              form.image_status_condition != 'Missing Parts' &&
              form.image_status_condition != 'Immediate Intervention' &&
              form.image_status_condition != 'Beyond Repair' &&
              form.image_status_condition != 'Biological Deterioration' &&
              form.image_status_condition != 'Attached Photos'
            "
            v-model="form.image_status_condition"
            :error="errors.image_status_condition"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Other repair type"
          />

          <text-input
            v-model="form.comment"
            :error="errors.comment"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Comment"
          />
          <text-input
            v-model="form.digital_location_of_image_file"
            :error="errors.digital_location_of_image_file"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Digital Location Of Image File"
          />
          <text-input
            v-model="form.file_size"
            :error="errors.file_size"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="File Size"
          />
          <text-input
            v-model="form.copywrite"
            :error="errors.copywrite"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Copywrite"
          />
          <text-input
            v-model="form.bibliography_citation"
            :error="errors.bibliography_citation"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Bibliography Citation"
          />

          <image-compressor
            class="px-6 py-4 flex items-center"
            :done="getSocialMediaIcon"
          >
            Asar Social Media Image
          </image-compressor>
          <text-input
            v-model="form.nadim_foundation_copy_right_statement"
            :error="errors.nadim_foundation_copy_right_statement"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Nadim Foundation Copy Right Statement"
          />

          <!-- <select-input
            v-model="form.organization_id"
            :error="errors.organization_id"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Organization"
          >
            <option :value="null" />
            <option
              v-for="organization in organizations"
              :key="organization.id"
              :value="organization.id"
            >
              {{ organization.name }}
            </option>
          </select-input> -->

          <!-- <select-input
            v-model="form.country"
            :error="errors.country"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Country"
          >
            <option :value="null" />
            <option value="CA">Canada</option>
            <option value="US">United States</option>
          </select-input> -->
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Create Asar</loading-button
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import imageCompressor from "vue-image-compressor";
import VueMonthlyPicker from "@/Shared/VueMonthlyPicker";

export default {
  metaInfo: { title: "Create Asar" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    imageCompressor,
  },
  props: {
    errors: Object,
    asaar: Array,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      formatted: "",

      form: {
name: null,
image: null,
ownership: null,
ownership_name: null,
image_id: null,
nadim_image_id: null,
image_type_slide: null,
image_type_slide_size: null,
image_type_slide_frame: null,
image_type_negative: null,
image_type_negative_size: null,
image_type_negative_material: null,
image_type_print: null,
image_type_print_size: null,
image_type_print_type: null,
image_type_print_side: null,
image_type_print_side_recto_sig: null,
image_type_print_side_recto_sig_type: null,
image_type_print_side_recto_sig_name: null,
image_type_print_side_recto_other_marks: null,
image_type_print_side_verso_printed_info: null,
image_type_print_side_verso_hand_written: null,
image_type_print_side_verso_lang: null,
image_type_print_side_verso_dec_text: null,
image_type_print_printed_type: null,
image_type_print_printed_material: null,
image_type_print_printed_mount: null,
image_type_print_printed_orientation: null,
photografic_process: null,
photografic_process_digital_metadata: null,
description: null,
image_geographic_location_country: null,
image_geographic_location_gov: null,
image_geographic_location_city: null,
image_geographic_location_city_specific_site: null,
image_geographic_location_city_address: null,
image_geographic_location_city_desc_of_site: null,
photographer_studio: null,
event_date : null,
event_date_exact_date_btw: null,
event_date_exact_date_century: null,
image_scanning_date: null,
image_subject_monument: null,
image_subject_area_in_monument: null,
image_subject_item_artifact_in_monument: null,
image_subject_event: null,
image_subject_event_detail: null,
image_subject_activity: null,
image_subject_object: null,
image_subject_people: null,
image_subject_people_detail: null,
image_subject_other: null,
type_of_camera: null,
keywords: null,
image_status_condition: null,
image_status_needs_repair: null,
comment: null,
digital_location_of_image_file: null,
file_size: null,
copywrite: null,
bibliography_citation: null,
icons_for_sharing_on_social_media: null,
nadim_foundation_copy_right_statement:
          "©Nadim Foundation, All rights reserved",
        deleted_at: null,
      },
    };
  },

  methods: {
    onContext(ctx) {
      // The date formatted in the locale, or the `label-no-date-selected` string
      this.formatted = ctx.selectedFormatted;
      // The following will be an empty string until a valid date is entered
      this.selected = ctx.selectedYMD;
    },
    submit() {
      console.log(this.form);

      this.$inertia.post(this.route("asaar.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    getSocialMediaIcon(obj) {
      console.log(obj.original.base64);
      this.form.icons_for_sharing_on_social_media = obj.original.base64;
    },
    getImage(obj2) {
     console.log(obj2.original.base64);
      this.form.image = obj2.original.base64;

      console.log("xdxd");
    },
  },
};
</script>
