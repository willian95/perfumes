@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">

        <div class="elipse" v-if="loading == true">
            <img class="logo-f" src="{{ asset('assets/img/logoLoader.png') }}" alt="">
        </div>

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <h3>Productos Top</h3>

                                    <div class="form-group">
                                        <label for="product">Perfume</label>
                                        <input type="text" class="form-control" v-model="search" @keyUp="look()">
                                    </div>

                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-10" v-for="product in products">
                                            <!--begin::Symbol-->
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column font-weight-bold">
                                                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg" @click="store(product.id)">@{{ product.product.name }} - @{{ product.type.name }} - @{{ product.size.name }}Oz</a>
                                               
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Perfume</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(product, index) in topProducts">
                                                <td>@{{ index + 1 }}</td>
                                                <td>@{{ product.product_type_size.product.name }} - @{{ product.product_type_size.type.name }} - @{{ product.product_type_size.size.name }}Oz</td>
                                                <td><button class="btn btn-danger" @click="erase(product.id)">Eliminar</button></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                    topProducts:[],
                    products:[],
                    product:"",
                    search:"",
                    loading:false
                }
            },
            methods:{
                
                look(){

                    axios.post("{{ url('/admin/top-product/search') }}", {search: this.search}).then(res => {

                        this.products = res.data.products

                    })

                },
                store(id){

                    this.loading = true
                    axios.post("{{ url('/admin/top-product/store') }}", {product_id: id}).then(res => {

                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: res.data.msg,
                                icon: "success"
                            });
                            this.products = []

                            this.fetch()

                        }else{

                            alert(res.data.msg)

                        }

                    })
                    .catch(err => {
                        this.loading = false
                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })

                    })

                },
                fetch(){
                    
                    axios.get("{{ url('/admin/top-product/fetch') }}").then(res => {

                        if(res.data.success == true){

                            this.topProducts = res.data.products

                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                erase(id){
                    this.loading = true
                    axios.post("{{ url('/admin/top-product/delete') }}", {id: id}).then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: res.data.msg,
                                icon: "success"
                            });

                            this.fetch()
                            
                        }else{

                            alert(res.data.msg)

                        }

                    })

                }


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush