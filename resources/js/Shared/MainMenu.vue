<template>
  <div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('dashboard')">
        <icon name="dashboard" class="w-4 h-4 mr-2" :class="isUrl('') ? 'fill-black' : 'fill-indigo-400 group-hover:fill-black'" />
        <div :class="isUrl('') ? 'text-black' : 'text-indigo-300 group-hover:text-black'">Dashboard</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('organizations')">
        <icon name="office" class="w-4 h-4 mr-2" :class="isUrl('organizations') ? 'fill-black' : 'fill-indigo-400 group-hover:fill-black'" />
        <div :class="isUrl('organizations') ? 'text-black' : 'text-indigo-300 group-hover:text-black'">Organizations</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('contacts')">
        <icon name="users" class="w-4 h-4 mr-2" :class="isUrl('contacts') ? 'fill-black' : 'fill-indigo-400 group-hover:fill-black'" />
        <div :class="isUrl('contacts') ? 'text-black' : 'text-indigo-300 group-hover:text-black'">Contacts</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('reports')">
        <icon name="printer" class="w-4 h-4 mr-2" :class="isUrl('reports') ? 'fill-black' : 'fill-indigo-400 group-hover:fill-black'" />
        <div :class="isUrl('reports') ? 'text-black' : 'text-indigo-300 group-hover:text-black'">Reports</div>
      </inertia-link>
    </div>

     <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('asaar')">
        <icon name="printer" class="w-4 h-4 mr-2" :class="isUrl('asaar') ? 'fill-black' : 'fill-indigo-400 group-hover:fill-black'" />
        <div :class="isUrl('asaar') ? 'text-black' : 'text-indigo-300 group-hover:text-black'">Asaar</div>
      </inertia-link>
    </div>

  </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
  },
  props: {
    url: String,
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === '') {
        return this.url === ''
      }

      return urls.filter(url => this.url.startsWith(url)).length
    },
  },
}
</script>
