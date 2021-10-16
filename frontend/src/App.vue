<template>
  <div id="app">
    <header>
      <div class="brand">Название компании</div>
      <nav>
        <ul>
          <li>
            <router-link :to="{name: 'Catalog'}">Каталог</router-link>
          </li>
          <li>
            <router-link :to="{name: 'About'}">О нас</router-link>
          </li>
          <li>
            <router-link :to="{name: 'Contact'}">Контакты</router-link>
          </li>
        </ul>
      </nav>
    </header>

    <router-view/>

    <hr />
    <footer>
      <div>&copy; 2021 ПВ-42</div>
      <div>+78290387409234</div>
    </footer>
  </div>
</template>

<script>

</script>