<script setup lang="ts">
import CompanyData = App.Data.CompanyData;
import {Link} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

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
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <p class="text-lg font-semibold mb-2">ID: <span class="font-normal">{{ props.company.id }}</span></p>
          <p class="text-lg font-semibold mb-2">Name: <span class="font-normal">{{ props.company.name }}</span></p>
          <p class="text-lg font-semibold mb-4">Address: <span class="font-normal">{{ props.company.address }}</span>
          </p>
          <div class="flex justify-end space-x-4">
            <Link :href="route('companies.edit', {id: props.company.id})"
                  class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-800 text-white hover:bg-gray-700 hover:text-gray-300 transition duration-300">
              Edit
            </Link>
            <Link :href="route('branches.create')"
                  class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-800 text-white hover:bg-gray-700 hover:text-gray-300 transition duration-300">
              Add branches
            </Link>
            <PrimaryButton @click="goBack()">Back</PrimaryButton>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<style scoped>

</style>
