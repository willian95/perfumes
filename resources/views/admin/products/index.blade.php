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
                            <div class="card-toolbar">
                                
                                <!--end::Dropdown-->
                                <!--begin::Button-->
                                <a type="button" class="btn btn-primary" href="{{ url('/admin/product/create') }}">
                                    Nuevo Producto
                                </a>
                                <!--end::Button-->
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-checkable" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(product, index) in products">
                                        <th>@{{ index + 1 }}</th>
                                        <td>@{{ product.name }}</td>
                                        <td>
                                            <a class="btn btn-primary" :href="'{{ url('/admin/product/edit/') }}'+'/'+product.id"><i class="far fa-edit"></i></a>

                                            <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal" @click="show(product)"><i class="far fa-eye"></i></button>                                            
                                            <button class="btn btn-primary" @click="erase(product.id)"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ page }} de @{{ pages }}</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="kt_datatable_previous" v-if="page > 1">
                                                <a href="#" aria-controls="kt_datatable" data-dt-idx="1" tabindex="0" class="page-link">
                                                    <i class="ki ki-arrow-back"></i>
                                                </a>
                                            </li>
                                            <li class="paginate_button page-item active" v-for="index in pages">
                                                <a href="#" aria-controls="kt_datatable" tabindex="0" class="page-link":key="index" @click="fetch(index)" >@{{ index }}</a>
                                            </li>
                                            
                                            <li class="paginate_button page-item next" id="kt_datatable_next" v-if="page < pages" href="#">
                                                <a href="#" aria-controls="kt_datatable" data-dt-idx="7" tabindex="0" class="page-link" @click="fetch(page + 6)">
                                                    <i class="ki ki-arrow-next"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--end: Datatable-->
                        </div>
                    </div>

                </div>

            </div>

            <!-- Modal-->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Producto y presentaciones</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="row" v-if="showProduct != ''">
                                <div class="col-md-6">
                                    <label>Nombre:</label>
                                    <p>@{{ showProduct.name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label>Marca:</label>
                                    <p>@{{ showProduct.brand.name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label>Categoría:</label>
                                    <p>@{{ showProduct.category.name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label>Imagen:</label>
                                    <img :src="'{{ url('/') }}'+'/images/products/'+showProduct.image" alt="" style="width: 100%">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center">Presentaciones</p>

                                    <table class="table table-bordered table-checkable" id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fragancia</th>
                                                <th>Tamaño</th>
                                                <th>Stock</th>
                                                <th>precio</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(productSize, index) in showProduct.product_type_sizes" v-if="showProduct != ''">
                                                <th>@{{ index + 1 }}</th>
                                                <td>@{{ productSize.type.name }}</td>
                                                <td>@{{ productSize.size.name }}</td>
                                                <td>@{{ productSize.stock }}</td>
                                                <td>@{{ productSize.price }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        </div>
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
                    modalTitle:"Nueva categoría",
                    products:[],
                    showProduct:"",
                    pages:0,
                    page:1
                }
            },
            methods:{
                
                fetch(page = 1){
                    this.page = page
                    axios.get("{{ url('/admin/product/fetch/') }}"+"/"+page).then(res => {

                        if(res.data.success == true){

                            this.products = res.data.products
                            this.pages = Math.ceil(res.data.productsCount / 20)

                        }else{
                            alert(res.data.msg)
                        }

                    })

                },
                show(product){

                    this.showProduct = product

                },
                erase(id){

                    swal({
                        title: "¿Estás seguro?",
                        text: "Eliminarás este producto!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            
                            axios.post("{{ url('/admin/product/delete/') }}", {id: id}).then(res => {

                                if(res.data.success == true){
                                    swal({
                                        title: "Genial!",
                                        text: "Producto eliminado!",
                                        icon: "success"
                                    });
                                    this.fetch()
                                }else{

                                    alert(res.data.msg)

                                }

                            }).catch(err => {
                                $.each(err.response.data.errors, function(key, value){
                                    alert(value)
                                });
                            })

                        }
                    });

                }


            },
            mounted(){
                
                this.fetch()
                

            }

        })
    
    </script>

@endpush