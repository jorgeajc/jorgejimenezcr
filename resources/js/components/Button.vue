<template>
  <button
    :type="nativeType"
    :disabled="loading"
    :class="{
      [`btn-${type}`]: true,
      'btn-block': block,
      'btn-lg': large,
      'btn-loading': loading
    }"
    class="btn"
  >
    <div v-if="iconName && iconPrefix">
      <fa :icon="[iconPrefix, iconName]" />
    </div>
    <div v-else>
      {{actionText}}
    </div>
  </button>
</template>

<script>
export default {
  name: 'VButton',

  props: {
    actionText: {
      type: String,
      default: 'Insert action'
    },
    iconPrefix: {
      type: String,
      default: ''
    },
    iconName: {
      type: String,
      default: ''
    },
    type: {
      type: String,
      default: 'primary'
    },
    nativeType: {
      type: String,
      default: 'submit'
    },
    loading: {
      type: Boolean,
      default: false
    },
    block: {
      type: Boolean,
      default: false
    },
    large: {
      type: Boolean,
      default: false
    }
  }
}
</script>
