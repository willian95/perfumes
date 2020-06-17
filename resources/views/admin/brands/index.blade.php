@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Marcas
                            </div>
                            <div class="card-toolbar">
                                
                                <!--end::Dropdown-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brandModal" @click="create()">
                                    Nueva marca
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
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(brand, index) in brands">
                                        <th>@{{ index + 1 }}</th>
                                        <td>@{{ brand.name }}</td>
                                        <td>
                                            <img :src="'{{ url('/images/brands') }}'+'/'+brand.image" alt="" style="width: 20%">
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#brandModal" @click="edit(brand)"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-primary" @click="erase(brand.id)"><i class="far fa-trash-alt"></i></button>
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
            <div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" v-model="name">

                            <div class="form-group">
                                <label for="picture">Imagen</label>
                                <input type="file" id="image" class="form-control" id="picture" ref="file" @change="onImageChange" accept="image/*">
                            </div>
                            <div class="form-group">
                                <img id="blah" :src="imagePreview" class="full-image" style="margin-top: 10px; width: 40%">
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
                    modalTitle:"Nueva marca",
                    name:"",
                    brandId:"",
                    picture:"",
                    imagePreview:"",
                    action:"create",
                    brands:[],
                    pages:0,
                    page:1
                }
            },
            methods:{
                
                create(){
                    this.action = "create"
                    this.name = ""
                    this.brandId = ""
                },
                store(){

                    axios.post("{{ url('admin/brand/store') }}", {name: this.name, image: this.picture})
                    .then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: "Has creado una marca!",
                                icon: "success"
                            });
                    
                            this.name = ""
                            this.imagePreview = ""
                            $("#image").val(null)
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

                    axios.post("{{ url('admin/brand/update') }}", {id: this.brandId, name: this.name, image: this.picture})
                    .then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Excelente!",
                                text: "Has actualizado una marca!",
                                icon: "success"
                            });
                            this.name = ""
                            this.brandId = ""
                            this.imagePreview = ""
                            $("#image").val(null)
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
                edit(brand){
                    this.modalTitle = "Editar marca"
                    this.action = "edit"
                    this.name = brand.name
                    this.brandId = brand.id
                    this.imagePreview = "{{ url('/') }}"+"/images/brands/"+brand.image
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
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/admin/brand/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.brands = res.data.brands
                        this.pages = Math.ceil(res.data.brandsCount / 20)

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
                        text: "Eliminarás esta marca!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            
                            axios.post("{{ url('/admin/brand/delete/') }}", {id: id}).then(res => {

                                if(res.data.success == true){
                                    swal({
                                        title: "Genial!",
                                        text: "Marca eliminada!",
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