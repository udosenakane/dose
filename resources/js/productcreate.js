export default () => ({
    categories:[],
    category:'',
    images:[],
    price:'',
    color:'',
    quantity:'',
    metadata:[],
    size:'',
    title:'',
    description:'',
    newcategory:'',

    init(){
        this.images = JSON.parse(localStorage.getItem('images')) || []
        window.axios.get('/categories').then(({data}) => {
            this.categories = data
        })
    },

    handleAddCategory(){
        this.category = this.newcategory
    },

    handleCategorySelect(cat){
        this.category = cat
    },

    handleOnSubmit(){
        const metadata =  this.metadata.concat([{key:'size', value: this.size}, {key:'color', value: this.color}, {key:'quantity', value: this.quantity}])
        const formData = new FormData
        formData.append('title', this.title)
        formData.append('price', this.price)
        formData.append('category', this.category)
        formData.append('images', JSON.stringify(this.images))
        formData.append('description', this.description)
        formData.append('metadata', JSON.stringify(metadata))

        window.axios.post('/products', formData).then(({data}) => {
            console.log(data)
        })
    }

})