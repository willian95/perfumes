@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Tipos de perfume
                            </div>
                            <div class="card-toolbar">
                                
                                <!--end::Dropdown-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#typeModal" @click="create()">
                                    Nuevo tipo
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
                                        <th>Nombre</th>
                                        <th>Abrevicación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(type, index) in types">
                                        <th>@{{ index + 1 }}</th>
                                        <td>@{{ type.name }}</td>
                                        <td>@{{ type.abbreviation }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#typeModal" @click="edit(type)"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-primary" @click="erase(type.id)"><i class="far fa-trash-alt"></i></button>
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
            <div class="modal fade" id="typeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-grodfdgup">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" v-model="name">
                            </div>
                            <div class="form-grodfdgup">
                                <label for="abbreviation">Abreviación</label>
                                <input type="text" class="form-control" id="abbreviation" v-model="abbreviation">
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
                    modalTitle:"Nuevo tipo",
                    name:"",
                    typeId:"",
                    abbreviation:"",
                    action:"create",
                    types:[],
                    pages:0,
                    page:1
                }
            },
            methods:{
                
                create(){
                    this.action = "create"
                    this.name = ""
                    this.typeId = ""
                    this.abbreviation = ""
                },
                store(){

                    axios.post("{{ url('admin/type/store') }}", {name: this.name, abbreviation: this.abbreviation})
                    .then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Genial!",
                                text: "Tipo de fragancia creado!",
                                icon: "success"
                            });
                            this.name = ""
                            this.abbreviation = ""
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

                    axios.post("{{ url('admin/type/update') }}", {id: this.typeId, name: this.name, abbreviation: this.abbreviation})
                    .then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Genial!",
                                text: "Tipo de fragancia actualizada!",
                                icon: "success"
                            });
                            this.name = ""
                            this.abbreviation = ""
                            this.typeId = ""
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
                edit(type){
                    this.modalTitle = "Editar tipo"
                    this.action = "edit"
                    this.name = type.name
                    this.abbreviation = type.abbreviation
                    this.typeId = type.id
                },
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/admin/type/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.types = res.data.types
                        this.pages = Math.ceil(res.data.typesCount / 20)

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
                        text: "Eliminarás este tipo de fragancia!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            
                            axios.post("{{ url('/admin/type/delete/') }}", {id: id}).then(res => {

                                if(res.data.success == true){
                                    swal({
                                        title: "Genial!",
                                        text: "Tipo de fragancia eliminada!",
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