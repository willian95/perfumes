@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Productos
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" v-model="name">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brand">Marca</label>
                                        <select id="brand" class="form-control" v-model="brand">
                                            <option :value="brand.id" v-for="brand in brands">@{{ brand.name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Categoría</label>
                                        <select id="category" class="form-control" v-model="category">
                                            <option :value="category.id" v-for="category in categories">@{{ category.name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Imágen</label>
                                        <input type="file" class="form-control" ref="file" @change="onImageChange" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <img id="blah" :src="'{{ url('/') }}'+'/images/products/'+imagePreview" class="full-image" style="margin-top: 10px; width: 40%">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text-center">Presentaciones <button class="btn btn-success" data-toggle="modal" data-target="#productModal" @click="create()">+</button></h3>
                                </div>

                                <!--<div class="col-12">
                                    <p class="text-center">
                                        <button class="btn btn-success" @click="addProductSizeType()" v-if="edit == false">Añadir</button>
                                        <button class="btn btn-success" @click="updateProductSizeType()" v-if="edit == true">Editar</button>
                                        <button class="btn btn-success" @click="create()" v-if="edit == true">Crear</button>
                                    </p>
                                </div>-->

                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <table class="table table-bordered table-checkable" id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fragancia</th>
                                                <th>Tamaño</th>
                                                <th>Stock</th>
                                                <th>Precio</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(productSizeType, index) in productSizeTypes">
                                                <td>@{{ index + 1 }}</td>
                                                <td v-if="productSizeType.type">@{{ productSizeType.type.name }}</td>
                                                <td v-else></td>
                                                <td v-if="productSizeType.size">@{{ productSizeType.size.name }}</td>
                                                <td v-else></td>
                                                <td>@{{ productSizeType.stock }}</td>
                                                <td>@{{ productSizeType.price }} $</td>
                                                <td>
                                                    <button class="btn btn-success" @click="editProductSizeType(index)" data-toggle="modal" data-target="#productModal"><i class="far fa-edit"></i></button>
                                                    <button class="btn btn-danger" @click="deleteProductSizeType(index)"><i class="far fa-trash-alt"></i></button>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <p class="text-center">
                                        <button class="btn btn-primary" @click="update()">Actualizar</button>
                                    </p>
                                </div>
                            </div>

                            <!--end: Datatable-->
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Modal-->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Presentación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Frangancia</label>
                                    <select id="type" class="form-control" v-model="type">
                                        <option :value="type" v-for="type in types">@{{ type.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="size">Tamaño</label>
                                    <select id="size" class="form-control" v-model="size">
                                        <option :value="size" v-for="size in sizes">@{{ size.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" class="form-control" v-model="stock" @keypress="isNumber($event)">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Precio</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" v-model="price" @keypress="isNumberDot($event)">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">$</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="modal-footer">
                        <button class="btn btn-success" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-success" @click="addProductSizeType()" v-if="edit == false" data-dismiss="modal">Añadir</button>
                        <button class="btn btn-success" @click="updateProductSizeType()" v-if="edit == true" data-dismiss="modal">Editar</button>
                        <!--<button class="btn btn-success" @click="create()" v-if="edit == true">Crear</button>-->
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-category',
            data(){
                return{
                    categories:[],
                    brands:[],
                    types:[],
                    sizes:[],
                    productSizeTypes:[],
                    stock:"",
                    price:"",
                    type:"",
                    size:"",
                    picture:"",
                    productId:'{{ $product->id }}',
                    category:'{{ $product->category_id }}',
                    brand:'{{ $product->brand_id }}',
                    name:'{{ $product->name }}',
                    imagePreview:'{{ $product->image }}',
                    pages:0,
                    page:1,
                    edit:false,
                    productTypeIndex:""
                }
            },
            methods:{
                
                update(){

                    axios.post("{{ url('/admin/product/update') }}", {name:this.name, brand: this.brand, category: this.category, image: this.picture, productSizeTypes: this.productSizeTypes, id: this.productId}).then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Genial!",
                                text: "Producto actualizado!",
                                icon: "success"
                            }).then(function() {
                                window.location.href = "{{ url('/admin/product/index') }}";
                            });

                        }else{
                            alert(res.data.msg)
                        }

                    }).catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                onImageChange(e){
                    this.picture = e.target.files[0];

                    this.imagePreview = URL.createObjectURL(this.picture);
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.view_image = false
                    this.createImage(files[0]);
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.picture = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                addProductSizeType(){

                    if(this.size != "" && this.type != "" && this.stock != "" && this.price != ""){
                        this.productSizeTypes.push({size: this.size, type: this.type, stock: this.stock, price: this.price})
                        this.size = ""
                        this.type = ""
                        this.stock = ""
                        this.price = ""
                    }

                },
                deleteProductSizeType(index){

                    this.productSizeTypes.splice(index, 1)

                },
                editProductSizeType(index){
                    

                    this.size = this.productSizeTypes[index]["size"]
                    this.type = this.productSizeTypes[index]["type"]
                    this.stock = this.productSizeTypes[index]["stock"]
                    this.price = this.productSizeTypes[index]["price"]
                    this.productTypeIndex = index
                    this.edit = true

                },
                updateProductSizeType(){

                    this.productSizeTypes[this.productTypeIndex]["size"] = this.size
                    this.productSizeTypes[this.productTypeIndex]["type"] = this.type
                    this.productSizeTypes[this.productTypeIndex]["stock"] = this.stock
                    this.productSizeTypes[this.productTypeIndex]["price"] = this.price
                    this.edit = false
                    this.productTypeIndex = ""

                    this.size = ""
                    this.type = ""
                    this.stock = ""
                    this.price = ""

                },
                create(){
                    this.edit = false
                    this.size = ""
                    this.type = ""
                    this.stock = ""
                    this.price = ""
                },
                fetchCategories(){

                    axios.get("{{ url('/admin/category/fetch/all') }}").then(res => {

                        if(res.data.success == true){
                            
                            this.categories = res.data.categories
                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                fetchBrands(){

                    axios.get("{{ url('/admin/brand/fetch/all') }}").then(res => {

                        if(res.data.success == true){
                            
                            this.brands = res.data.brands
                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                fetchTypes(){

                    axios.get("{{ url('/admin/type/fetch/all') }}").then(res => {

                        if(res.data.success == true){
                            
                            this.types = res.data.types
                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                isNumberDot(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                        evt.preventDefault();;
                    } else {
                        return true;
                    }
                },
                isNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
                        evt.preventDefault();;
                    } else {
                        return true;
                    }
                },
                fetchSizes(){

                    axios.get("{{ url('/admin/size/fetch/all') }}").then(res => {

                        if(res.data.success == true){
                            
                            this.sizes = res.data.sizes
                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                fetchProductType(){

                    axios.get("{{ url('/admin/product/product-type/') }}"+"/"+this.productId)
                    .then(res => {

                        if(res.data.success == true){

                            this.productSizeTypes = res.data.productType

                        }else{
                            alert(res.data.msg)
                        }
                    })

                }


            },
            mounted(){
                
                this.fetchCategories()
                this.fetchBrands()
                this.fetchTypes()
                this.fetchSizes()
                this.fetchProductType()

            }

        })
    
    </script>

@endpush