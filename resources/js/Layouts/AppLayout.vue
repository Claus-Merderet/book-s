<script setup lang="ts">
import {Link} from "@inertiajs/vue3";

</script>

<template>
  <div class="flex flex-col min-h-screen bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-gray-900 to-gray-800 py-4 shadow-lg">
      <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-white text-4xl font-extrabold tracking-tight">Book-s</h1>
        <nav>
          <ul class="flex space-x-6 text-white">
            <li>
              <Link :href="`/`" class="hover:text-gray-300">Home</Link>
            </li>
            <li>
              <Link :href="`/companies`" class="hover:text-gray-300">Companies</Link>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main content -->
    <main class="container mx-auto flex-grow py-8 px-4">
      <slot></slot>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 py-4 text-gray-400">
      <div class="container mx-auto text-center">
        <p>&copy; 2024 Book-s. All rights reserved.</p>
      </div>
    </footer>
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body {
  font-family: 'Poppins', sans-serif;
}
</style>
