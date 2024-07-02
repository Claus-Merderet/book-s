<script setup lang="ts">
import CompanyData = App.Data.CompanyData;
import {Link} from '@inertiajs/vue3'

const props = defineProps<{
  companies: CompanyData[]
}>();
</script>

<template>
  <div class="">
    Index company
  </div>
  <div class="flex flex-col">
    <div
        v-for="company in companies"
        :key="company.id"
        class="gap-1 p-2 border-2 border-black w-2/5 mx-auto"
    >
      <Link :href="`/companies/${company.id}`">
        check
      </Link>
      <Link :href="`/companies/${company.id}`">
        edit
      </Link>
      <p>id: {{ company.id }}</p>
      <p>name: {{ company.name }}</p>
      <p>address: {{ company.address }}</p>
    </div>
  </div>
</template>

<style scoped>

</style>
