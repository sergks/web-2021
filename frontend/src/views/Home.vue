<template>
  <div class="home">
    <h1>Главная страница</h1>
    <img alt="Vue logo" src="../assets/logo.png">

    <section class="products">
      <Product :product="product"></Product>
    </section>
  </div>
</template>

<script>
import Product from "../components/Product";
export default {
  name: 'Home',
  components: {Product},
  data() {
    return {
      product: {
        id: 1,
        name: 'Провод Rexant ШВВП 2x0.5мм2 5м',
        price: 200
      }
    }
  }
}
</script>
