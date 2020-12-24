<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Asaar</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter v-model="form.search" class="w-full max-w-md mr-4" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <inertia-link class="btn-indigo" :href="route('asaar.create')">
        <span>Create</span>

        <span class="hidden md:inline">Asar</span>
      </inertia-link>
    </div>
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <tr class="text-left font-bold">
            <th class="px-6 pt-6 pb-4">#</th>
              <th class="px-6 pt-6 pb-4">Title</th>
                            <th class="px-6 pt-6 pb-4">Image</th>

              <th class="px-6 pt-6 pb-4">Ownership</th>
              <th class="px-6 pt-6 pb-4">Image ID</th>
              <th class="px-6 pt-6 pb-4">Nadim image id</th>
              <th class="px-6 pt-6 pb-4">Photografic process</th>
              <th class="px-6 pt-6 pb-4">Description</th>
              <th class="px-6 pt-6 pb-4">Image Geographic Location</th>
              <th class="px-6 pt-6 pb-4">Photographer Studio</th>
              <th class="px-6 pt-6 pb-4">Event Date</th>
              <th class="px-6 pt-6 pb-4">Image Scanning Date</th>
              <th class="px-6 pt-6 pb-4">Image Subject</th>
              <th class="px-6 pt-6 pb-4">Type Of Camera</th>
              <th class="px-6 pt-6 pb-4">Keywords</th>
              <th class="px-6 pt-6 pb-4">Image Status Condition</th>
              <th class="px-6 pt-6 pb-4">Comment</th>
              <th class="px-6 pt-6 pb-4">Digital Location Of Image File</th>
              <th class="px-6 pt-6 pb-4">File Size</th>
              <th class="px-6 pt-6 pb-4">Copywrite</th>
              <th class="px-6 pt-6 pb-4">Bibliography Citation</th>
              <th class="px-6 pt-6 pb-4">Icon for sharing on Social Media</th>
              <th class="px-6 pt-6 pb-4">Nadim Foundation Copywrite statement</th>

          <!-- <th class="px-6 pt-6 pb-4" colspan="2">Phone</th> -->
        </tr>
        <tr v-for="asar in asaar.data" :key="asar.id" class="hover:bg-gray-100 focus-within:bg-gray-100">

          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" :href="route('asaar.edit', asar.id)">
              {{ asar.id }}
              <icon v-if="asar.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.name }}

            </inertia-link>
          </td>
          <td class="border-t">
                              <img class="px-6 py-4 flex items-center" v-bind:src="asar.image" />

          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.ownership+' by '+ asar.ownership_name }}

            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.image_id }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.nadim_image_id }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.photografic_process}}
            </inertia-link>
          </td>

          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.description }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.image_geographic_location_country+' ,'+asar.image_geographic_location_gov+'\n'+asar.image_geographic_location_city+' ,'+asar.image_geographic_location_city_specific_site+'\n'+asar.image_geographic_location_city_address+'\n'+asar.image_geographic_location_city_desc_of_site }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.photographer_studio }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.event_date+'\n'+ asar.event_date_exact_date_btw+'\n'+asar.event_date_exact_date_century}}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.image_scanning_date }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.image_subject_monument+'\n'+asar.image_subject_area_in_monument+'\n'+asar.image_subject_item_artifact_in_monument+"\nEvent"+asar.image_subject_event+"\nDetail and activity"+asar.image_subject_event_detail+" ,"+asar.image_subject_activity }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.type_of_camera }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.keywords }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.image_status_condition }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.comment }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.digital_location_of_image_file }}
            </inertia-link>

          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.file_size }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.copywrite }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.bibliography_citation }}
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
                  <img class="px-6 py-4 flex items-center" v-bind:src="asar.icons_for_sharing_on_social_media" />
            </inertia-link>
          </td>
          <td class="border-t">
            <inertia-link class="px-6 py-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              {{ asar.nadim_foundation_copy_right_statement }}
            </inertia-link>
          </td>
          <td class="border-t w-px">
            <inertia-link class="px-4 flex items-center" :href="route('asaar.edit', asar.id)" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </inertia-link>
          </td>
        </tr>
        <tr v-if="asaar.data.length === 0">
          <td class="border-t px-6 py-4" colspan="4">No asaar found.</td>
        </tr>
      </table>
    </div>
    <pagination :links="asaar.links" />
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import pickBy from 'lodash/pickBy'
import SearchFilter from '@/Shared/SearchFilter'
import throttle from 'lodash/throttle'
import imageCompressor from "vue-image-compressor";

export default {
  metaInfo: { title: 'Asaar' },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    imageCompressor
  },
  props: {
    asaar: Object,
    filters: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      handler: throttle(function() {
        let query = pickBy(this.form)
        this.$inertia.replace(this.route('asaar', Object.keys(query).length ? query : { remember: 'forget' }))
      }, 150),
      deep: true,
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
      getSocialMediaIcon(obj) {
      console.log(obj.original.base64);
      this.form.icons_for_sharing_on_social_media = obj.original.base64;
    },
    getImage(obj) {
      console.log("mmmm");
      console.log(obj);
      console.log(obj.original.base64);
      this.form.image = obj.original.base64;
      console.log("xdxd");
    },

      onContext(ctx) {
      // The date formatted in the locale, or the `label-no-date-selected` string
      this.formatted = ctx.selectedFormatted;
      // The following will be an empty string until a valid date is entered
      this.selected = ctx.selectedYMD;
    },

  },
}
</script>
