<template>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Topic: {{ topic.title }}
    </h2>
    <p>
        {{ topic.description }}
    </p>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '../../Layouts/AppLayout.vue'

export default defineComponent({
  components: { AppLayout },
    props: {
        topic: {
            type: Object,
            required: true
        }
    }
})
</script>