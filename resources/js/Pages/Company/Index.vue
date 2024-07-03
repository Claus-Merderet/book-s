<script setup lang="ts">
import CompanyData = App.Data.CompanyData;
import {Link} from '@inertiajs/vue3'
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps<{
  companies: CompanyData[]
}>();
</script>

<template>
  <AppLayout>
    <div class="mt-5 ml-5 text-3xl font-bold text-gray-800">
      Index Companies
    </div>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div
            class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"
            v-for="company in companies"
            :key="company.id"
        >
          <p class="text-lg font-semibold mb-2">ID: <span class="font-normal">{{ company.id }}</span></p>
          <p class="text-lg font-semibold mb-2">Name: <span class="font-normal">{{ company.name }}</span></p>
          <p class="text-lg font-semibold mb-4">Address: <span class="font-normal">{{ company.address }}</span></p>
          <div class="flex justify-end">
            <Link :href="route('companies.show',{id: company.id})"
                  class="inline-flex items-center px-4 py-2 rounded-md shadow-md bg-gray-800 text-white hover:bg-gray-700 hover:text-gray-300">
              Check
            </Link>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>
