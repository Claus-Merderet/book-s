<script setup lang="ts">
import CompanyData = App.Data.CompanyData;
import {InertiaForm, useForm} from '@inertiajs/vue3'
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps<{
  company: CompanyData;
  errors: { name?: string | null, address?: string | null } | null;
}>();
const form = <InertiaForm<any>>useForm({
  name: props.company.name,
  address: props.company.address,
});
function submit() {
  if (props.company.name !== form.name || props.company.address !== form.address) {
    const url = route("companies.update", {id: props.company.id});
    form.patch(url, {
      preserveState: false,
      onSuccess: (response: any) => {
        console.log(response);
      },
      onError: async (message: any) => {
        console.log(message);
      }
    });
  }
}
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
      Edit Company
    </div>
    <div class="flex items-center justify-center flex-col mt-6">
      <form @submit.prevent="submit" class="p-4 border border-gray-300 bg-white shadow-lg rounded-md w-2/5">
        <div class="text-xl font-semibold mb-4">Company Data</div>
        <div class="mb-4">
          <label for="company_name" class="block text-sm font-medium text-gray-700">Name</label>
          <input id="company_name" v-model="form.name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"/>
          <div v-if="props.errors && props.errors.name" class="text-red-500 text-sm mt-1">{{ props.errors.name }}</div>
        </div>
        <div class="mb-4">
          <label for="company_address" class="block text-sm font-medium text-gray-700">Address</label>
          <input id="company_address" v-model="form.address" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"/>
          <div v-if="props.errors && props.errors.address" class="text-red-500 text-sm mt-1">{{ props.errors.address }}</div>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="submit" :disabled="form.processing" class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-800 text-white hover:bg-gray-700 hover:text-gray-300 transition duration-300 disabled:opacity-50">
            Update
          </button>
          <button @click="goBack()" class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-500 text-white hover:bg-gray-600 hover:text-gray-100 transition duration-300">
            Back
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>
