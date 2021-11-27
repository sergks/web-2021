<template>
  <div>
    <h1>Каталог товаров</h1>
    <section class="products row">
      <div v-for="item in products" class="product-item col-md-3">
        <Product :product="item"></Product>
      </div>
    </section>
  </div>
</template>

<script>
import Product from "../components/Product";

export default {
  name: "Catalog",
  components: {Product},
  data() {
    return {
      products: []
    }
  },
  created() {
    this.$http.get('/products')
      .then(response => this.products = response.data)
  }
}
</script>
