<template>
  <div>
    <section v-if="product">
      <h1>{{ product.name }}</h1>
    </section>
  </div>
</template>

<script>
export default {
  name: "ProductInfo",
  data() {
    return {
      product: null
    }
  },
  created() {
    const id = this.$route.params.id
    this.$http.get('/products/' + id)
      .then(response => this.product = response.data)
  }
}
</script>
