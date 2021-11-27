<template>
  <div class="cart">
    <span class="alert alert-success" v-if="cart">Корзина: {{ cart.total }} ₽</span>
  </div>
</template>

<script>
export default {
  name: "CartInfo",
  data() {
    return {
      cart: null
    }
  },
  created() {
    this.$http.get('/cart')
      .then(response => this.cart = response.data)
  }
}
</script>
