<script setup lang="ts">
import CompanyData = App.Data.CompanyData;
import {useForm} from '@inertiajs/vue3'
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";


const props = defineProps<{
  company: CompanyData;
}>();

const form = useForm({
  name: props.company.name,
  address: props.company.address,
  errors: {},
});

function submit() {
  if (props.company.name !== form.name || props.company.address !== form.address) {
    const url = route("companies.update", {id: props.company.id});
    form.patch(url, {
      preserveState: false,
      onSuccess: (response: any) => {
        console.log('success');
        console.log(response);
      },
      onError: async (message: any) => {
        console.log('error');
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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>
          <header>
            <h2 class="text-lg font-medium text-gray-900"> Company Information</h2>
            <p class="mt-1 text-sm text-gray-600">
              Update your company's profile information.
            </p>
          </header>
          <form @submit.prevent="form.patch(route('companies.update', {id: props.company.id}))" class="mt-6 space-y-6">
            <div>
              <InputLabel for="company_name" value="Name"/>

              <TextInput
                  id="company_name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
              />
              <InputError class="mt-2" v-if="form.errors.name"
                          :message="form.errors.name" v-bind:delay="500"/>
            </div>
            <div>
              <InputLabel for="company_address" value="Address"/>
              <TextInput
                  id="company_address"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.address"
              />
              <InputError class="mt-2" v-if="form.errors.address" :message="form.errors.address"/>
            </div>
            <div class="flex justify-end gap-4 items-center">
              <Transition
                  enter-active-class="transition ease-in-out"
                  enter-from-class="opacity-0"
                  leave-active-class="transition ease-in-out"
                  leave-to-class="opacity-0"
              >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
              </Transition>
              <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
              <PrimaryButton @click="goBack()">Back</PrimaryButton>
            </div>
          </form>
        </section>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>
