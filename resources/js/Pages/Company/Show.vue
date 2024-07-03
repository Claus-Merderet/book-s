<script setup lang="ts">
import CompanyData = App.Data.CompanyData;
import {Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps<{
  company: CompanyData
}>();
const goBack = () => {
  window.history.back();
};
window.addEventListener('popstate', function (event: PopStateEvent): void {
  location.reload()
});
</script>

<template>
  <AppLayout>
    <div class="mt-5 ml-5 text-3xl font-bold text-gray-800">
      Show Company
    </div>
    <div class="flex items-center justify-center flex-col mt-6 space-y-4">
      <div class="p-4 border border-gray-300 bg-white shadow-lg rounded-md w-2/5">
        <div class="text-xl font-semibold mb-2">Company Data</div>
        <div class="text-lg font-normal mb-2">ID: {{ props.company.id }}</div>
        <div class="text-lg font-normal mb-2">Name: {{ props.company.name }}</div>
        <div class="text-lg font-normal mb-4">Address: {{ props.company.address }}</div>
        <div class="flex justify-end space-x-4">
          <Link :href="`/companies/${props.company.id}/edit`"
                class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-800 text-white hover:bg-gray-700 hover:text-gray-300 transition duration-300">
            Edit
          </Link>
          <button @click="goBack"
                  class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-500 text-white hover:bg-gray-600 hover:text-gray-100 transition duration-300">
            Back
          </button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<style scoped>

</style>
