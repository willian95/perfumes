@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Tamaños
                            </div>
                            <div class="card-toolbar">
                                
                                <!--end::Dropdown-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sizeModal" @click="create()">
                                    Nuevo tamaño
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-bordered table-checkable" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Oz</th>
                                        <th>Ml</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(size, index) in sizes">
                                        <th>@{{ index + 1 }}</th>
                                        <td>@{{ size.name }}</td>
                                        <td>@{{ size.ml }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#sizeModal" @click="edit(size)"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-primary" @click="erase(size.id)"><i class="far fa-trash-alt"></i></button>
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
            <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Oz</label>
                                <input type="text" class="form-control" id="name" v-model="name">
                            </div>
                            <div class="form-group">
                                <label for="ml">Ml</label>
                                <input type="text" class="form-control" id="ml" v-model="ml">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary font-weight-bold"  @click="store()" v-if="action == 'create'">Crear</button>
                            <button type="button" class="btn btn-primary font-weight-bold"  @click="update()" v-if="action == 'edit'">Actualizar</button>
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
                    modalTitle:"Nuevo tamaño",
                    name:"",
                    sizeId:"",
                    action:"create",
                    ml:"",
                    sizes:[],
                    pages:0,
                    page:1
                }
            },
            methods:{
                
                create(){
                    this.action = "create"
                    this.name = ""
                    this.sizeId = ""
                },
                store(){

                    axios.post("{{ url('admin/size/store') }}", {name: this.name, ml: this.ml})
                    .then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Genial!",
                                text: "Tamaño creado!",
                                icon: "success"
                            });
                            this.name = ""
                            this.ml = ""
                            this.fetch()
                        }else{

                            alert(res.data.msg)

                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                update(){

                    axios.post("{{ url('admin/size/update') }}", {id: this.sizeId, name: this.name, ml: this.ml})
                    .then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Genial!",
                                text: "Tamaño actualizado!",
                                icon: "success"
                            });
                            this.name = ""
                            this.sizeId = ""
                            this.ml = ""
                            this.fetch()
                            
                        }else{

                            alert(res.data.msg)

                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                edit(size){
                    this.modalTitle = "Editar tamaño"
                    this.action = "edit"
                    this.name = size.name
                    this.sizeId = size.id
                },
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/admin/size/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.sizes = res.data.sizes
                        this.pages = Math.ceil(res.data.sizesCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                erase(id){

                    swal({
                        title: "¿Estás seguro?",
                        text: "Eliminarás este tamaño!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            
                            axios.post("{{ url('/admin/size/delete/') }}", {id: id}).then(res => {

                                if(res.data.success == true){
                                    swal({
                                        title: "Genial!",
                                        text: "Tamaño eliminado!",
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