const prices = document.querySelectorAll('.btn-buy')

prices.forEach((item) => {
  item.addEventListener('click', () => {
    const price = item.getAttribute('data-price')
    item.innerHTML = 'Добавлен'
    item.classList.add('add')
  })
})

const sendProduct = (id) => {
  // axios
  fetch('http://yandex.ru', {})
    .then((response) => {
      item.innerHTML = 'Добавлен'
      item.classList.add('add')
    })
    .catch((error) => {

    })
}