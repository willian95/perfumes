@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Compras
                            </div>
                            <div class="card-toolbar">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-checkable" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cliente</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(shopping, index) in shoppings">
                                        <th>@{{ shopping.order_id }}</th>
                                        <td>@{{ shopping.user.name }}</td>
                                        <td style="text-transform: capitalize;">@{{ shopping.status }}</td>
                                        <td>$ @{{ parseInt(shopping.total).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</td>
                                        <td>@{{ shopping.created_at.toString().substring(0, 10) }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#shoppingModal" @click="show(shopping)"><i class="far fa-eye"></i></button>
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
            <div class="modal fade" id="shoppingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body" v-if="shopping != ''">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><strong>Cliente</strong></label>
                                    <p>@{{ shopping.user.name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Email</strong></label>
                                    <p>@{{ shopping.user.email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Costo productos</strong></label>
                                    <p>$ @{{ parseInt(shopping.total_products).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Costo envío</strong></label>
                                    <p>$ @{{ parseInt(shopping.shipping_cost).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Total</strong></label>
                                    <p>$ @{{ parseInt(shopping.total).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Tracking</strong></label>
                                    <p>@{{ shopping.tracking }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Status tracing</strong></label>
                                    <p>@{{ shopping.status_shipping }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Dirección</strong></label>
                                    <p>@{{ shopping.address }}</p>
                                </div>
                                <div class="col-md-12">
                                    <h3 class="text-center">Productos</h3>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-checkable">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Costo envío</th>
                                                <th>Tipo</th>
                                                <th>Tamaño</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(shoppingPurchase, index) in shopping.product_purchases">
                                                <td>@{{ shoppingPurchase.product_type_size.product.brand.name }} - @{{ shoppingPurchase.product_type_size.product.name }}</td>
                                                <td>$ @{{ parseInt(shoppingPurchase.price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</td>
                                                <td>$ @{{ parseInt(shoppingPurchase.shipping_cost).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</td>
                                                <td>@{{ shoppingPurchase.product_type_size.type.name }}</td>
                                                <td>@{{ shoppingPurchase.product_type_size.size.name }} Oz</td>
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
                    user_id:"{{ $user_id }}",
                    shopping:"",
                    shoppings:[],
                    pages:0,
                    page:1
                }
            },
            methods:{

                show(shopping){

                    this.shopping = shopping

                },
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/admin/user/shopping/') }}"+"/"+page+"/user/"+this.user_id)
                    .then(res => {

                        this.shoppings = res.data.shoppings
                        this.pages = Math.ceil(res.data.shoppingsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                }


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush