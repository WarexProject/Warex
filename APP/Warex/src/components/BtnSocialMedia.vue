<template>
  <div>
    <a
      class="btnSocialMedia"
      :href="props.link"
      target="_blank"
      rel="noopener noreferrer"
      :style="{ color: props.txtColor, 'background-color': props.bgColor }"
    >
      <font-awesome-icon :icon="props.icon" />
      <p>{{ props.name }}</p>
    </a>
  </div>
</template>

<script setup lang="ts">
const props = defineProps(['link', 'name', 'icon', 'bgColor', 'txtColor'])
</script>

<style scoped>
p{
    margin: 0;
    padding: 0
}
a{
    text-decoration: none;
}

.btnSocialMedia {
  display: flex;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  padding-left: 0.75rem;
  padding-right: 0.75rem;
  gap: 0.5rem;
  align-items: center;
  border-radius: 0.5rem;
  width: fit-content;
  font-size: 1.25rem;
  line-height: 1.75rem;
}
</style>
