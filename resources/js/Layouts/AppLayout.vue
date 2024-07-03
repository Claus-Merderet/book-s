<script setup>
import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
</script>

<template>
  <div class="flex flex-col min-h-screen bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-gray-900 to-gray-800 py-4 shadow-lg">
      <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-white text-4xl font-extrabold tracking-tight">Book-s</h1>
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="inline-flex rounded-md">
                <button
                    type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                >
                    {{ $page.props.auth.user.name }}

                    <svg
                        class="ms-2 -me-0.5 h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </span>
          </template>

          <template #content>
            <DropdownLink :href="`/`" method="get" as="button">Home</DropdownLink>
            <DropdownLink :href="route('companies.index')" method="get" as="button">Companies</DropdownLink>
            <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
            <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
          </template>
        </Dropdown>
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
