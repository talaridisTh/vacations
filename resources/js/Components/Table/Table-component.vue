<template>
  <div class="flex flex-col">
    <div class="py-2 align-middle inline-block min-w-full ">
      <div class="shadow border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <slot />
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Table-component"
}
</script>

<style scoped>

</style>