  <div class="border flex sm:flex-col overflow-hidden items-center 
shadow rounded p-1 w-full h-full">
    <a href="{{ route('product.show', $product->slug) }}" class="sm:w-full w-4/12">                      
        <img class="w-full h-full rounded" 
        src="{{ product->images[0] }}"
        alt="{{ $product->name }}">
    </a>

   <div class="sm:w-full w-8/12 sm:ml-0 ml-2">
        <a class="text-gray-700" href="{{ route('product.show', $product->slug) }}">                      
            {{ $product->name }}
        </a>                      
        
        <p class="border-b border-t border-gray mb-1 product-price py-1">
            <span style="line-height:1" class="bg-green-200  px-2 rounded">
            {{ currency }}{{ $product->price }}
            </span>
        </p>

        <button x-data="{
            addItem(){
              window.axios.post('wc/store/cart/add-item', { id: {{ $product->id }} )
              .then(({data})=>{
                this.items = data
                console.log(data)
              }).catch(error => {
                console.log(error.toString())
              })
            }
          }" 
            x-on:click="addItem()"
                class="w-full rounded py-1 hover:bg-white 
                hover:border-yellow-500 hover:text-yellow-500 
                px-2 sm:py-1 text-black bg-yellow-500">
            ADD TO CART
        </button>
    </div>


</div>