@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">

        <div class="elipse" v-if="loading == true">
            <img class="logo-f" src="{{ asset('assets/img/logoLoader.png') }}" alt="">
        </div>

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Marcas
                            </div>
                            <div class="card-toolbar">
                                
                                <div class="card-toolbar">
                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="toggleMenu()">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            Exportar
                                        </button>
                                        <!--begin::Dropdown Menu-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" id="menu">
                                            <!--begin::Navigation-->
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Elige una opción:</li>
                                                
                                                <li class="navi-item">
                                                    <a href="{{ url('/admin/brand/excel') }}" target="_blank" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-excel-o"></i>
                                                        </span>
                                                        <span class="navi-text">Excel</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="{{ url('/admin/brand/csv') }}" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-text-o"></i>
                                                        </span>
                                                        <span class="navi-text">CSV</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="{{ url('/admin/brand/pdf') }}" target="_blank" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="la la-file-pdf-o"></i>
                                                        </span>
                                                        <span class="navi-text">PDF</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                        <!--end::Dropdown Menu-->
                                    </div>
                                    <!--end::Button-->
                                </div>

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
                    page:1,
                    showMenu:false,
                    loading:false
                }
            },
            methods:{
                
                create(){
                    this.action = "create"
                    this.name = ""
                    this.brandId = ""
                },
                store(){

                    this.loading = true
                    axios.post("{{ url('admin/brand/store') }}", {name: this.name, image: this.picture})
                    .then(res => {
                        this.loading = false
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
                        this.loading = false
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                update(){
                    this.loading = true
                    axios.post("{{ url('admin/brand/update') }}", {id: this.brandId, name: this.name, image: this.picture})
                    .then(res => {
                        this.loading = false
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
                        this.loading = false
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
                            this.loading = true
                            axios.post("{{ url('/admin/brand/delete/') }}", {id: id}).then(res => {
                                this.loading = false
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
                                this.loading = false
                                $.each(err.response.data.errors, function(key, value){
                                    alert(value)
                                });
                            })

                        }
                    });


                },
                toggleMenu(){

                    if(this.showMenu == false){
                        $("#menu").addClass("show")
                        this.showMenu = true
                    }else{
                        $("#menu").removeClass("show")
                        this.showMenu = false
                    }

                }


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush