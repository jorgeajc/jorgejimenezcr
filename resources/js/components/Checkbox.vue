<template>
  <div>
    <input
      :id="id || name"
      :name="name"
      :checked="internalValue"
      type="checkbox"
      :class="class_check"
      @click="handleClick"
    >
    <label
      :for="id || name"
      v-bind:class="class_label"
    >
      <slot />
    </label>
  </div>
</template>

<script>
export default {
  name: 'Checkbox',

  props: {
    id: { type: String, default: null },
    name: { type: String, default: 'checkbox' },
    value: { type: Boolean, default: false },
    checked: { type: Boolean, default: false },
    class_check: {type: String, default: '' },
    class_label: {type: String, default: '' },
  },

  data: () => ({
    internalValue: false
  }),

  watch: {
    value (val) {
      this.internalValue = val
    },

    checked (val) {
      this.internalValue = val
    },

    internalValue (val, oldVal) {
      if (val !== oldVal) {
        this.$emit('input', val)
      }
    }
  },

  created () {
    this.internalValue = this.value

    if ('checked' in this.$options.propsData) {
      this.internalValue = this.checked
    }
  },

  methods: {
    handleClick (e) {
      this.$emit('click', e)

      if (!e.isPropagationStopped) {
        this.internalValue = e.target.checked
      }
    }
  }
}
</script>
