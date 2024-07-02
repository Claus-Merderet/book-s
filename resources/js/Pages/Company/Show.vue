<script setup lang="ts">
import CompanyData = App.Data.CompanyData;

const props = defineProps<{
  company: CompanyData
}>();
const goBack = () => {
  window.history.back();
};
</script>

<template>
  <div class="">Company Data</div>
  <div class="">{{company.id}}</div>
  <div class="">{{company.name}}</div>
  <div class="">{{company.address}}</div>
  <button @click="goBack">Back</button>
</template>
<style scoped>

</style>
