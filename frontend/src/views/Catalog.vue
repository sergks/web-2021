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
      products: [
        {
          id: 1,
          name: 'Провод Rexant ШВВП 2x0.5мм2 5м',
          price: 100,
          inCart: false
        },
        {
          id: 2,
          name: 'Провод Rexant ШВВП 2x0.5мм2 10м',
          price: 300,
          inCart: false
        }
      ]
    }
  },
  created() {
    /// response = get(...)
    // this.products = response
  }
}
</script>
