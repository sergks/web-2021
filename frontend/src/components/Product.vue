<template>
  <section class="product-item">
    <div>
      <img src="https://items.s1.citilink.ru/1385874_v01_b.jpg" alt="Товар 1" />
    </div>
    <h4>
      <router-link :to="{name: 'ProductInfo', params: {id: product.id}}">
        {{ product.name }}
      </router-link>
    </h4>
    <div>
      <span class="price">{{ product.price }} ₽</span>
    </div>
    <p>
      <button class="btn-cart" @click="addToCart(product)" v-if="!product.inCart">Купить</button>
      <button class="btn-cart add-cart" @click="addToCart(product)" v-if="product.inCart">В корзине</button>
    </p>
    <div v-if="product.inCart">
      <p>Этот товар добавлен в корзину!!!</p>
    </div>
  </section>
</template>

<script>
export default {
  name: "Product",
  props: ['product'],
  methods: {
    addToCart(product) {
      const params = {
        id: product.id,
        count: 1
      }
      this.$http.post('/cart', params)
        .then(response => product.inCart = response.data.inCart)
    }
  }
}
</script>
