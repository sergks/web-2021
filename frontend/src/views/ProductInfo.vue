<template>
  <div>
    <h1>Это страница товара {{ id }}</h1>
  </div>
</template>

<script>
export default {
  name: "ProductInfo",
  data() {
    return {
      id: null
    }
  },
  created() {
    this.id = this.$route.params.id
  }
}
</script>
