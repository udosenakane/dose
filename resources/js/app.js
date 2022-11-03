import './bootstrap';
import cart from './cart';
import productcreate from './productcreate';
// import payment from './payment';

import Alpine from 'alpinejs';
import axios from 'axios'

const http = axios.create({
    baseURL: 'http://localhost:8000/',
})

window.axios = http
window.Alpine = Alpine;

Alpine.data('fileupload', () => ({
    images: [],
    num_of_images: 5,

    init() {
        this.images = JSON.parse(localStorage.getItem('images')) || []
    },

    handleDeleteImage(image){
        const imgIndex = this.images.findIndex(img => img.url == image.url)
        this.images.splice(imgIndex, 1)
        localStorage.setItem('images', JSON.stringify(this.images))
    },

    handleOnChange(e){
        const formData = new FormData();

        const fileList = e.target.files;

        Array.from(fileList).forEach((file, index) => {      
            if(this.images.length < this.num_of_images){
                formData.append('file', file);
                    
                window.axios.post('/fileupload', formData).then(({data})=>{
                    this.images.push(data);
                    localStorage.setItem('images', JSON.stringify(this.images))
                })
            }
        })
    },
}))

Alpine.store('cart', cart)
// Alpine.store('payment', payment)
Alpine.data('productcreate', productcreate)

Alpine.data('countries', () => ({
    countries: [],
    search: '',

    getCountries(){
        window.axios.get(`/countries?country=${this.search}`).then(({data})=>{
            this.countries = data
            console.log(this.countries)
        })
    }
}))

Alpine.start();
