@extends('layouts.app')

@section('content')

<main>
   
    <form x-data="product_create" enctype='multipart/form-data' method="post" 
    style="max-width:800px" class="border my-8 mx-auto p-3" 
    x-on:submit.prevent="handleOnSubmit">
        <div x-data="fileupload" class="relative border rounded">
            <div id="pic-upload panel" style="height:50px" class="cursor-pointer text-center mt-10">
                <div x-on:click="$refs.image_upload_input.click()">
                    <span class="fas fa-plus"></span>
                </div>
                <input type="file" name="file" x-ref="image_upload_input" x-on:change="handleOnChange" 
                class="hidden">
            </div>    

            <div class="flex justify-center">
            
                <template x-if="images.length">
                    <template  x-for="image in images">
                        <div class="relative m-1" style="height:80px;width:80px">
                            <div x-on:click="handleDeleteImage(image)" 
                            style="top:-8px;right:-7px;z-index:200" 
                            class="cursor-pointer text-red-500 absolute">
                                <span class="fas fa-times-circle"></span>
                            </div>

                            <img style="height:80px;width:80px" 
                            class="rounded border" x-bind:src="image.url">
                        </div>
                    </template>
                </template>

                <p style="top:0px;right:0;left:0;width:150px" 
                class="py-0 rounded-bl rounded-br mx-auto border-l border-r border-b text-center absolute">
                Photo Panel</p>
            </div>

        </div>


        <div x-data="{open: false }" class="mt-8">
            <label for="">Category:* </label>
            <input type="text" x-model="category" x-on:click="open = true" 
            x-ref="cat_input" x-bind:class="open ? 'rounded-bl-none rounded-br-none': '' " 
            class="rounded border w-full py-1">

            <div x-show="open" x-on:click.outside="open = false" 
            class="flex flex-col border py-4 px-2 rounded-bl rounded-br">
                <div class="flex">
                    <input type="text" x-ref="cat_new_add" class="rounded-tl rounded-bl border py-1">
                    <button type="button" x-on:click="handleAddCategory"
                    class="text-white bg-green-400 px-4 rounded-tr rounded-br">Add</button>
                </div>

                <template x-for="cat in categories">
                    <div class="cursor-pointer" x-on:click="handleCategorySelect(cat)">
                        <span x-text="cat"></span>
                    </div>
                </template>
            
            </div>
        </div>

        <div class="mt-4">
            <label for="">Title:* </label>
            <input type="text" x-model="title" class="rounded border w-full py-1">
        </div>

        <div class="mt-4">
            <label for="">Description: </label>
            <textarea rows="6" x-model="description" id="description" class="rounded border w-full py-1"></textarea>
        </div>

        <div class="mt-4">
            <label for="">Price:* </label>
            <input type="text" x-model="price" class="rounded border w-full py-1">
        </div>

        <div class="mt-4">
            <label for="">Color:* </label>
            <input type="text" x-model="color" class="rounded border w-full py-1">
        </div>

        <div class="mt-4">
            <label for="">Quantity:* </label>
            <input type="text" x-model="quantity" class="rounded border w-full py-1">
        </div>

        <div class="mt-4">
            <label for="">Size:* </label>
            <select x-model="size" style="padding:6px 0" class="rounded border bg-white w-full pl-4" name="" id="">
                <option value="">---select size---</option>
                <option value="xs">XS</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
                <option value="xxl">XXL</option>
            </select>
        </div>

        <!-- <div class="mt-4">
        
            <label>Metadata: </label>
            <div class="border rounded text-center p-2">
    	        <button type="button" 
                class="rounded-full bg-blue-500 px-3 text-white" x-on:click="addData">
                click to add meta data
                </button>

                <template x-for="data in metadata">
                    <div class="relative border mt-3 rounded px-2 pb-2">
                    <div x-on:click="handleDeleteData(data)" 
                    style="top:-8px;right:-7px;z-index:200" class="cursor-pointer text-red-500 absolute">
                        <span class="fas fa-times-circle"></span>
                    </div>
                    <div class="flex">
                        <div class="text-left w-1/2 mr-1">
                            <label class="text-left" for="">Key:* </label>
                            <input x-on:change="handleOnChange" x-model="data.key" type="text" 
                            class="rounded border w-full py-1">
                        </div>

                        <div class="text-left w-1/2 ml-1">
                            <label class="text-left" for="">Value:* </label>
                            <input x-on:change="handleOnChange" x-model="data.value" type="text" 
                            class="rounded border w-full py-1">
                        </div>
                    </div>
                    </div>
                </template>
            </div>
        </div> -->
        
        <div class="flex justify-end">
            <button class="bg-green-500 rounded py-1 px-4 text-white mt-5">Submit</button>

        </div>
    </form>

</main>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
@endsection