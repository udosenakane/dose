export default {
    cart: null,

    init() {
        this.cart = JSON.parse(localStorage.getItem('cart')) || null
    },

    deleteItem(item){
        const cartItemIndex = this.cart.items.find(citem => citem.item.id === item.id)
        this.cart.items.splice(cartItemIndex, 1)
        window.axios.get(`/cart/delete/${item.id}`).then(({data}) => {
            this.cart = data
            localStorage.setItem('cart', JSON.stringify(data))
            console.log(this.cart)
        })
    },

    decrementItem(item){
        window.axios.get(`/cart/decrement/${item.id}`).then(({data}) => {
            this.cart = data
            localStorage.setItem('cart', JSON.stringify(data))
            console.log(this.cart)
        })
    },


    addItem(item){
        window.axios.get(`/cart/add/${item.id}`).then(({data})=>{
            this.cart = data
            localStorage.setItem('cart', JSON.stringify(data))
            console.log(data)
        })
    },
}