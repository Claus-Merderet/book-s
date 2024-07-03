<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";

const goBack = () => {
  window.history.back();
};
window.addEventListener('popstate', function (event: PopStateEvent): void {
  location.reload()
});

function submit() {

}
</script>

<template>
  <AppLayout>
    <div class="mt-5 ml-5 text-3xl font-bold text-gray-800">
      Add Branch
    </div>
    <div class="flex items-center justify-center flex-col mt-6">
      <form @submit.prevent="submit" class="p-4 border border-gray-300 bg-white shadow-lg rounded-md w-2/5">
        <div class="text-xl font-semibold mb-4">Branch Data</div>
        <div class="mb-4">
          <label for="branch_name" class="block text-sm font-medium text-gray-700">Name</label>
          <input id="branch_name"
                 class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"/>
        </div>
        <div class="mb-4">
          <label for="branch_description" class="block text-sm font-medium text-gray-700">Description</label>
          <input id="branch_description"
                 class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"/>
        </div>
        <div class="flex justify-end space-x-4">
          <button type="submit"
                  class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-800 text-white hover:bg-gray-700 hover:text-gray-300 transition duration-300 disabled:opacity-50">
            Store
          </button>
          <button @click="goBack()"
                  class="inline-flex items-center justify-center px-4 py-2 rounded-md shadow-md bg-gray-500 text-white hover:bg-gray-600 hover:text-gray-100 transition duration-300">
            Back
          </button>
        </div>
      </form>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>
